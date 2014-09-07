<?php
/**
 * Created by JetBrains PhpStorm.
 * User: viabrema
 * Date: 19/04/14
 * Time: 17:27
 * To change this template use File | Settings | File Templates.
 */

class GroupsController extends AppController {

    public $user;
    public $groups;
    public $group;
    public $posts;

    function pageDefault($data,$pars){

        if($_SESSION['escolandoUser']){

            $this->group = intval($pars['1']) ? $pars['1'] : 1;

            $this->user = $this->getUser($_SESSION['escolandoUser']);
            $this->groups = $this->getGroups($_SESSION['escolandoUser']);
            $this->posts = $this->getPosts($this->group);

        }

        $this->show('GroupsPage');
    }

    function getUser($user){
        $arr['id'] = $user;
        $getUser = new LoginModel();
        $user = $getUser->getUser($arr);

        return $user;
    }

    function getGroups($user){
        $getGroups = new GroupsModel();
        $groups = $getGroups->getGroups($user);

        return $groups;
    }

    function getPosts($groupId){
        $arr['groupId'] = $groupId;
        $getPosts = new PostsModel();
        $posts = $getPosts->getPosts($arr);

        return $posts;
    }

    function formatData($date){

        $dh = explode(" ", $date);

        $date = explode("-",$dh[0]);
            $arr[] = $date[2];
            $arr[] = $date[1];
            $arr[] = $date[0];

        $date = implode("/",$arr);

        $hour = explode(":",$dh[1]);
        array_pop($hour);
        $hour = implode(":",$hour);



            return $date." ".$hour;
    }

    function postAdd ($data){

        if(!empty($data['postContent']) && !empty($data['author']) &&!empty($data['category']) &&!empty($data['groupId'])){

            $arr['author'] = $data['author'];
            $arr['post'] = nl2br($data['postContent']);
            $arr['groupId'] = $data['groupId'];
            $arr['category'] = $data['category'];

            $insertPost = new PostsModel();
            $r = $insertPost->addPost($arr);


            header("location:".SITE_PATH."groups/".$arr['groupId']);
            exit;


        }
    }
}