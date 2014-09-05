<?php
session_start();
error_reporting("E-NOTICE");
require "config.php";

//carregamento automático das classes
function __autoload($strClass){
    //carrega as classes do diretório controller
    if(file_exists('core/controller/'.$strClass.'.php')) require_once 'core/controller/'.$strClass.'.php';
    //carrega as classes do diretório model
    elseif(file_exists('core/model/'.$strClass.'.php')) require_once 'core/model/'.$strClass.'.php';
    //carrega as classes do diretório view
    elseif(file_exists('core/helper/'.$strClass.'.php')) require_once 'core/helper/'.$strClass.'.php';
    //carrega as classes do diretório controller do administrador
    elseif(file_exists('adm/controller/'.$strClass.'.php')) require_once 'adm/controller/'.$strClass.'.php';
}


$url = URL::getPars();


$post = false;
if(isset($_POST)){
 $post = $_POST;
}
if(isset($_FILES)){
    $post['files'] = $_FILES;
}

try{
    $n = new $url['class'];
    $n->$url['action']($post, $url['pars']);
}catch (Exception $e){
    echo $e->getMessage();
}

