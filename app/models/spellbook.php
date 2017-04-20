<?php

class Spellbook extends BaseModel{

      public $id, $player_id, $name;

      public function __construct($attributes){
      parent::__construct($attributes);
      }

      public static function all(){
      $query = DB::connection()->prepare('SELECT * FROM Spellbook');
      $query->execute();
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
}



class Spell extends BaseModel{

	public $id, $name, $type, $school, $level, $components, $castingtime, $range, $effect, $targets, $duration, $savingthrow, $description;

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
	'description' => $row['description']));

      return $spell;
    }
	return null;
    }

    public function add_spell(){
    $query = DB::connection()->prepare('INSERT INTO Spell (name, type, school, level, components, castingtime, range, effect, targets, duration, savingthrow, spellresistance, description)
    	     			        VALUES (:name, :type, :school, :level, :components, :castingtime, :range, :effect, :targets, :duration, :savingthrow, :spellresistance, :description)');
    $query->execute(array('name' => $this.name, 'type' => $this.type, 'school' => $this.school, 'level' => $this.level, 'components' => $this.components, 'castingtime' => $this.castingtime,
                          'range' => $this.range, 'effect' => $this.effect, 'targets' => $this.targets, 'duration' => $this.duration, 'savingthrow'=>$this.savingthrow,
			  'spellresistance' => $this.spellresistance, 'description' => $this.description));
    $row = $query->fetch();
    $this->id = $row['id'];
    }
	
}