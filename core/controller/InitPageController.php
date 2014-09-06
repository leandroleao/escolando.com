<?php
/**
 * Created by JetBrains PhpStorm.
 * User: viabrema
 * Date: 19/04/14
 * Time: 17:27
 * To change this template use File | Settings | File Templates.
 */

class InitPageController extends AppController {

    public $user;
    public $groups;
    public $posts;

    function pageDefault(){

        if($_SESSION['escolandoUser']){

            $this->user = $this->getUser($_SESSION['escolandoUser']);
            $this->groups = $this->getGroups($_SESSION['escolandoUser']);
            $this->posts = $this->getPosts("1");

        }

        $this->show('InitPage');
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

    function postAdd ($data){

        if(!empty($data['postContent']) && !empty($data['author']) &&!empty($data['category']) &&!empty($data['groupId'])){

            $arr['author'] = $data['author'];
            $arr['post'] = $data['postContent'];
            $arr['groupId'] = $data['groupId'];
            $arr['category'] = $data['category'];

            $insertPost = new PostsModel();
            $r = $insertPost->addPost($arr);


            header("location:".SITE_PATH);
            exit;


        }
    }
}