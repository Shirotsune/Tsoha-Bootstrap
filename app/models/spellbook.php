<?php

class Spellbook extends BaseModel{

    public $id, $player_id, $name;

    public function __construct($attributes){
        parent::__construct($attributes);
    }

    public static function all(){
        $query = DB::connection()->prepare('SELECT * FROM Spellbook WHERE player_id = :player_id');
        $query->execute(array('player_id' => $_SESSION['user']));
        $rows = $query->fetchAll();
        $spellbooks = array();

        foreach($rows as $row){
            $spellbooks[] = new Spellbook(array(
                'id' => $row['id'],
                'player_id' => $row['player_id'],
                'name' => $row['name']));
        }
        return $spellbooks;
    }

    public static function find($id){
        $query = DB::connection()->prepare('SELECT * FROM Spellbook WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

        if($row){
            $spellbook = new Spellbook(array(
                'id' => $row['id'],
                'player_id' => $row['player_id'],
                'name' => $row['name']));
      

            return $spellbook;
        }
        return null;
    }

    public function delete(){
        SpellJoin::cleanup_spellbook($this->id);
        $query = DB::connection()->prepare('DELETE FROM Spellbook WHERE id = :id');
        $query->execute(array('id' => $this->id));
    }

    public function add(){
        $query = DB::connection()->prepare('INSERT INTO Spellbook (player_id, name) VALUES (:player_id, :name) RETURNING id');
        $query->execute(array('player_id' => $this->player_id, 'name' => $this->name));
        $row = $query->fetch();
        $this->id = $row['id'];


    }

    public function update(){
        $query = DB::connection()->prepare('UPDATE Spellbook SET player_id = :player_id,  name = :name');
        $query->execute(array('player_id' => $this->player_id, 'name' => $this->name));
    
    }

}

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


class Spell extends BaseModel{

    public $id, $name, $type, $school, $level, $components, $castingtime, $range, $effect, $targets, $duration, $savingthrow, $spellresistance ,$description;

    public function __construct($attributes){
        parent::__construct($attributes);
    }
	
    public static function all(){
        $query = DB::connection()->prepare('SELECT * FROM Spell');
        $query->execute();
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

    public static function find($id){
        $query = DB::connection()->prepare('SELECT * FROM Spell WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();

        if($row){
            $spell = new Spell(array(
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

            return $spell;
        }
        return null;
    }

    public function add_spell(){
        $query = DB::connection()->prepare('INSERT INTO Spell (name, type, school, level, components, castingtime, range, effect, targets, duration, savingthrow, spellresistance, description)
    	     			        VALUES (:name, :type, :school, :level, :components, :castingtime, :range, :effect, :targets, :duration, :savingthrow, :spellresistance, :description) RETURNING id');
        $query->execute(array('name' => $this->name, 'type' => $this->type, 'school' => $this->school, 'level' => $this->level, 'components' => $this->components, 'castingtime' => $this->castingtime,
            'range' => $this->range, 'effect' => $this->effect, 'targets' => $this->targets, 'duration' => $this->duration, 'savingthrow'=>$this->savingthrow,
            'spellresistance' => $this->spellresistance, 'description' => $this->description));
        $row = $query->fetch();
        $this->id = $row['id'];
    }

    public function delete(){
        SpellJoin.cleanup_spell($this->id);
        $query = DB::connection()->prepare('DELETE FROM Spell WHERE id = :id');
        $query->execute(array('id' => $this->id));
    }
}
