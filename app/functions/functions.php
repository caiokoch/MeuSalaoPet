<?php
function dd($params = [], $die = true){
    # utilizado para imprimir o que eu quiser nessa bagaça
    echo '<pre>';
        print_r($params);
    echo '</pre>';

    if($die) die();
}