<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Leão
 * Date: 10/05/14
 * Time: 00:03
 * To change this template use File | Settings | File Templates.
 */

class GroupsModel extends BaseModel{

    function getGroups($data){

     $r = $this->select(" groups, users_groups"," groups.*"," users_groups.user =".$data." AND users_groups.group = groups.id");
     return $r;
    }


}