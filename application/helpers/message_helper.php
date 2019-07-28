<?php
function write_message()
{
    $CI = & get_instance();
    $mensagem = $CI->session->flashdata('mensagem');
    if(is_array($mensagem))
    {
        echo '<div class="alert alert-'.$mensagem[0].'" role="alert">';
        echo $mensagem[1];
        echo '</div>';
    }
}