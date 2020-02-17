<?php
class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val) { $this->val = $val; }
}
class Solution{
    //递归方法
    private $res = 0;
    public function addTwoNumbers($l1, $l2) {
        $node=new ListNode($this->res + $l1->val + $l2->val);
        if($this->res=intval($node->val >9)){
            $node->val -=10;
        }
        if($l1->next == null && $l2->next == null && !$this->res){
            $node->next = null;
        }else{
            $node->next = $this->addTwoNumbers($l1->next,$l2->next);
        }
        return $node;
    }

    //非递归方法
    public function addTwoNumbers2($l1,$l2){
        $high = 0;
        $cur = new ListNode(0);
        $head = $cur;
        while($l1 != null || $l2 != null){
            $l1v = $l1 == null ? 0 : $l1->val;
            $l2v = $l2 == null ? 0 : $l2->val;
            $add = $l1v + $l2v + $high;
            $high = intval($add/10);
            $cur->next = new ListNode($add%10);
            $cur = $cur->next;
            
            $l1 = $l1->next;
            $l2 = $l2->next;
        }
        if($high){
            $cur->next = new ListNode($high);
        }
        return $head->next;
    }
}


    $a = new ListNode(2);
    $b = new ListNode(4);
    $c = new ListNode(3);
    $d = new ListNode(5);
    $e = new ListNode(6);
    $f = new ListNode(4);
    $g = new ListNode(0);

    $a->next = $b;
    $b->next = $c;
    $d->next = $e;
    $e->next = $f;

    $obj = new Solution();
    $ret = $obj->addTwoNumbers2($a,$d);
    
    var_dump($ret);