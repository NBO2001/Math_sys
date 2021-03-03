<?php

namespace Core;

class RouteCore{
    //Variables

    private $method;
    private $uri;
    private $arrGet;

    function __construct()
    {
        require_once "../app/config/config.php";

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
                    
                    $this->searchMethod($funcCall['Call']);
                    
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
                    
                    $this->searchMethod($funcCall['Call']);

            endif;

        }
        else
        {
            //ErrorsController@pgNotFound
           $this->searchMethod('ErrorsController@pgNotFound');
        }
    }

    /**
     * Method que procura a função
     */
    function searchMethod(string $call)
    {

        $funcCall = explode('@', $call);

        if(!isset($funcCall[0])):echo "erro";elseif(!isset($funcCall[1])):echo "erro";endif;

        $control = 'Control\\'.$funcCall[0];

        if(class_exists($control))
        {

            if(method_exists($control, $funcCall[1])){
                call_user_func_array([
                    new $control,
                    $funcCall[1]
                    ],[]);

            }
            else
            {
                echo "Method not is exit!";
            }

        }
        else
        {
            echo "Class not is exist";
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