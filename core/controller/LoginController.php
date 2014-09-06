<?php
/**
 * Created by JetBrains PhpStorm.
 * User: viabrema
 * Date: 19/04/14
 * Time: 17:27
 * To change this template use File | Settings | File Templates.
 */

class LoginController extends AppController {

    function pageDefault(){
        $this->show('LoginPage');
    }

    function userLogin($data, $pars){

        $userLogin = new LoginModel();
        $r = $userLogin->login($data);

        if(!empty($r[0])){
            $_SESSION['escolandoUser'] = $r[0]->id;
            header("location:".SITE_PATH);
        }
        else{
            header("location:".SITE_PATH."login/ERROR");
        }


    }
}