<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-BR">
<?php $this->load->view('_partials/head'); ?>
<body>
<?php $this->load->view('_partials/header'); ?>
<div class="container container-person mt-5 p-5">
    <?=write_message()?>
    <h1>Pedido #<?=$order_id?></h1>

    <table id="order_table" class="table table-striped table-bordered table-responsive-sm" style="width:100%">
        <thead>
        <tr>
            <th>Nome</th>
            <th>SKU</th>
            <th>Preço</th>
            <th>Quantidade</th>
        </tr>
        </thead>
        <tbody>
        <?php if($products) { ?>
            <?php foreach ($products as $product) { ?>
                <tr>
                    <td><?= $product->nome ?></td>
                    <td><?= $product->sku ?></td>
                    <td>R$<?= $product->preco ?></td>
                    <td><?= $product->product_qtd ?></td>
                </tr>
            <?php }
        } else { ?>
            <td class="text-center" colspan="4">Não há produtos neste pedido</td>
        <?php } ?>
        </tbody>
    </table>
    <div class="row">
        <div class="col-sm-12">
            <h2 class="float-right mt-5">Total - R$<?= number_format($total, 2, ',','.') ?></h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <a href="#" data-id="<?=base_url('order/delete/'.$order_id)?>" class="btn btn-danger delete-order w-100 mt-5" data-toggle="modal" data-target="#deleteOrderModal">Excluir</a>
        </div>
    </div>
</div>
<?php $this->load->view('_partials/order/delete_order_confirm_modal'); ?>
<?php $this->load->view('_partials/scripts'); ?>
</body>

</html>