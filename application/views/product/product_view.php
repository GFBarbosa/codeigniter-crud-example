<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-BR">
<?php $this->load->view('_partials/head'); ?>
<body>
<?php $this->load->view('_partials/header'); ?>
<div class="container container-person mt-5 p-5">
    <?=write_message()?>
    <h1>Produtos</h1>
    <div class="col-md-12 mb-3">
        <div class="row">
            <a class="btn btn-primary" href="<?= base_url('product/form/') ?>">Novo Produto</a>
        </div>
    </div>
    <table id="product_table" class="table table-striped table-bordered table-responsive-sm" style="width:100%">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>SKU</th>
            <th>Preço</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if($products) {
            foreach ($products as $product) { ?>
                <tr>
                    <td><?= $product->id ?></td>
                    <td><?= $product->nome ?></td>
                    <td><?= $product->sku ?></td>
                    <td>R$<?= $product->preco ?></td>
                    <td><a href="<?= base_url('product/form/'.$product->id) ?>">Edit</a></td>
                    <td><a class="delete-product" href="#" data-id="<?= base_url('product/delete/'.$product->id) ?>" data-toggle="modal" data-target="#deleteProductModal">Delete</a></td>
                </tr>
            <?php }
        } else { ?>
            <td class="text-center" colspan="6">Não há produtos</td>
        <?php } ?>
        </tbody>
    </table>
</div>
<?php $this->load->view('_partials/product/delete_product_confirm_modal'); ?>
<?php $this->load->view('_partials/scripts'); ?>
</body>

</html>