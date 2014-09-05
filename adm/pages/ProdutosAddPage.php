
<?php

if($this->produto_selecionado){ $ps = (array) $this->produto_selecionado[0]; }
if($this->passo){ $passo = trim($this->passo); }

?>



<div class="box" >
    <h3>Cadastrar produto</h3>

    <div id="form" class="produto">
        <h2>Dados</h2>
        <p class="error" style="display: none"></p>
        <a class="scroll" <?php if($passo == "S001" || $passo == "E001"){ ?>data-scroll="true"<?php }else{ ?>data-scroll="false"<?php } ?> ></a>

        <?php if(!empty($this->erro) && $this->passo == "E001"){ ?>
            <p class="error"><?php echo $this->erro; ?></p>
        <?php } ?>

        <?php if(!empty($this->sucesso) && $this->passo == "S001"){ ?>
            <p class="success"><?php echo $this->sucesso; ?></p>
        <?php } ?>

        <form id="produtosForm" action="<?php echo SITE_PATH ?>adm-produtos-add/dados" method="post">

            <label>Nome<span class="obrigatorio">*</span></label>
            <input type="text" obrigatorio="true" name="nome" value="<?php echo $ps['nome']; ?>" /><br/>
            <label>Referencia</label>
            <input type="text" name="referencia" value="<?php echo $ps['referencia']; ?>" /><br/>
            <label>Descrição</label>
            <textarea name="descricao">
                <?php echo $ps['descricao']; ?>
            </textarea> <br/>
             <br/>

            <input type="hidden" name="id" value="<?php if($ps['id']){ echo $ps['id']; }else{ echo "0"; } ?>" />

            <button type="submit" class="submit">Enviar</button>

            <div class="formMessage"></div>
        </form>

    </div>

    <div id="form" class="produto">
        <h2>Preço</h2>
        <p class="error" style="display: none"></p>
        <a class="scroll" <?php if($passo == "S002" || $passo == "E002"){ ?>data-scroll="true"<?php }else{ ?>data-scroll="false"<?php } ?> ></a>

        <?php if(!empty($this->error) && $this->passo == "E002"){ ?>
            <p class="error"><?php echo $this->error; ?></p>
        <?php } ?>

        <?php if(!empty($this->sucesso) && $this->passo == "S002"){ ?>
            <p class="success"><?php echo $this->sucesso; ?></p>
        <?php } ?>

        <form id="produtosForm" action="<?php echo SITE_PATH ?>adm-produtos-add/preco" method="post">

            <label>Preço compra<span class="obrigatorio">*</span></label>
            <input type="text" obrigatorio="true" name="preco_compra" value="<?php echo number_format($ps['preco_compra'],2,".",""); ?>" /><br/>
            <label>Valor de mercado<span class="obrigatorio">*</span></label>
            <input type="text" obrigatorio="true" name="preco_mercado" value="<?php echo number_format($ps['preco_mercado'],2,".",""); ?>" /><br/>
            <label>Desconto(%)<span class="obrigatorio">*</span></label>
            <input type="text" obrigatorio="true" name="desconto" value="<?php echo $ps['desconto']; ?>" /><br/>
            <br/>
            <label>Preço Venda</label>
            <span class="preco_venda">  <?php echo number_format($ps['preco_venda'],2,".",""); ?> </span><br/>
            <br/>

            <input type="hidden" name="id" value="<?php if($ps['id']){ echo $ps['id']; }else{ echo "0"; } ?>" />

            <button type="submit" class="submit">Enviar</button>

            <div class="formMessage"></div>
        </form>

    </div>

    <div id="form" class="produto">
        <h2>Peso</h2>
        <p class="error" style="display: none"></p>
        <a class="scroll" <?php if($passo == "S003" || $passo == "E003"){ ?>data-scroll="true"<?php }else{ ?>data-scroll="false"<?php } ?> ></a>

        <?php if(!empty($this->erro) && $passo == "E003"){ ?>
            <p class="error"><?php echo $this->erro; ?></p>
        <?php } ?>

        <?php  if(!empty($this->sucesso) && $passo == "S003" ){  ?>
            <p class="success"><?php echo $this->sucesso; ?></p>
        <?php }?>

        <form id="produtosForm" action="<?php echo SITE_PATH ?>adm-produtos-add/peso" method="post">

            <label>Peso(Kg)<span class="obrigatorio">*</span></label>
            <input type="text" obrigatorio="true" name="peso" value="<?php echo number_format($ps['peso'],3,".",""); ?>" /><br/>
            <label>Peso cúbico</label>
            <input type="text" name="peso_cubico" value="<?php echo number_format($ps['peso_cubico'],3,".",""); ?>" /><br/>
            <!--<label>Frete gratis</label>
            <input type="checkbox" name="frete_gratis" <?php if($ps['frete_gratis'] == 1){ echo 'checked="checked"'; } ?> /><br/>
            -->
            <br/>
            <br/>

            <input type="hidden" name="id" value="<?php if($ps['id']){ echo $ps['id']; }else{ echo "0"; } ?>" />

            <button type="submit" class="submit">Enviar</button>

            <div class="formMessage"></div>
        </form>

    </div>

    <div id="form" class="produto">
        <h2>Imagens</h2>
        <p class="error" style="display: none"></p>
        <a class="scroll" <?php if($passo == "S004" || $passo == "E004"){ ?>data-scroll="true"<?php }else{ ?>data-scroll="false"<?php } ?> ></a>

        <?php if(!empty($this->error) && $passo == "E004"){ ?>
            <p class="error"><?php echo $this->error; ?></p>
        <?php } ?>

        <?php  if(!empty($this->sucesso) && $passo == "S004" ){  ?>
            <p class="success"><?php echo $this->sucesso; ?></p>
        <?php }?>

        <form id="produtosForm" action="<?php echo SITE_PATH ?>adm-produtos-add/imagem" method="post" enctype="multipart/form-data">

            <table class="imagens">
                <tr>
                    <td>Imagem Grande</td>
                    <td>Imagem Pequena</td>
                </tr>

                <tr>
                    <td><input type="file" name="imagemG" class="file" />  </td>
                    <td><input type="file" name="imagemP" class="file" /></td>
                </tr>

            </table>


            <input type="hidden" name="id" value="<?php if($ps['id']){ echo $ps['id']; }else{ echo "0"; } ?>" />

            <button type="submit" class="submit">Enviar</button>

        </form>

        <div class="imagens_produtos">
            <?php

                if($this->imagens_produto){
                    $pi = (array) $this->imagens_produto;

                    foreach($pi as $k => $dados){
                        $imagem = (array) $dados;
            ?>
               <div class="produto_imagem_ordem" >
                <img class="produto_imagem" src="<?php echo SITE_PATH."img/".$imagem['produto']."/".$imagem['thumb']; ?>"  />
                <a href="<?php echo SITE_PATH."adm-excluir-imagem/".$imagem['id']; ?>" onclick="return confirm('Deseja realmente remover a imagem?');" class="remover">REMOVER</a>
               </div>


            <?php
                    }
            } ?>
        </div>

    </div>

    <div id="form" class="produto">
        <h2>Fornecedor/Categorias</h2>
        <p class="error" style="display: none"></p>
        <a class="scroll" <?php if($passo == "S005" || $passo == "E005"){ ?>data-scroll="true"<?php }else{ ?>data-scroll="false"<?php } ?> ></a>

        <?php if(!empty($this->error) && $passo == "E005"){ ?>
            <p class="error"><?php echo $this->error; ?></p>
        <?php } ?>

        <?php  if(!empty($this->sucesso) && $passo == "S005" ){  ?>
            <p class="success"><?php echo $this->sucesso; ?></p>
        <?php }?>

        <form id="produtosForm" action="<?php echo SITE_PATH ?>adm-produtos-add/categorias" method="post" >

            <label>Fornecedor</label>
            <select name="fornecedor">
                <?php
                $fl = (array) $this->fornecedores;
                foreach($fl AS $k => $v){
                    $fornecedor = (array) $v;
                ?>
                    <option value="<?php echo $fornecedor['id']; ?>" <?php if($ps['fornecedor'] == $fornecedor['id']){ echo 'selected="selected"'; } ?> ><?php echo $fornecedor['nome_fantasia']; ?></option>
                <?php
                }
                ?>
            </select><br />

            <label>Categorias</label><br />

                   <div class="cat-filha-1">

                <?php
                    $categoriasPai = $this->getCategoriasPai();
                    $categoriasPai = (array) $categoriasPai;
                $i = 0;
                foreach($categoriasPai AS $catKey => $catVal){
                   $valor = (array) $catVal;
                   $checked = $this->getChecked($ps['id'],$valor['id']);
                ?>
                    <div>
                        <input id="<?php echo $valor['id']; ?>" name="cat_<?php echo $valor['id']; ?>" class="checkbox" type="checkbox" class="categorias" value="<?php echo $valor['id']; ?>" <?php if($checked){ ?> checked="checked" <?php } ?> />
                        <span><?php echo $valor['nome']; ?></span>

                        <?php
                            $categoriasFilha = $this->getCategoriasFilha($valor['id']);

                            foreach($categoriasFilha AS $cfKey => $cfVal){
                                $val = (array) $cfVal;
                                $check = $this->getChecked1($ps['id'],$val['id']);

                         ?>
                                <br />
                                <img class="imagem_seta" src="<?php echo SITE_PATH; ?>img/seta_preta.jpg" />
                                <input data-link="<?php echo $valor['id']; ?>" name="cat_<?php echo $val['id']; ?>" class="checkbox" type="checkbox" class="categorias" value="<?php echo $val['id']; ?>" <?php if($check){ ?> checked="checked" <?php } ?>   />
                                <span><?php echo $val['nome']; ?></span>
                        <?php    }
                        ?>



                    </div>

                <?php
                    //if($i != 0 && ($i % 3) == 0){ echo "</tr><tr>";   }
                    $i++;


                }
                ?>
                   </div>


            <input type="hidden" name="id" value="<?php if($ps['id']){ echo $ps['id']; }else{ echo "0"; } ?>" />

            <button type="submit" class="submit">Enviar</button>

            <div class="formMessage"></div>
        </form>

    </div>

    <div id="form" class="produto">
        <h2>Variação</h2>
        <p class="error" style="display: none"></p>
        <a class="scroll" <?php if($passo == "S006" || $passo == "E006"){ ?>data-scroll="true"<?php }else{ ?>data-scroll="false"<?php } ?> ></a>

        <?php if(!empty($this->error) && $passo == "E006"){ ?>
            <p class="error"><?php echo $this->error; ?></p>
        <?php } ?>

        <?php  if(!empty($this->sucesso) && $passo == "S006" ){  ?>
            <p class="success"><?php echo $this->sucesso; ?></p>
        <?php }?>

        <form id="produtosForm" action="<?php echo SITE_PATH ?>adm-produtos-add/variacao" method="post" >
            <?php
                if(!empty($this->atributos)){

                    foreach($this->atributos as $attr => $valor ){
                        $attr_nome = explode("_",$attr);
                    ?>
                        <h4><?php echo $attr_nome[0]; ?></h4><br />

                    <?php
                        foreach($valor as $k => $atributo ){
                            if(!empty($this->variacao)){
                                $in_array = in_array($atributo['id'], $this->variacao[$attr_nome[1]]);
                            }


                     ?>
                        <div class="atributos" >
                            <input type="checkbox" <?php if($in_array){ ?>checked="checked" <?php } ?> name="atributo_<?php echo $atributo['id']; ?>" value="<?php echo $atributo['id']."#".$attr_nome[1]; ?>" />
                            <img src="<?php echo SITE_PATH; ?>img/attr/<?php echo $atributo['imagem']; ?>" />
                        </div>

                    <?php    }


                    }



                }


            ?>

            <input type="hidden" name="id" value="<?php if($ps['id']){ echo $ps['id']; }else{ echo "0"; } ?>" />

            <button type="submit" class="submit">Enviar</button>

            <div class="formMessage"></div>
        </form>

    </div>

    <div id="form" class="produto">
        <h2>Estoque</h2>
        <p class="error" style="display: none"></p>
        <a class="scroll" <?php if($passo == "S007" || $passo == "E007"){ ?>data-scroll="true"<?php }else{ ?>data-scroll="false"<?php } ?> ></a>

        <?php if(!empty($this->erro) && $passo == "E007"){ ?>
            <p class="error"><?php echo $this->error; ?></p>
        <?php } ?>

        <?php  if(!empty($this->sucesso) && $passo == "S007" ){  ?>
            <p class="success"><?php echo $this->sucesso; ?></p>
        <?php }?>

        <form id="produtosForm" action="<?php echo SITE_PATH ?>adm-produtos-add/estoque" method="post" >

            <?php
               if(!empty($this->estoque)){

                    foreach($this->estoque as $k => $v){
                        $v = (array) $v;
                    ?>
                        <div class="variacao_estoque">
                    <?php

                        for($i=1; $i<=5; $i++){

                            if($v['atributo_'.$i] != 0){
                            ?>
                            <img src="<?php echo SITE_PATH ?>img/attr/Attr(<?php echo $v['atributo_'.$i]; ?>).jpg">

                           <?php }
                        }

                     ?>
                        <input type="text" name="estoque_<?php echo $v['id']; ?>" value="<?php echo $v['quantidade']; ?>">
                        </div>
                     <?php
                    }

               }
            ?>


            <input type="hidden" name="id" value="<?php if($ps['id']){ echo $ps['id']; }else{ echo "0"; } ?>" />

            <button type="submit" class="submit">Enviar</button>

            <div class="formMessage"></div>
        </form>

    </div>


</div>

