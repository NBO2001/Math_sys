<?php

namespace Tools;

class ToolsAn{

    function dd(array $arr)
    {
    
    echo "<pre>";

    print_r($arr);

    echo "</pre>";
    
    }

    static function filtArray(array $arr)
    {
        $arr = array_filter($arr);

        $rt = array();

        foreach($arr as $arrayValue)
        {
            array_push($rt, $arrayValue);
        }

        return $rt;
    }

    static function post(string $field)
    {
        if(isset($_POST[$field]))
        {
            return $_POST[$field];
        }
        else
        {
            return false;
        }
    }
    private function verifyPrexi(string $prefix, $val)
    {
        $prefix = explode(":",$prefix);
  
        switch($prefix[0])
        {
  
           case "min":
  
              if($prefix[1] != 'null')
              {
  
                 $val = ($val >= $prefix[1])?$val:false;
  
                 return $val;
  
              }
  
              else
              {
  
                 return $val;
  
              }
  
              break;
        }
    }

    function validate(string $field,string $type, string $qt = "min:null")
    {
       
        $val = $this->post($field);
        if($val != false)
        {
          switch($type)
           {
              case "number":
  
                $val =preg_replace('/[^0-9]/','',$val);
                if(($this->verifyPrexi($qt,$val)) != false)
                {
  
                 return $val;
  
                }
                else
                {
  
                   return false;
  
                }            
              break;
           }
        }
    }

}