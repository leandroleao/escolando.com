<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Leão
 * Date: 21/07/14
 * Time: 19:23
 * To change this template use File | Settings | File Templates.
 */

class AdmProdutosController extends AdmController {

    public $produtos_lista;
    public $produto_selecionado;
    public $imagens_produto;
    public $fornecedores;
    public $erro;
    public $sucesso;
    public $passo;
    public $variacao;
    public $combinacao;
    public $atributos;

    function Init($post, $pars){

        if(isset($pars['1']) && intval($pars['1'])){
            $this->produto_selecionado = $this->getProdutoSel($pars['1']);
        }

        if(isset($pars['1']) && ($pars['1'] == "E001" || $pars['1'] == "E002" || $pars['1'] == "E003" )){
            $this->erro = "Dados inválidos, confira todos os campos.";
        }

        $this->produtos_lista = $this->getProdutos();
        $this->show("ProdutosPage");
    }

    function getProdutos(){
        $selectProdutos = new ProdutosModel();
        return $produtos = $selectProdutos->selectProdutos();

    }

    function getProdutosCampanha($data,$pars){
        $selectProdutos = new ProdutosModel();
        $produtos = $selectProdutos->selectProdutosCampanha($pars[1]);

        echo json_encode($produtos);

    }

    function getFornecedores(){

        $selectFornecedores = new FornecedoresModel();
        return $fornecedores = $selectFornecedores->selectFornecedores();

    }

    function getAtributos(){

        $selectAtributos = new AtributosModel();
        $atributos = $selectAtributos->selectAtributos();

        foreach($atributos AS $k => $v){
            $val = (array) $v;
            $selectAtributosOpcoes = new AtributosModel();
            $atributosOpcoes = $selectAtributosOpcoes->selectAtributoOpcoes($val['id']);

            foreach($atributosOpcoes AS $key => $value){
                $arr[$val['nome']."_".$val['id']][] = (array) $value;
            }

        }

        return $arr;

    }

    function getEstoque($variacao){
        $selectEstoque = new ProdutosModel();
        return $estoque = $selectEstoque->selectEstoque($variacao);
    }

    function getLinhasEstoque($produto){
        $selectEstoque = new ProdutosModel();
        return $estoque = $selectEstoque->selectLinhasEstoque($produto);
    }

    function deleteEstoqueLine($variacao){
        $deleteEstoque = new ProdutosModel();
        return $estoque = $deleteEstoque->deleteEstoque($variacao);
    }

    function getProdutoSel($prod){
        $selectProduto = new ProdutosModel();
        return $produto = $selectProduto->selectProduto($prod);

    }

    function getProdutoImagens($prod){
        $selectProduto = new ProdutosModel();
        return $produto = $selectProduto->selectProdutoImagens($prod);

    }

    function selectImagemProduto($imagem){
        $selectProdutoImagem = new ProdutosModel();
        return $produto = $selectProdutoImagem->selectProdutoImagem($imagem);
    }

    function removeImagemProduto ($imagem){
        $deleteProdutoImagem = new ProdutosModel();
        $arr['id'] = $imagem;
        return $produto = $deleteProdutoImagem->deleteProdutoImagem($arr);
    }

    function getCategoriasPai(){
        $selectCategorias = new ProdutosModel();
        return $categorias = $selectCategorias->selectCategoriasPai();
    }

    function getCategoriasFilha($cat){
        $selectCategorias = new CategoriasModel();
        return $categorias = $selectCategorias->selectCategoriasFilhas($cat);
    }

    function getChecked($produto,$categoria){
        $arr['produto'] = $produto;
        $arr['categoria'] = $categoria;

        $selectProdutosCategorias = new ProdutosModel();
        $r= $selectProdutosCategorias->selectProdutosCategorias($arr);
        if(!empty($r)){return true; }else{ return false;}
    }

    function getChecked1($produto,$categoria){
        $arr['produto'] = $produto;
        $arr['categoria'] = $categoria;

        $selectProdutosCategorias = new ProdutosModel();
        $r= $selectProdutosCategorias->selectProdutosCategorias($arr);
        if(!empty($r)){return true; }else{ return false;}
    }

    function attrCombinacao($txt, $termos, $i){

        $texto = '';
        if ( $i >= count( $termos ) )
        {
            $texto .= trim( $txt ) . "|";
        }
        else
        {
            foreach ( $termos[$i] as $termo )
            {
                $texto .= $this->attrCombinacao( $txt . $termo . '##', $termos, $i + 1 );
            }
        }
        return $texto;

    }

    function getVariacao($produto){
        $selectProdutosVariacao = new ProdutosModel();
        $r= $selectProdutosVariacao->selectProdutosVariacao($produto);

        $arr = array();
        $variacao = (array) $r;
        foreach($variacao AS $key => $val){
            $v = (array) $val;
            $k = $v['atributo'];

            $arr[$k][] = $v['valor'];
        }

        return $arr;
    }

    function deleteAtributos($produto){
        $deleteProdutoAtributo = new ProdutosModel();
        $arr['produto'] = $produto;
        return $produto = $deleteProdutoAtributo->deleteProdutoAtributo($arr);
    }

    function insertAtributo($data){
        $insertProdutoAtributo = new ProdutosModel();
        return $produto = $insertProdutoAtributo->insertProdutoAtributo($data);
    }

    function verificaEstoque($produto){
        $selectProdutosEstoque = new ProdutosModel();
        return $r= $selectProdutosEstoque->selectProdutosEstoque($produto);
    }

    function addEstoque($variacao){
        $insertProdutosEstoque = new ProdutosModel();
        return $r= $insertProdutosEstoque->insertProdutosEstoque($variacao);
    }

    function updateEstoque($data){
        $updateProdutosEstoque = new ProdutosModel();
        return $r= $updateProdutosEstoque->updateProdutosEstoque($data);
    }


    function AddPage($data, $pars){

        if(isset($pars['1']) && intval($pars['1'])){
            $this->produto_selecionado = $this->getProdutoSel($pars['1']);
            $this->imagens_produto = $this->getProdutoImagens($pars['1']);
        }

        if((isset($pars['2']) && ($pars['2'] == "E002" || $pars['2'] == "E003")) || (isset($pars['1']) && $pars['1'] == "E001")){
            $this->erro = utf8_decode("Dados inválidos, confira todos os campos.");
            $this->passo = isset($pars['2']) ? $pars['2']:$pars['1'] ;
        }

        if(isset($pars['2']) && ($pars['2'] == "S001" || $pars['2'] == "S002" || $pars['2'] == "S003"  || $pars['2'] == "S004"   || $pars['2'] == "S005" || $pars['2'] == "S006" || $pars['2'] == "S007" ) ){
            $this->sucesso = "Dados cadastrados com sucesso!";
            $this->passo = $pars{'2'};
        }

        //ATRIBUTOS, VARIAÇÃO e ESTOQUE
        if(isset($pars['1']) && intval($pars['1'])){

            $variacao = $this->getVariacao($pars['1']);

            if(!empty($variacao)){
                $this->variacao = $variacao;
            }

            $this->estoque = $this->getLinhasEstoque($pars['1']);
        }


        $this->fornecedores = $this->getFornecedores();
        $this->atributos = $this->getAtributos();
        $this->show("ProdutosAddPage");
    }

    function removeImg ($data, $pars){

        if( isset($pars['1']) && intval($pars['1'])){

            $imagem = $this->selectImagemProduto($pars['1']);
            $imagem = (array) $imagem[0];

            $dirP = SITE_FTP_PATH.'\\'.$imagem['produto']."\\".$imagem['thumb'];
            $dirG = SITE_FTP_PATH.'\\'.$imagem['produto']."\\".$imagem['imagem'];
            //REMOVE IMAGEM DO DIRETORIO
            unlink($dirP);
            unlink($dirG);

            $this->removeImagemProduto($pars['1']);

            header("location:".SITE_PATH."adm-produtos-page-add/".$imagem['produto']."/S004");


        }


    }


    function Add($data,$pars){

        //Cadastro dados principais
        if($pars['1'] == "dados"){

            if($data['id'] == "0"){

                if(!empty($data['nome'])){

                    $arr['nome'] = $data['nome'];
                    $arr['referencia'] = $data['referencia'];
                    $arr['descricao'] = $data['descricao'];

                    $insertProduto = new ProdutosModel();
                    $r = $insertProduto->insertProduto($arr,"dados");

                    if($r){
                        header("location:".SITE_PATH."adm-produtos-page-add/".$r);
                    }

                }
                else{
                    header("location:".SITE_PATH."adm-produtos-page-add/E001");
                }

            }
            elseif($data['id'] > 0){

                if(!empty($data['nome'])){

                    $updateProduto = new ProdutosModel();
                    $r = $updateProduto->updateProduto($data,"dados");

                    if($r){
                        header("location:".SITE_PATH."adm-produtos-page-add/".$data["id"]."/S001");
                    }

                }


            }
            else{
                header("location:".SITE_PATH."adm-produtos-page-add/E001");
            }
        }
        elseif($pars['1'] == "preco"){

            if($data['id'] != 0){

                if(!empty($data['preco_compra']) && !empty($data['preco_mercado']) && !empty($data['desconto']) ){

                    $preco_venda = $data['preco_mercado'] - ($data['preco_mercado']*($data['desconto']/100));
                    $data['preco_venda'] = $preco_venda;

                    $updateProduto = new ProdutosModel();
                    $r = $updateProduto->updateProduto($data,"preco");

                    if($r){
                        header("location:".SITE_PATH."adm-produtos-page-add/".$data["id"]."/S002");
                    }

                }
                else{
                    header("location:".SITE_PATH."adm-produtos-page-add/".$data["id"]."/E002");
                }


            }
            else{
                header("location:".SITE_PATH."adm-produtos-page-add");
            }


        }
        elseif($pars['1'] == "peso"){

            if($data['id'] != 0){

                if(!empty($data['peso'])){
                    //if($data['frete_gratis'] == "on"){ $data['frete_gratis'] = 1; }else{ $data['frete_gratis'] = 0; }
                    $data['frete_gratis'] = 0;

                    $updateProduto = new ProdutosModel();
                    $r = $updateProduto->updateProduto($data,"peso");

                    if($r){
                        header("location:".SITE_PATH."adm-produtos-page-add/".$data["id"]."/S003");
                    }

                }
                else{
                    header("location:".SITE_PATH."adm-produtos-page-add/".$data["id"]."/E003");
                }


            }
            else{
                header("location:".SITE_PATH."adm-produtos-page-add");
            }


        }
        elseif($pars['1'] == "imagem"){

            if($data['id'] != 0){

                if(!empty($data['files']['imagemG']) && !empty($data['files']['imagemP'])){


                     if(file_exists(SITE_FTP_PATH.'/'.$data['id'])){
                        //MOVER IMAGEM PARA DIR
                         $ext = explode(".",$data['files']['imagemG']['name']);
                         $ext = array_reverse($ext);
                         $ext = ".".$ext[0];

                         $date = date("Y-m-d-H-i-s");

                         $dir = SITE_FTP_PATH.'/'.$data['id']."/";
                         $nomeImagemG = "imagemG(".$data['id'].")_".$date.$ext;
                         $nomeImagemP = "imagemP(".$data['id'].")_".$date.$ext;


                         move_uploaded_file($data['files']['imagemG']['tmp_name'], $dir.$nomeImagemG);
                         move_uploaded_file($data['files']['imagemP']['tmp_name'], $dir.$nomeImagemP);


                     }else{
                        //CRIAR DIR
                        $path =  SITE_FTP_PATH.'/'.$data['id'];
                        mkdir($path);

                         //MOVER IMAGEM PARA DIR
                         $ext = explode(".",$data['files']['imagemG']['name']);
                         $ext = array_reverse($ext);
                         $ext = ".".$ext[0];

                         $date = date("Y-m-d-H-i-s");

                         $dir = SITE_FTP_PATH.'/'.$data['id']."/";
                         $nomeImagemG = "imagemG(".$data['id'].")_".$date.$ext;
                         $nomeImagemP = "imagemP(".$data['id'].")_".$date.$ext;


                         move_uploaded_file($data['files']['imagemG']['tmp_name'], $dir.$nomeImagemG);
                         move_uploaded_file($data['files']['imagemP']['tmp_name'], $dir.$nomeImagemP);

                     }

                    $arr['produto'] = $data['id'];
                    $arr['imagem'] = $nomeImagemG;
                    $arr['thumb'] = $nomeImagemP;

                    $updateProduto = new ProdutosModel();
                    $r = $updateProduto->updateProduto($arr,"imagem");

                    if($r){
                        header("location:".SITE_PATH."adm-produtos-page-add/".$data["id"]."/S004");
                    }

                }
                else{
                    header("location:".SITE_PATH."adm-produtos-page-add/".$data["id"]."/E004");
                }


            }
            else{
                header("location:".SITE_PATH."adm-produtos-page-add");
            }


        }
        elseif($pars['1'] == "categorias"){

            if($data['id'] != 0){

                //ADICIONAR FORNECEDOR
                if(!empty($data['fornecedor'])){
                    $arr['fornecedor'] = $data['fornecedor'];
                    $arr['id'] = $data['id'];

                    $updateProduto = new ProdutosModel();
                    $updateProduto->updateProduto($arr,"fornecedor");
                    $arr = null;

                }

                $arr['produto'] = $data['id'];
                $deleteProdutosCategorias = new ProdutosModel();
                $deleteProdutosCategorias->deleteProdutosCategorias($arr);
                unset($data['files']);
                unset($data['fornecedor']);
                $arr = null;

                foreach($data AS $k => $v){
                    if($k != "id"){

                        $arr['produto'] = $data['id'];
                        $arr['categoria'] = $v;
                        $updateProduto = new ProdutosModel();
                        $updateProduto->updateProduto($arr,"categoria");

                    }

                }

                header("location:".SITE_PATH."adm-produtos-page-add/".$data["id"]."/S005");
            }

        }
        elseif($pars['1'] == "variacao"){


            if($data['id'] != 0){

                //DELETAR ATRIBUTOS VALOR
                $this->deleteAtributos($data['id']);

                $attrValor = array();
                foreach($data as $k => $v){

                    if(strpos($k, 'tributo')){
                        $a = explode("#", $v);

                        $attrValor[$a[1]][]= $a[0];

                        $linhaAtributo['produto'] = $data['id'];
                        $linhaAtributo['atributo'] = $a[1];
                        $linhaAtributo['valor'] = $a[0];

                        $this->insertAtributo($linhaAtributo);

                    }
                }

                $combinar = array();
                foreach( $attrValor as $k => $v )
                {
                    $combinar[] = $v;
                }
                $combinacao = $this->attrCombinacao('', $combinar, 0);

                $variacoes = explode('|',$combinacao);
                $combinacaoValida = array();


                foreach($variacoes as $chave => $valor){

                    $linha = explode("##",$valor);
                    $linhaLength = 5;

                    if($linha[0] > 0){

                        for($i=1; $i <= $linhaLength; $i++){
                            $variacao['atributo_'.$i] = $linha[$i-1] != "" ? $linha[$i-1]: 0;
                        }

                        $variacao['produto'] = $data['id'];

                        //Verificar se existe esta linha no estoque
                        $estoqueExiste = $this->getEstoque($variacao);

                        if(empty($estoqueExiste)){
                            $r = $this->addEstoque($variacao);
                            array_push($combinacaoValida, $r);
                        }
                        else{
                            $va = (array) $estoqueExiste[0];
                            array_push($combinacaoValida, $va['id']);
                        }


                    }
                }

                $this->deleteEstoqueLine($combinacaoValida);

                header("location:".SITE_PATH."adm-produtos-page-add/".$data["id"]."/S006");

            }

        }
        elseif($pars['1'] == "estoque"){


            if($data['id'] != 0){

                foreach($data as $k => $v ){
                    $k = explode("_",$k);
                    if($k['0'] && intval(($k['1']))){

                        $arr['id'] = $k['1'];
                        $arr['quantidade'] = $v;
                        $this->updateEstoque($arr);
                    }

                }

                header("location:".SITE_PATH."adm-produtos-page-add/".$data["id"]."/S007");

            }


        }

            else{
                header("location:".SITE_PATH."adm-produtos-page-add");
            }


        }


}