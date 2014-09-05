<?php

class ContactController extends AppController {

    public $name = "";
    public $email = "";
    public $tel = "";
    public $msg = "";

    public function validForm($post){
        if(isset($post['name']))$this->name = $post['name'];
        if(isset($post['email']))$this->email = $post['email'];
        if(isset($post['tel']))$this->tel = $post['tel'];
        if(isset($post['msg']))$this->msg = $post['msg'];
        $this->submit();
    }

    public function submit(){
        $this->show('ContactPage');
    }
}