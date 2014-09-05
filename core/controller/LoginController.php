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

        print_r($pars); exit;


    }
}