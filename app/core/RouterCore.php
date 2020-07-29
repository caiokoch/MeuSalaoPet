<?php
namespace app\core;

class RouterCore{
    private $uri;
    private $method;

    private $getArr = [];


    public function  __construct()
    {
        $this->initialize();
        require_once('../app/config/router.php');
        $this->execute();
    }
 
    private function initialize()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        $ex = explode('/', $uri);
        

        $uri = $this->normalizeUri($ex);

        for ($i = 0 ; $i < UNSET_URI_COUNT ; $i++) { 
            unset($uri[$i]);
        }
        $this->uri = implode('/', $this->normalizeUri($uri));
        if(DEBUG_URI)
            dd($this->uri);
    }

    private function get($router, $call)
    {
        $this->getArr[] = [
            'router' => $router,
            'call' => $call
        ];
    }

    private function execute()
    {
        switch ($this->method) {
            case 'GET':
                $this->executeGet();
                break;
            case 'POST':
                break;
        }
    }

    private function executeGet()
    {
        foreach ($this->getArr as $get) {
            $r = substr($get['router'], 1);
            if(substr($r,-1)== '/'){
                $r = substr($r,-1);
            }
            if($r == $this->uri){
                if(is_callable($get['call'])){
                    $get['call']();
                    break;
                }
            }
        }
    }

    private function normalizeUri($arr)
    {
        return array_values( array_filter($arr));
    }
}
