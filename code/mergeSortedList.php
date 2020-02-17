<?php
class Node{
    public $value;
    public $next;
    public function __construct($value){
        $this->value = $value;
    }
}

function mergeList($lists){
    if(empty($lists)){
        return;
    }
    $n = count($lists);
    $a = $lists[0];
    for($i = 1; $i < $n; $i++){
        $b = $lists[$i];
        $a = merge($a,$b);
    }
    return $a;
}

function merge($a,$b){
    if(empty($a)){
        return $b;
    }
    if(empty($b)){
        return $a;
    }
    if($a->value <= $b->value){
        $head = $a;
        $a = $a->next;
    }else{
        $head = $b;
        $b = $b->next;
    }
    $p = $head;
    while($a != null && $b != null){
        if($a->value >= $b->value){
            $p->next = $b;
            $b = $b->next;
        }else{
            $p->next = $a;
            $a = $a->next;
        }
        $p = $p->next;
    }
    if($a == null){
        $p->next = $b;
    }
    if($b == null){
        $p->next = $a;
    }
    return $head;
}

$a = new Node(1);
$b = new Node(4);
$c = new Node(7);
$d = new Node(2);
$e = new Node(8);
$f = new Node(5);
$g = new Node(6);
$h = new Node(9);

$a->next = $b;
$b->next = $c;
$d->next = $e;
$f->next = $g;
$g->next = $h;
// var_dump($a);
$ret = mergeList([$a,$d,$f]);
var_dump($ret);