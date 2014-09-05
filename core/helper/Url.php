<?php

class Url {

    public static $path = "";
    public static $routes = array(
        'contato' => array('ContactController','validForm'),
        'login' => array('LoginController','pageDefault'),
        'user-login' => array('LoginController','userLogin')

    );


    static function getPars(){
        // Primeiro traz todos as pastas abaixo do index.php
        $startUrl = strlen( $_SERVER[ "DOCUMENT_ROOT" ] ) - 1;
        $excludeUrl = substr( $_SERVER[ "SCRIPT_FILENAME" ], $startUrl, -10 );
        // a variável$request possui toda a string da URL após o domínio.
        $request = $_SERVER[ 'REQUEST_URI' ];
        // Agora retira toda as pastas abaixo da pasta raiz
        $request = substr( $request, strlen( $excludeUrl ) );
        // Explode a URL para pegar retirar tudo após o ?
        $urlTmp = explode( "?", $request );
        $request = $urlTmp[ 0 ];
        // Explo a URL para pegar cada uma das partes da URL
        $urlExplode = explode( "/", $request );
        $r = array( );
        for ( $a = 0; $a <= count( $urlExplode ); $a++ ) {
            if ( isset( $urlExplode[ $a ] ) AND $urlExplode[ $a ] != "" ) {
                array_push( $r, $urlExplode[ $a ] );
            }
        }

        $v = array( );

        if(isset($r[0]) && isset(Url::$routes[$r[0]])){
            $v['class'] = Url::$routes[$r[0]][0];
            $v['action'] = Url::$routes[$r[0]][1];
        }else{
            $v['class'] = (isset($r[0]))? $r[0] : 'InitPageController';
            $v['action'] = (isset($r[1]))? $r[1] : 'pageDefault';
        }

        $v['pars'] = $r;

        if(!class_exists($v['class']) || !method_exists($v['class'],$v['action'])){
            $v['class'] = 'NotFoundController';
            $v['action'] = 'pageDefault';
        }

        return $v;
    }


}