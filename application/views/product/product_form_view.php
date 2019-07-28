<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-BR">
<?php $this->load->view('_partials/head'); ?>
<body>
<?php $this->load->view('_partials/header'); ?>
<div class="container">
    <?=write_message()?>
    <?php
    $action_form = '/product/save/';
    if(isset($product) && $product){
        foreach ($product as $produto);
        $action_form = $action_form.$produto->id ?>
        <h1>Editar Produto: <?= $produto->nome ?></h1>
    <?php } else { ?>
        <h1>Cadastro de Produto</h1>
    <?php } ?>
    <form id="form_product" method="post" enctype="multipart/form-data" action="<?=site_url($action_form)?>">
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="nome">Nome *</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required value="<?= (isset($produto) ? $produto->nome : '') ?>">
            </div>
            <div class="col-md-4 mb-3">
                <label for="sku">SKU *</label>
                <input type="text" class="form-control" id="sku" name="sku" placeholder="SKU" required value="<?= (isset($produto) ? $produto->sku : '') ?>">
            </div>
            <div class="col-md-4 mb-3">
                <label for="preco">Preço *</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">R$</span>
                    </div>
                    <input type="number" class="form-control" id="preco" name="preco" placeholder="Preço" min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" aria-describedby="inputGroupPrepend" required value="<?= (isset($produto) ? $produto->preco : '') ?>">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-12 mb-3">
                <label for="descricao">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao" placeholder="Descrição"><?= (isset($produto) ? htmlspecialchars($produto->descricao) : '') ?></textarea>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Enviar</button>
        <?= (isset($produto) ? '<a href="#" data-id="'.base_url('product/delete/'.$produto->id).'" class="btn btn-danger delete-product" data-toggle="modal" data-target="#deleteProductModal">Excluir</a>' : '') ?>
    </form>
</div>
<?php $this->load->view('_partials/product/delete_product_confirm_modal'); ?>
<?php $this->load->view('_partials/scripts'); ?>
</body>

</html>