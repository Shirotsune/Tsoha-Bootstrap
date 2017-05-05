<?php

class SpellJoin extends BaseModel{

    public $spellbook_id, $spell_id;

    public function __construct($attributes){
        parent::__construct($attributes);
    }

    public static function all($spellbook_id){
        $query = DB::connection()->prepare('SELECT * FROM Spells WHERE spellbook_id = :spellbook_id');
        $query->execute(array('spellbook_id' => $spellbook_id));
        $rows = $query->fetchAll();
        $spells_in_book = array();

        foreach($rows as $row){
            $spells_in_book[] = new SpellJoin(array(
                'spellbook_id' => $spellbook_id,
                'spell_id' => $row['spellbook_id']));
        }
        return $spells_in_book;
    }

    public function add_to_spellbook(){
        $query = DB::connection()->prepare('INSERT INTO Spells (spellbook_id, spell_id) VALUES (:spellbook_id, :spell_id)');
        $query->execute(array('spellbook_id'=> $this->spellbook_id, 'spell_id' => $this->spell_id));
    }

    public function remove_from_spellbook(){
        $query = DB::connection()->prepare('DELETE FROM Spells WHERE spellbook_id = :spellbook_id AND spell_id = :spell_id');
        $query->execute(array('spellbook_id'=> $this->spellbook_id, 'spell_id' => $this->spell_id));
    }

    public static function cleanup_spellbook($id){
        $query = DB::connection()->prepare('DELETE FROM Spells WHERE spellbook_id = :spellbook_id');
        $query->execute(array('spellbook_id'=> $id));

    }

    public static function cleanup_spell($id){
        $query = DB::connection()->prepare('DELETE FROM Spells WHERE spell_id = :spell_id');
        $query->execute(array('spell_id' => $id));

    }

}

class JoinSQL extends BaseModel{
    public static function find($id){
        $query = DB::connection()->prepare('SELECT * FROM Spell INNER JOIN Spells ON Spell.id = Spells.spell_id WHERE Spells.spellbook_id = :id');
        $query->execute(array('id' => $id));

        $rows = $query->fetchAll();
        $spells = array();

        foreach($rows as $row){
            $spells[] = new Spell(array(
                'id' => $row['id'],
                'name' => $row['name'],
                'type' => $row['type'],
                'school' => $row['school'],
                'level' => $row['level'],
                'components' => $row['components'],
                'castingtime' => $row['castingtime'],
                'range' => $row['range'],
                'effect' => $row['effect'],
                'targets' => $row['targets'],
                'duration' => $row['duration'],
                'savingthrow' => $row['savingthrow'],
                'spellresistance' => $row['spellresistance'],
                'description' => $row['description']));
        }
        return $spells;
    }

}


