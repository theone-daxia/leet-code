<?php

/**
 * 反转链表
 *
 * 给你单链表的头节点 head ，请你反转链表，并返回反转后的链表。
 *
 * 链表可以选用迭代或递归方式完成反转。你能否用两种方法解决这道题？
 *
 * Given the head of a singly linked list, reverse the list, and return the reversed list.
 *
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/problems/reverse-linked-list
 */

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution1 {

    /**
     * 迭代
     * @param ListNode $head
     * @return ListNode
     */
    function reverseList($head) {
        $pre = null;
        $curr = $head;
        while ($curr) {
            $next = $curr->next;
            $curr->next = $pre;
            $pre = $curr;
            $curr = $next;
        }
        return $pre;
    }
}

class Solution2 {

    /**
     * 递归
     *
     * 思路：
     *     和迭代一样，都是重复将 curr 指向 pre
     *
     * @param ListNode $head
     * @return ListNode
     */
    function reverseList($head) {
        return $this->reverse(null, $head);
    }

    function reverse($pre, $curr) {
        if ($curr == null) {
            return $pre;
        }
        $next = $curr->next;
        $curr->next = $pre;
        $pre = $curr;
        $curr = $next;
        return $this->reverse($pre, $curr);
    }
}