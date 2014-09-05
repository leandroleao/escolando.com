

<div class="box" >
    <br /><a id="button" class="add" href="<?php echo SITE_PATH ?>adm-produtos-page-add/" >Cadastrar novo</a>
    <h3>Produtos cadastrados</h3>


<table class="list" >
    <tr class="header">
        <td>ID</td>
        <td>Nome</td>
        <td>Editar</td>
        <td>Excluir</td>
    </tr>


<?php
$pl = $this->produtos_lista;

foreach($pl as $chave => $valor){
    $valor = (array) $valor;
 ?>
     <tr>
         <td><?php echo $valor['id']; ?></td>
         <td><?php echo $valor['nome']; ?></td>
         <td><a id="button" class="categorias-edit edit" href="<?php echo SITE_PATH ?>adm-produtos-page-add/<?php echo $valor['id']; ?>" >Editar</a></td>
         <td><a id="button" class="delete">Excluir</a></td>

     </tr>

<?php
    }
?>
</table>
</div>

