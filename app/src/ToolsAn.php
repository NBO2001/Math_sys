<?php
declare(strict_types=1);

namespace Tools;

class ToolsAn
{
    public function dd(array $arr): void
    {
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
    }

    public static function filtArray(array $arr): array|false
    {
        $arr = array_filter($arr);
        if (count($arr)) {
            $rt = [];
            foreach ($arr as $arrayValue) {
                $rt[] = $arrayValue;
            }
            return $rt;
        }
        return false;
    }

    public static function post(string $field): array|string|false
    {
        $value = filter_input(INPUT_POST, $field, FILTER_DEFAULT);
        return $value !== null ? $value : false;
    }
    private function verifyPrexi(string $prefix, int|string $val): int|string|false
    {
        $prefix = explode(':', $prefix);
        switch ($prefix[0]) {
            case 'min':
                if ($prefix[1] !== 'null') {
                    $val = ($val >= $prefix[1]) ? $val : false;
                    return $val;
                }

                return $val;
        }

        return false;
    }

    public function validate(string $field, string $type, string $qt = 'min:null'): int|string|false
    {
        $val = self::post($field);
        if ($val === false) {
            return false;
        }

        switch ($type) {
            case 'number':
                $val = preg_replace('/[^0-9]/', '', (string)$val);
                return $this->verifyPrexi($qt, $val);
        }

        return false;
    }

}