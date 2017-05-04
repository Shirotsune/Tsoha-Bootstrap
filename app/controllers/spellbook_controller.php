<?php

class SpellbookController extends BaseController{

    public static function new_spellbook(){
        $params = $_POST;
        $user = array('player_id' => $_SESSION['user']);
        //Kint::dump(array('player_id' => $_SESSION['user']));
        //Kint::dump($params);
        $spellbook = new Spellbook(array(
        'player_id' => $user['player_id'],
        'name' => $params['name']
        ));
    $spellbook->add();
    }

    public static function new_spell(){
        $params = $_POST;
        Kint::dump($params);
/*
        $spell = new Spell(array(
            'name' => $params['name'],
            'type' => $params['type'],
            'school' => $params['school'],
            'level' => $params['level'],
            'components' => $params['components'],
            'castingtime' => $params['castingtime'],
            'range' => $params['range'],
            'effect' => $params['effect'],
            'targets' => $params['targets'],
            'duration' => $params['duration'],
            'savingthrow' => $params['savingthrow'],
            'spellresistance' => $params['spellresistance'],
            'description' => $params['description']));
        $spell->add_spell();
  */  }

    public static function spells(){
        $spells = Spell::all();
        View::make('spells.html', array('spells' => $spells));
    }

    public static function spellbooks(){
        $spellbooks = Spellbook::all();
        View::make('spellbooks.html', array('spellbooks' => $spellbooks));
    }

    public static function add_spellbook(){
        View::make('new_spellbook.html');
    }

    public static function add_spell(){
        View::make('new_spell.html');
    }

}