<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Leão
 * Date: 10/05/14
 * Time: 00:03
 * To change this template use File | Settings | File Templates.
 */

class LoginModel extends BaseModel{

  public $user;
  public $pass;

    function selectUser($post){

      return  $this->select("usuarios","*"," login=:login AND senha=:senha ", $post);

    }


}