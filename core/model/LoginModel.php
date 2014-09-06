<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Leão
 * Date: 10/05/14
 * Time: 00:03
 * To change this template use File | Settings | File Templates.
 */

class LoginModel extends BaseModel{


    function login($post){

      $r = $this->select("users","*"," (user=:user AND pwd=:pwd) || (register=:user AND pwd=:pwd) ", $post);
      return $r;

    }

    function getUser($post){

        $r = $this->select("users","*"," id=:id ", $post);
        return $r;

    }


}