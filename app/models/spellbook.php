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
}
