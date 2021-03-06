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

$routes->post('/spell_to_spellbook', 'check_logged_in', function(){
    SpellbookController::new_spell_to_spellbook();
});

$routes->post('/spells/:id/delete', 'check_logged_in', function($id){
    SpellbookController::delete_spell($id);
});

$routes->post('/spellbooks/:id/delete', 'check_logged_in', function($id){
    SpellbookController::delete_spellbook($id);
});


$routes->get('/spell_to_spellbook/:id', 'check_logged_in', function($id){
    SpellbookController::add_to_spellbook($id);
});

$routes->get('/spellbooks/:id', 'check_logged_in', function($id){
   SpellbookController::showspellbook($id);
});


$routes->get('/spellbooks/:id/edit', 'check_logged_in', function($id){
    SpellbookController::edit_spellbook($id);
});

$routes->post('/spellbooks/:id/edit', 'check_logged_in', function($id){
    SpellbookController::update_spellbook($id);
});

$routes->get('/spells/:id', 'check_logged_in', function($id){
    SpellbookController::showspell($id);
});

$routes->get('/spells/:id/edit', 'check_logged_in', function($id){
    SpellbookController::edit_spell($id);
});

$routes->post('/spells/:id/edit', 'check_logged_in', function($id){
    SpellbookController::update_spell($id);
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
