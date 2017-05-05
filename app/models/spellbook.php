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
        $query = DB::connection()->prepare('UPDATE Spellbook SET player_id = :player_id,  name = :name WHERE id = :id');
        $query->execute(array('player_id' => $this->player_id, 'name' => $this->name, 'id' => $this->id));
    
    }

}


