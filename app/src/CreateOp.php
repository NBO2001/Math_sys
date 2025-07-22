<?php
declare(strict_types=1);

namespace Tools;

class CreateOp
{
    private int $intervaloA;
    private int $intervaloB;

    public function __construct(int $inta, int $intab)
    {
        $this->intervaloA = $inta;
        $this->intervaloB = $intab;
    }

    public function getIntervaloA(): int
    {
        return $this->intervaloA;
    }

    public function getIntervaloB(): int
    {
        return $this->intervaloB;
    }

    

    //Generates the values
    private function valueGenerator(): int
    {
        return rand($this->intervaloA, $this->intervaloB);
    }

    // Recebe a quantidade de equações e a operação, e retorna um array.
    public function createOperetionUnic(int $qnt, string $operation): array
    {
        $quest = [];
        for ($ct = 0; $ct < $qnt; $ct++) {
            $quest[] = $this->crtArrayOps($ct, $operation);
        }
        return $quest;
    }

    //Gera com especificações
    public function createdFromAnArray(array $conf): array
    {
        $quest = [];
        $ctn = 0;
        foreach ($conf as $operation => $qnt) {
            for ($a = 0; $a < $qnt; $a++) {
                $quest[] = $this->crtArrayOps($ctn, (string)$operation);
            }
        }
        return $quest;
    }

    //Gera com todas as operações.
    public function creatEverEqual(int $qnt): array
    {
        $oper = [
            1 => '+',
            2 => '-',
            3 => '*',
            4 => '/',
        ];
        $quest = [];
        for ($ct = 0; $ct < $qnt; $ct++) {
            $quest[] = $this->crtArrayOps($ct, $oper[rand(1, 4)]);
        }
        return $quest;
    }

    public function crtArrayOps(int $ct, string $operation): array
    {
        $valueA = $this->valueGenerator();
        $valueB = $this->valueGenerator();
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
                while (($valueA%$valueB) != 0){
                    $valueA = $this->valueGenerator();
                    $valueB = $this->valueGenerator();
                }
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

    //Faz os Cálculos
    private function calcAddition(int|float $vA, int|float $vB): array
    {
        $opA = $vA + $vB;
        return $this->grOptions($opA, 0);
    }

    private function calcSubtraction(int|float $vA, int|float $vB): array
    {
        $opA = $vA - $vB;
        return $this->grOptions($opA, 0);
    }

    private function calcMultiplication(int|float $vA, int|float $vB): array
    {
        $opA = $vA * $vB;
        return $this->grOptions($opA, 0);
    }

    private function calcDivision(int|float $vA, int|float $vB): array
    {
        $opA = $vA / $vB;
        return $this->grOptions($opA, 0);
    }

    private function grOptions(float $opA, int $csD): array
    {
        $op = rand(1, 4);
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