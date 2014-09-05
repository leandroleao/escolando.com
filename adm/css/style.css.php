<?php header("Content-type: text/css"); ?>

<?php include ("../../config.php"); ?>

*{
position: relative;
}

body,
html{
height: 100%;
margin: 0;
}

body{

 font-family: 'Open Sans', sans-serif;
}

#all{
    max-width: 100%;
    background-color: #FFF;
    margin: 0 auto;
    color: #000;
}

#top{ height: 100px; background-color: #121929;}
#top .logo{ float: left; margin: 25px; font-size: 30px;color: #ff2c44; font-family: fantasy ; background: url("<?php echo SITE_PATH; ?>img/logo-outclub-adm.png"); width: 191px; height: 48px; }



#nav{ height: 50px; line-height:50px; background-color: #1e293d; }
#nav ul{  margin: 0; margin-left: 30px; border-left: solid 1px #2d394f; height: 50px; padding: 0; }
#nav ul li{ list-style-type: none; border-right: solid 1px #2d394f; padding: 0 10px; float: left; }
#nav ul li a{ color: #FFF; text-decoration: none;}

#content{ min-height: 450px; padding: 5px 20px;  background-color: #F1F2F7; }
#content h1{ margin: 0; }
#content .formLogin{ text-align: center; }
#content .formLogin form{ width: 400px; height: 220px; text-align: left; margin: 0 auto; }
#content .formLogin form input{ width: 100%; }
#content .formLogin form label{ padding: 0; }
#content .formLogin form button.submit{ background-color: #202b3f; border-color: rgba(0, 0, 0, 0); color: #FFFFFF; border-radius: 0; font-size: 1em; outline: medium none; padding: 7px 11px; width: 150px; right: 0; }
#content table{ margin: 0; border: 1px solid #ddd; width: 100%; background-color: transparent; border-collapse: collapse; border-spacing: 0; border-spacing: 2px; border-color: gray; }
#content table.list, #content div.list{ margin-top: 46px; }
#content table tr.header{ background: #f2994b; color: #FFF; }
#content table tr.pai{ background: #E0E0E0; }
#content table tr td{ border-top: 0; padding-left: 15px; padding-right: 15px; border-bottom-width: 2px; border: 1px solid #ddd; line-height: 40px; }
#content table tr.cat-filha-1{  width: auto; }
#content table tr.cat-filha-1 td.seta {  padding: 0; }
#content table tr.cat-filha-1 td .imagem_seta{ width: 20px; padding-right: 10px; }
#content table tr.cat-filha-2 td .imagem_seta{ width: 20px; padding: 0 10px; }
#content .cat-filha-1 {  width: 67%;  }
#content .cat-filha-1 .seta {  padding: 0; }
#content .cat-filha-1 .imagem_seta{ width: 20px; padding-right: 10px; }
#content .cat-filha-2 .imagem_seta{ width: 20px; padding: 0 10px; }
#content .cat-filha-1 div{ display: inline-block; padding: 5px 30px; vertical-align: top; }
#content label{vertical-align: top; font-size: 17px; font-weight: 300; text-align: left; padding-top: 7px; margin-top: 0; margin-bottom: 0; width: 15%; min-height: 1px; padding-right: 15px; padding-left: 15px; color: #393E48; line-height: 40px; display: inline-block;}
#content label .obrigatorio{ color: red; }
#content span.preco_venda{ display: inline-block; margin-top: 17px; font-size: 23px; color: green; }
#content input{ width: 50%; background-color: #FFFFFF; border: 1px solid #ccc; border-radius: 0px !important; box-shadow: none !important; filter: none !important; font-family: "Helvetica Neue", Helvetica, Arial, sans-serif; font-size: 13px; font-weight: normal; line-height: 15px; min-height: 28px; padding: 6px 11px !important; transition: background 0.2s linear 0s, box-shadow 0.2s linear 0s; vertical-align: top; margin-top: 10px;}
#content select{ width: 50%; background-color: #FFFFFF; border: 1px solid #ccc; border-radius: 0px !important; box-shadow: none !important; filter: none !important; font-family: "Helvetica Neue", Helvetica, Arial, sans-serif; font-size: 13px; font-weight: normal; line-height: 15px; min-height: 28px; padding: 6px 11px !important; transition: background 0.2s linear 0s, box-shadow 0.2s linear 0s; vertical-align: top; margin-top: 10px;}
#content select option.pai{ font-weight: bold; }
#content textarea{ width: 50%; height: 200px;  margin-top: 10px; padding:0; }
#content input.file{ width: 100%; }
#content input.checkbox{ width: 30px; }
#content button.submit{ background-color: #51a351; border-color: rgba(0, 0, 0, 0); border-radius: 4px; color: #FFFFFF; font-size: 1em; outline: medium none; padding: 7px 11px; right: 20px; position: absolute; bottom: 5px; width: 150px; }
#content #Atributosform input.file{ width: 50%; }
#content .atributos{ width: 109px; display: inline-block; }
#content .atributos input{ width: 18px; margin: 0; }
#content .atributos img{  border: solid 1px #555; }
#content #button{ background: #555; color: FFF; text-decoration: none; border-radius: 4px; padding: 8px; }
#content #button.add{ background: #006dcc; }
#content #button.edit{ background: #2f96b4; }
#content #button.delete{ background: #222222; }
#content .box #form .imagens_campanhas{ width: 900px; }
#content .box #form .imagens_campanhas .campanha_imagem_ordem { border: solid 1px #d44646; width: auto; display: inline-block; margin-top: 10px; }
#content .box #form .imagens_campanhas .campanha_imagem_ordem .campanha_imagem{ width: auto; }
#content .box #form .imagens_campanhas .campanha_imagem_ordem .remover{ width: 100%; display: block; text-align: center; background: #d44646; color: #FFF; text-decoration: none; }


#content .box{ background: #FFF; padding: 10px; margin-top: 10px; }
#content .box h3{ font-size: 1.5em; color: #393E48; }
#content .box #form{ border: solid 1px #f2994b; padding: 10px; position: relative; }
#content .box #form form{ margin-top: 70px; }
#content .box #form h2{ font-size: 1.2em; position: absolute; top: 0; left:0; margin:0; width: 100%; background: #f2994b; padding: 10px; box-sizing: border-box; color: #FFF; }
#content .box #form .success{ position: absolute; top: 27px; left: 0; width: 100%; text-align: center; background: #47a447; background: #47a447; height: 25px; padding-top: 5px; color: #FFF; }
#content .box #form .error{ position: absolute; top: 27px; left: 0; width: 100%; text-align: center; background: #47a447; background: #d44646; height: 25px; padding-top: 5px; color: #FFF;  }
#content .box #form table.imagens{ width: 60%;  }
#content .box #form .imagens_produtos{ }
#content .box #form .imagens_produtos .produto_imagem_ordem{ border: solid 1px #d44646; width: 110px; display: inline-block; }
#content .box #form .imagens_produtos .produto_imagem_ordem .produto_imagem{ width: 100px; padding: 5px; }
#content .box #form .imagens_produtos .produto_imagem_ordem .remover{ width: 100%; display: inline-block; text-align: center; background: #d44646; color: #FFF; text-decoration: none; }
#content .box #form .variacao_estoque{ border: solid 1px #CCC; width: 60%; height: 55px; }
#content .box #form .variacao_estoque img{ border: solid 1px #555; margin: 0 20px; }


#content .box .success{ position: absolute; top: 54px; left: 0; width: 100%; text-align: center; background: #47a447; background: #47a447; height: 25px; padding-top: 5px; color: #FFF; }
#content .box .error{ position: absolute; top: 54px; left: 0; width: 100%; text-align: center; background: #47a447; background: #d44646; height: 25px; padding-top: 5px; color: #FFF;  }


#foot{ height: 50px; background-color: #121929; }

#background{ width: 100%; z-index: 999; display: block; background-color: #000; opacity: 0.5; position: absolute; top:0; bottom: 0;}
#edit-content{ width: 400px; height: 500px; z-index: 9999; display: block; background-color: #FFF; position: absolute; top:50%; left: 50%; margin-top: -200px; margin-left:-250px;}