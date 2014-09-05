<?php
/**
 * Created by JetBrains PhpStorm.
 * User: viabrema
 * Date: 19/04/14
 * Time: 17:27
 * To change this template use File | Settings | File Templates.
 */

class AdmController extends AppController {

    public $message = "";

    function Init(){
        $this->show();
    }

    function show($page = "InitPage"){

        if(!empty($_SESSION['OutClubUser'])){
            $this->page = 'adm/pages/' . $page . '.php';
            include('adm/pages/MasterPage.php');
        }
        else{
            $this->page = 'adm/pages/LoginPage.php';
            //$this->message = "Dados inválidos.Tente novamente.";
            include('adm/pages/MasterPage.php');
        }

    }

    function StartSession($post){
        $selectUser = new LoginModel();
        $user = (array)$selectUser->selectUser($post);


        if(!empty($user[0])){
            $_SESSION['OutClubUser'] = $user[0]->login;
            $this->show('InitPage');
        }
        else{
            $this->show();
        }


    }
}