<?php header("Content-type: text/css"); ?>
<?php include ("../../../../config.php"); ?>
body{ background-color: #e9eaed; }
#all{
    background-color: #e9eaed;
    margin: 0 auto;
    color: #fff;
    font-family: Verdana;
    font-size: 12px;
    height: 100%;
}

#content.login{ height: 100%; max-width: 1024px; min-width: 1024px; background: #f5711f; margin: 0 auto; }
#content.login .logo{ width: 504px; height: 196px; background: url("<?php echo SITE_PATH; ?>img/logo_escolando.jpg"); margin: 0 auto; }
#content.login form input{ margin: 0 auto; display: block; width: 300px; margin-top: 10px; height: 30px; }


#content.init{ height: auto; max-width: 1024px; min-width: 1024px; background: #e9eaed; margin: 0 auto; outline: solid 1px red; }
#content.init .header{ width: 100%; height: 100px; outline: solid 1px green; background: #fe8340; }
#content.init .header .logo{ width: 130px; height: 140px; position: absolute; top: 30px; left: 50px; outline: solid 1px orange; }

#content.init .nav{ width: 250px; height: 100%; outline: solid 1px green; display: inline-block; padding-left: 50px; }
#content.init .nav .profile{ display: block; border: solid 1px red; width: 200px; height: 100px; margin-top: 90px; }
#content.init .nav .profile img{ position: absolute; }
#content.init .nav .groups{ position: absolute; }

#content.init .timeline{ width: 500px; height: 100%; outline: solid 1px yellow; display: inline-block; }
#content.init .timeline .form{ position:absolute; }
#content.init .timeline .posts{ position:absolute; color: #555; top: 100px; }