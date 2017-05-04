<?php

function check_logged_in(){
    BaseController::check_logged_in();
}

$routes->post('/new_spellbook','check_logged_in' ,function(){
SpellbookController::new_spellbook();
});

$routes->post('/new_spell','check_logged_in', function(){
    SpellbookController::new_spell();
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
