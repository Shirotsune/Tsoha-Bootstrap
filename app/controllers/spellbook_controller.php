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
    Redirect::to('/spellbooks');
    }

    public static function new_spell(){
        $params = $_POST;
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
        Redirect::to('/spells');
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

    public static function add_spell(){
        View::make('new_spell.html');
    }

    public static function showspellbook($id){
        $spellbook = Spellbook::find($id);
        $spelljoin = JoinSQL::find($id);
        View::make('spellbook.html', array('spellbook' =>$spellbook), array('spells' =>$spelljoin));
    }

    public static function showspell($id){
        $spell = Spell::find($id);
        View::make('spell.html', array('spell' =>$spell));
    }

    public static function new_spell_to_spellbook(){
        $params = $_POST;
        $spelljoin = new SpellJoin(array(
            'spellbook_id' => $params['spellbook_id'],
            'spell_id' => $params['spell_id']));
        $spelljoin->add_to_spellbook();
        Redirect::to('/spellbooks' . $params->spellbook_id);
    }

    public static function add_to_spellbook($id){
        $spells = Spell::all();
        //$id
        View::make('addtospellbook.html', array('spells' => $spells), $id);
    }
}