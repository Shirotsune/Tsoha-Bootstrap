<?php

class SpellbookController extends BaseController{

    public static function new_spellbook(){
        $params = $_POST;
        $spellbook = new Spellbook(array(
        'player_id' => user_controller::get_user_logged_in(),
        'name' => $params['name']
        ));
    $spellbook->add();
    }

    public static function new_spell(){
        $params = $_POST;

        $spell = new Spell(array(
            'id' => $params['id'],
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
            'description' => $params['description']));
        $spell->add_spell();
    }

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


}