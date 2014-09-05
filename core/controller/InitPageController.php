<?php
/**
 * Created by JetBrains PhpStorm.
 * User: viabrema
 * Date: 19/04/14
 * Time: 17:27
 * To change this template use File | Settings | File Templates.
 */

class InitPageController extends AppController {

    public $groups;

    function pageDefault(){

        $this->groups = $this->getGroups("4");

        $this->show('InitPage');
    }

    function getGroups($user){
        $getGroups = new GroupsModel();
        $groups = $getGroups->getGroups($user);

        return $groups;

    }
}