<?php

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
        SpellJoin::cleanup_spell($this->id);
        $query = DB::connection()->prepare('DELETE FROM Spell WHERE id = :id');
        $query->execute(array('id' => $this->id));
    }
}

