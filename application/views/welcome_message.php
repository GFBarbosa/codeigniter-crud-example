<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-BR">
<?php $this->load->view('partials/head'); ?>
<body>
<?php $this->load->view('partials/header'); ?>
<div class="container">
    <h1>Produtos</h1>
    <table id="product_table" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>ID</th>
            <th>SKU</th>
            <th>Nome</th>
            <th>Preço</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if($products) {
            foreach ($products as $product) { ?>
                <tr>
                    <td><?= $product->id ?></td>
                    <td><?= $product->sku ?></td>
                    <td><?= $product->nome ?></td>
                    <td>R$<?= $product->preco ?></td>
                </tr>
            <?php }
        } else { ?>
            <td class="text-center" colspan="4">Não há produtos</td>
        <?php } ?>
        </tbody>
    </table>
</div>
<?php $this->load->view('partials/scripts'); ?>
</body>

</html>