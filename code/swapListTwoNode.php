<?php
class ListNode{
    public $val = 0;
    public $next = null;
    function __construct($val) { $this->val = $val; }
}
class swapListTwoNode {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function swapPairs($head) {
        if($head->next != null){
            $tmp = $head->next;
        }else{
            $tmp = $head;
        }
        while($head->next != null){
             $next = $head->next;
             $cur = $next->next;
             $next->next = $head;
             if($cur->next != null){
                 $head->next = $cur->next;
             }else{
                 $head->next = $cur;
             }
             $head = $cur;
        }
        return $tmp;
    }
}

$a = new ListNode(1);
$b = new ListNode(2);
$c = new ListNode(3);
$d = new ListNode(4);
$e = new ListNode(5);
$f = new ListNode(6);
$g = new ListNode(7);
$h = new ListNode(8);
$i = new ListNode(9);
$a->next = $b;
$b->next = $c;
$c->next = $d;
$d->next = $e;
$e->next = $f;
$f->next = $g;
$g->next = $h;
$h->next = $i;

$aa = new ListNode(0);
$aa->next = null;

$obj = new swapListTwoNode();
$res = $obj->swapPairs($aa);
var_dump($res);
