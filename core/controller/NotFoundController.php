<?php
/**
 * Created by JetBrains PhpStorm.
 * User: viabrema
 * Date: 19/04/14
 * Time: 17:35
 * To change this template use File | Settings | File Templates.
 */

class NotFoundController extends AppController{
    function pageDefault(){
        $this->show('NotFoundPage');
    }
}