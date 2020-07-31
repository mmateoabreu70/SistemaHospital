<?php

function asgInput($id, $label, $valor="",$opts=[]){

    $placeholder = "";
    $type = 'text';
    $comentario;
if (isset($_POST[$id])){
    $valor = $_POST[$id];
}

    extract($opts);
    

    return <<<INPUT
    <div class="container col-md-8">
        <div class="form-group">
            <label  for="{$id}">{$label}</label>
            <input value="{$valor}" placeholder="{$placeholder}" name = "{$id}" id="{$id}" type="{$type}" class="form-control" required>
            <div class="valid-feedback">Perfecto!!</div>
            <div class="invalid-feedback">Todos los campos son necesario!!</div>
        </div>
    </div>
INPUT;

}