<?php

$this->get('/', function(){
    (new \app\controller\TesteController)->index();
});

$this->get('/about/test', function(){
    echo'estou About test';
});
