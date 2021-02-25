<?php
class CreatOp{
    function createOperetionUnic(int $qnt, string $operation){
        $quest = array();
        for($ct=0; $ct <= $qnt; $ct++){
            array_push($quest,$this->crtArrayOps($ct, $operation));
        }        
        return $quest;
    }
    function creatEverEqual($qnt){
        $oper = array(
            1 => "+",
            2 => "-",
            3 => "*",
            4 => "/"
        );
        $quest = array();
        for($ct=0; $ct <= $qnt; $ct++){
            array_push($quest,$this->crtArrayOps($ct, $oper[rand(1,3)]));
        }        
        return $quest;
    }
    function crtArrayOps($ct, $operation){
        $valueA = rand(1,100);
        $valueB = rand(1,100);
        switch($operation){
            case "+":
                $operationName = "Addition";
                $result = $this->calcAddition($valueA,$valueB);
            break;
            case "-":
                $operationName = "Subtraction";
                $result = $this->calcSubtraction($valueA,$valueB);
            break;
            case "*":
                $operationName = "Multiplication";
                $result = $this->calcMultiplication($valueA,$valueB);
            break;
            case "/":
                $operationName = "Division";
                $result = $this->calcDivision($valueA,$valueB);
            break;
        };
        
            $questa = array(
                $ct => array(
                    "ValueA" => $valueA,
                    "ValueB" => $valueB,
                    "Operation" => $operation,
                    "OperatinName" => $operationName,
                    "Options" => $result
                )
            );
            return $questa;
    }

    function calcAddition($vA, $vB){
        $opA = $vA + $vB;
        return $this->grOptions($opA,0);    
    }
    
    function calcSubtraction($vA, $vB){
         $opA = $vA - $vB;
        return $this->grOptions($opA,0);        
    }
    function calcMultiplication($vA, $vB){
        $opA = $vA * $vB;
        return $this->grOptions($opA,0);   
    }
    function calcDivision($vA,$vB){
        $opA = $vA / $vB;
        return $this->grOptions($opA,2);   
    }

    private function grOptions($opA,$csD){
        $op = rand (1,4);
        switch($op){
            case 1:
                $opB = $opA + rand(2,5);
                $opC = $opA - rand(2,5);
                $opD = $opA + rand(6,10);
                $options = array(
                    "First" => number_format($opB,$csD,',','.'),
                    "Second" => number_format($opA,$csD,',','.'),
                    "Third" => number_format($opC,$csD,',','.'),
                    "Fourth" => number_format($opD,$csD,',','.'),
                    "Result" => "Second"
                );
            break;
            case 2:
                $opB = $opA + rand(1,3);
                $opC = $opA - rand(1,3);
                $opD = $opA + rand(4,10);
                $options = array(
                    "First" => number_format($opA,$csD,',','.'),
                    "Second" => number_format($opD,$csD,',','.'),
                    "Third" => number_format($opC,$csD,',','.'),
                    "Fourth" => number_format($opB,$csD,',','.'),
                    "Result" => "First"
                );
            break;
            case 3:
                $opB = $opA - rand(1,10);
                $opC = $opA + rand(1,3);
                $opD = $opA + rand(4,10);
                $options = array(
                    "First" => number_format($opC,$csD,',','.'),
                    "Second" => number_format($opB,$csD,',','.'),
                    "Third" => number_format($opA,$csD,',','.'),
                    "Fourth" => number_format($opD,$csD,',','.'),
                    "Result" => "Third"
                );
            break;
            case 4:
                $opB = $opA + rand(1,3);
                $opC = $opA - rand(1,2);
                $opD = $opA + rand(4,10);
                $options = array(
                    "First" => number_format($opD,$csD,',','.'),
                    "Second" => number_format($opC,$csD,',','.'),
                    "Third" => number_format($opB,$csD,',','.'),
                    "Fourth" => number_format($opA,$csD,',','.'),
                    "Result" => "Fourth"
                );
            break;
        };
        return $options;   
    }    
}