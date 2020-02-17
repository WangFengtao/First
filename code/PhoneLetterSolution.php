<?php
class PhoneLetterSolution{
    public $phone = [
        2 => 'abc',
        3 => 'def',
        4 => 'ghi',
        5 => 'jkl',
        6 => 'mno',
        7 => 'pqrs',
        8 => 'tuv',
        9 => 'wxyz',
    ];
    public $output = [];
    public function letterCombinations($digits){
        if(strlen($digits) == 0){
            return [];
        }
        $this->backTrace('',$digits);
        return $this->output;
    }
    public function backTrace($combination,$nextDigit){
        $len = strlen($nextDigit);
        if($len == 0){
            array_push($this->output,$combination);
        }else{
            $digit = substr($nextDigit,0,1);
            $letters = $this->phone[$digit];
            for($i = 0; $i < strlen($letters); $i++){
                $str = $combination.$letters[$i];
                $ne = substr($nextDigit,-$len+1,$len-1);
                $this->backTrace($str,$ne);
            }
        }
    }
}

$obj = new PhoneLetterSolution();
$input = '24';
$res = $obj->letterCombinations($input);
var_dump($res);