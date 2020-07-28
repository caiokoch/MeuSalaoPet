<?php

namespace app\controller;

class TesteController
{
    public function __construct()
    {
        echo 'estamos aqui';
    }

    public function seta(){
        return ['nome' => 'Caio'];
    }
}