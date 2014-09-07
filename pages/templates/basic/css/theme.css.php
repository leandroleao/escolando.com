<?php header("Content-type: text/css"); ?>
<?php include ("../../../../config.php"); ?>
body{ background-color: #e9eaed; color: #555; }
#all{
    background-color: #e9eaed;
    margin: 0 auto;
    color: #555;
    font-family: Verdana;
    font-size: 12px;
    height: 100%;
}

#content.login{ height: 100%; max-width: 1024px; min-width: 1024px; background: #f5711f; margin: 0 auto; }
#content.login .logo{ width: 504px; height: 196px; background: url("<?php echo SITE_PATH; ?>img/logo_escolando.jpg"); margin: 0 auto; }
#content.login form input{ margin: 0 auto; display: block; width: 300px; margin-top: 10px; height: 30px; }


#content.init{ height: auto; max-width: 1024px; min-width: 1024px; background: #e9eaed; margin: 0 auto; }
#content.init .header{ width: 100%; height: 100px; background: #fe8340; }
#content.init .header .logo{ background: url("<?php echo SITE_PATH; ?>img/basic-theme/logo_escola.jpg"); width: 153px; height: 153px; position: absolute; top: 30px; left: 50px; border: solid 1px #7f7f7f; display: block; z-index: 1; }
#content.init .header .school { position: absolute; left: 225px; top: 30px; min-width: 500px; }
#content.init .header .school .schoolName{ display: block; font-size: 28px; color: #FFF; }
#content.init .header .school .schoolDescripton{ display: block; font-size: 20px; color: #FFF; }

#content.init .nav{ width: 250px; height: 100%; display: inline-block; padding-left: 50px; }
#content.init .nav .profile{ display: block; width: 200px; height: 65px; margin-top: 90px; }
#content.init .nav .profile img{ float: left; }
#content.init .nav .profile .userName{ min-width: 148px; float: left; padding-left: 10px; display: inline-block; font-weight: bold;  }
#content.init .nav .profile .profileEdit{ min-width: 148px; padding-left: 10px; display: inline-block; margin-top: 10px; }

#content.init .nav .groups{ margin-top: 20px; }
#content.init .nav .groups .title{ display: block; margin-bottom: 10px; color: #9197a2; font-weight: bold; text-transform: uppercase; font-size: 11px; }
#content.init .nav .groups .group{ margin-left: 15px; display: block; padding: 5px 0; color: #000; text-decoration: none; }

#content.init .timeline{ width: 500px; position: absolute; display: inline-block; }
#content.init .timeline .form{ text-align: right; position:absolute; border:  solid 1px #e9eaed; width: 478px; margin-top: 35px; background: #FFF;  box-shadow: 5px 5px 5px #CCC;}
#content.init .timeline .form form{ margin: 0; }
#content.init .timeline .form label.title{ text-align: left; display: block; color: #555; width: 447px; padding: 10px; background: url("<?php echo SITE_PATH; ?>img/basic-theme/top_textarea.jpg"); background-repeat: no-repeat; background-position-x: 10px; background-position-y: bottom; }
#content.init .timeline .form textarea.postContent{ display: block; width: 457px; height: 85px; margin: 0 10px; border: none; }
#content.init .timeline .form textarea.postContent:focus{ border: none; outline: none; }
#content.init .timeline .form .buttons{ background: #f6f7f8; height: 35px; padding: 10px; padding-bottom: 0; border-top: solid 1px #e9eaed;  }
#content.init .timeline .form .buttons select{ min-width: 100px; height: 24px; }
#content.init .timeline .form .buttons .button{ background: #5a9c55; color: #FFF; height: 24px; border: none; padding: 0 15px; }

#content.init .timeline .posts{ position:absolute; color: #555; top: 202px; }
#content.init .timeline .postItem{ border:  solid 1px #e9eaed; width: 468px; margin-top: 20px; min-height: 100px; background: #FFF; padding: 10px; box-shadow: 5px 5px 5px #CCC;}
#content.init .timeline .postItem .topPost{ width: 100%; height: 40px; }
#content.init .timeline .postItem .topPost img{ float: left; }
#content.init .timeline .postItem .topPost .userNane{ min-width: 400px; display: inline-block; padding-top: 5px; font-size: 13px; color: #000; font-weight: bold; padding-left: 10px;}
#content.init .timeline .postItem .topPost .postTime{ min-width: 400px; display: inline-block; padding-top: 5px; padding-left: 10px; color: #ab97aa; }
#content.init .timeline .postItem .content{ width: 100%; padding: 10px 0; }



