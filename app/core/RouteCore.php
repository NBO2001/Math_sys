<?php

namespace Core;

class RouteCore{
    //Variables
    private $method;
    private $uri;

    private $arrGet;

    function dd(array $arr)
    {
    
    echo "<pre>";

    print_r($arr);

    echo "</pre>";
    
    }
    

    function __construct()
    {
        require_once "/var/www/Math_sys/app/config/config.php";
        $this->initialize();
        require_once HOME."/app/config/Routes.php";
        $this->execute();
        
    }
    function initialize()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];

        $uri = $this->prepareUri($_SERVER['REQUEST_URI']);

        $this->uri = $uri;
       
    }

    function get($path, $call)
    {
        
        $this->arrGet[] =  [
            'Route' => $path,
            'Call'  => $call
        ];
        
    }
    function post($path, $call)
    {
        $this->arrGet[] =  [
            'Route' => $path,
            'Call'  => $call
        ];
    }

    function execute()
    {
        switch($this->method)
        {
            case "GET":
                $this->exeGet();
                break;

            case "POST":
                $this->exePost();
                break;
        } 
    }

    function exePost()
    {
        $in = $this->searchRoute();

        if($in != -1)
        {
            $funcCall =  $this->arrGet[$in];
            
                if(is_callable($funcCall['Call'])):
                    $funcCall['Call']();
                else:
                    
                    // $funcCall = explode('@',$funcCall['Call']);
                    // $control = $funcCall[0];
                    // $controlPath = HOME."/app/controller/".$funcCall[0].".php";

                    // $method = $funcCall[1];
                    // echo $controlPath;
                    // // echo $control;
                    // require_once "$controlPath";
                    //  $bs = new '{$control}';
                    // echo $control;
                    // // $bs->seta();
                    
                    // // $ns->$method();
                    
            endif;

        }
        else
        {
            echo "error";
        }
    }

    function exeGet(){
        $in = $this->searchRoute();

        if($in != -1)
        {
            $funcCall =  $this->arrGet[$in];
            
                if(is_callable($funcCall['Call'])):
                    $funcCall['Call']();
                else:
                    
                    // $funcCall = explode('@',$funcCall['Call']);
                    // $control = $funcCall[0];
                    // $controlPath = HOME."/app/controller/".$funcCall[0].".php";

                    // $method = $funcCall[1];
                    // echo $controlPath;
                    // // echo $control;
                    // require_once "$controlPath";
                    //  $bs = new '{$control}';
                    // echo $control;
                    // // $bs->seta();
                    
                    // // $ns->$method();
                    
            endif;

        }
        else
        {
            echo "error";
        }
    }

    function searchRoute()
    {
        $i = 0;
        $in = -1;

        foreach($this->arrGet as $arr)
        {
            $routes = $this->prepareUri($arr['Route']);
            $uri = $this->uri;
            $route = implode('/',$routes);
            $uri = implode('/',$uri);

            if($route == $uri)
            {
                $in = $i;

             }
            
             $i++;
        }
        return $in;
    }

    function prepareUri($uri)
    {
        $uri = array_filter(explode('/',$uri));

        if(count($uri) == 0):$uri = array_filter(explode('/','/home'));endif;

        return $uri;
    }
}