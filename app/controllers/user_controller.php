<?php

class UserController extends BaseController{
      public static function login(){
      View::make('login.html');
}

public static function handle_login(){
$params = $_POST;
$user = User::authenticate($params['username'], $params['password']);

if(!$user){
View::make('login.html', array('error' => 'Kirjautuminen epäonnistui.'));
}
else{
$_SESSION['user'] = $user->id;
Redirect::to('/', array('message' => 'Kirjautuminen onnistui '));
}
}
}





