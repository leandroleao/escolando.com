<?php
/**
 * Created by JetBrains PhpStorm.
 * User: viabrema
 * Date: 19/04/14
 * Time: 13:29
 * To change this template use File | Settings | File Templates.
 */

class AppController {

    public $page;
    public $sessionId;

    function show($page){

        if($_SESSION['escolandoUser']){
            $this->page = 'pages/templates/' . THEME_NAME . '/' . $page . '.php';
            include('pages/templates/'. THEME_NAME .'/MasterPage.php');
        }
        else{
            $this->page = 'pages/templates/' . THEME_NAME . '/LoginPage.php';
            include('pages/templates/'. THEME_NAME .'/MasterPage.php');
        }



    }





}