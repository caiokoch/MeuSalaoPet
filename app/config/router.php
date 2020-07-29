<?php

$this->get('/', function(){
    echo'home';
});

$this->get('/home', function(){
    echo'estou home';
});


$this->get('/about/test', function(){
    echo'estou About test';
});
