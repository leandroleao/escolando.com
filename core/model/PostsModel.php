<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Leão
 * Date: 10/05/14
 * Time: 00:03
 * To change this template use File | Settings | File Templates.
 */

class PostsModel extends BaseModel{

    function addPost($data){

        $q = "INSERT INTO posts (author, post, category, groupId) VALUES (:author, :post, :category, :groupId)";
        $r = $this->query($q,$data);
        return $r;
    }

    function getPosts($data){
        $r = $this->select("posts","*"," groupId=:groupId ORDER by date DESC", $data);
        return $r;
    }


}