<?php

function check_logged_in(){
    BaseController::check_logged_in();
}

$routes->post('/spellbooks','check_logged_in' ,function(){
SpellbookController::new_spellbook();
});

$routes->post('/spells','check_logged_in', function(){
    SpellbookController::new_spell();
});

$routes->post('/spell_to_spellbook', function(){
    SpellbookController::new_spell_to_spellbook();
});

$routes->get('/spell_to_spellbook', 'check_logged_in', function($id){
    SpellbookController::add_to_spellbook($id);
});

$routes->get('/spellbooks/:id', 'check_logged_in', function($id){
   SpellbookController::showspellbook($id);
});

$routes->get('/spells/:id', 'check_logged_in', function($id){
    SpellbookController::showspell($id);
});

$routes->get('/new_spell','check_logged_in', function(){
    SpellbookController::add_spell();
});


$routes->get('/new_spellbook', 'check_logged_in', function(){
    SpellbookController::add_spellbook();
});

$routes->get('/spells','check_logged_in', function(){
    SpellbookController::spells();
});

$routes->get('/spellbooks','check_logged_in', function(){
SpellbookController::spellbooks();
});

$routes->get('/login', function(){
    UserController::Login();
});

$routes->post('/login', function(){
    UserController::handle_login();
});

$routes->get('/', 'check_logged_in', function() {
    HelloWorldController::index();
});

$routes->get('/hiekkalaatikko', 'check_logged_in', function() {
    HelloWorldController::sandbox();
});


$routes->get('/logout', function(){
    UserController::logout();
});
