<?php
class Parenthesis {

    public $output = [];
    /**
     * @param Integer $n
     * @return String[]
     */
    function generateParenthesis($n) {
        if($n == 0){
            return [];
        }
        $this->addChar('',0,0,$n);
        return $this->output;
    }

    function addChar($char, $start, $end, $n){
        if(strlen($char) == $n * 2){
            array_push($this->output, $char);
            return;
        }
        if($start < $n){
            $this->addChar($char.'(',$start+1,$end,$n);
        }
        if($end < $start){
            $this->addChar($char.')',$start,$end+1,$n);
        }
    }
}

$obj = new Parenthesis();
$res = $obj->generateParenthesis(4);
var_dump($res);