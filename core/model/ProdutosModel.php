<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Leão
 * Date: 10/05/14
 * Time: 00:03
 * To change this template use File | Settings | File Templates.
 */

class ProdutosModel extends BaseModel{

    function selectProdutos(){

        $r = $this->select("produtos","*");
        return  $r;
    }

    function selectProdutosCampanha($data){

        $r = $this->select("produtos","*");
        return  $r;
    }



    function selectFornecedores(){

        $r = $this->select("fornecedores","id, nome");
        return  $r;
    }

    function selectCategoriasPai(){

        $r = $this->select("categorias","id, nome"," pai=0");
        return  $r;
    }

    function selectProdutosCategorias($data){
        $r = $this->select("produtos_categorias","id"," produto=".$data['produto']." AND categoria=".$data['categoria']);
        return $r;
    }

    function selectEstoque($variacao){

        $cond = array();
        foreach($variacao as $k => $v){
             $cond[] = $k."=".$v;
        }

        $cond = implode(" AND ", $cond);
        $r = $this->select("estoque","id",$cond);
        return $r;
    }

    function selectLinhasEstoque($produto){
        $r = $this->select("estoque","*","produto=".$produto);
        return $r;
    }

    function deleteEstoque($data){

        $cond = array();

        foreach($data as $k => $v){
            $cond[] = "id!=".$v;
        }

        $cond = "(".implode(" AND ", $cond).")";

        $r = $this->delete("estoque",$cond);
        return $r;
    }

    function selectProdutosVariacao($produto){
        $r = $this->select("produtos_atributos_valor","DISTINCT(valor), atributo"," produto=".$produto);
        return $r;
    }

    function selectProdutosEstoque($produto){
        $r = $this->select("estoque","*"," produto=".$produto);
        return $r;
    }

    function deleteProdutosCategorias($data){
        $q = "DELETE FROM produtos_categorias  WHERE produto=:produto";
        $r = $this->query($q,$data);
        return $r;
    }

    function insertProdutosEstoque($variacao){

        foreach($variacao as $k => $v){

            if(strpos($k, 'tributo')){
                $fields[]= $k;
                $values[] = ":".$k;
            }
        }
        $fields[] = "produto";
        $values[] = ":produto";
        $fields = "(".implode(', ',$fields).")";
        $values = "(".implode(', ',$values).")";

        $q = "INSERT INTO estoque $fields VALUES $values";
        $r = $this->query($q,$variacao);
        return $r;
    }

    function updateProdutosEstoque($data){

        $q = "UPDATE estoque SET quantidade=:quantidade WHERE id=:id";
        $r = $this->query($q,$data);
        return $r;
    }



    function selectProduto($prod){

        $r = $this->select("produtos","*"," id=".$prod);
        return  $r;
    }

    function selectProdutoImagens($prod){

        $r = $this->select("produtos_imagens","*"," produto=".$prod);
        return  $r;
    }

    function selectProdutoImagem($imagem){
        $r = $this->select("produtos_imagens","*"," id=".$imagem);
        return  $r;
    }

    function deleteProdutoImagem($data){
        $q = "DELETE FROM produtos_imagens  WHERE id=:id";
        $r = $this->query($q,$data);
        return $r;
    }


    function deleteProdutoAtributo($data){
        $q = "DELETE FROM produtos_atributos_valor  WHERE produto=:produto";
        $r = $this->query($q,$data);
        return $r;
    }


    function insertProduto($data){
        $q = "INSERT INTO produtos (nome,referencia,descricao) VALUES (:nome,:referencia,:descricao)";
        $r = $this->query($q,$data);
        return $r;
    }

    function insertProdutoAtributo($data){
        $q = "INSERT INTO produtos_atributos_valor (produto, atributo, valor) VALUES (:produto, :atributo, :valor)";
        $r = $this->query($q,$data);
        return $r;
    }


    function updateProduto($data, $campo){

        if($campo == "dados"){
            $q = "UPDATE produtos SET nome=:nome, descricao=:descricao, referencia=:referencia WHERE id=:id";
            $r = $this->query($q,$data);
            return $r;
        }
        elseif($campo == "preco"){
            $q = "UPDATE produtos SET preco_compra=:preco_compra, preco_mercado=:preco_mercado, desconto=:desconto, preco_venda=:preco_venda WHERE id=:id";
            $r = $this->query($q,$data);
            return $r;
        }
        elseif($campo == "peso"){
            $q = "UPDATE produtos SET peso=:peso, peso_cubico=:peso_cubico, frete_gratis=:frete_gratis WHERE id=:id";
            $r = $this->query($q,$data);
            return $r;
        }
        elseif($campo == "imagem"){
            $q = "INSERT INTO produtos_imagens (produto, imagem, thumb) VALUES (:produto, :imagem, :thumb)";
            $r = $this->query($q,$data);
            return $r;
        }
        elseif($campo == "fornecedor"){
            $q = "UPDATE produtos SET fornecedor=:fornecedor WHERE id=:id";
            $r = $this->query($q,$data);
            return $r;
        }
        elseif($campo == "categoria"){
            $q = "INSERT INTO produtos_categorias (produto,categoria) VALUES (:produto, :categoria)";
            $r = $this->query($q,$data);
            return $r;
        }

    }

}