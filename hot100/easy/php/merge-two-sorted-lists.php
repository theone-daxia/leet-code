<?php

/**
 * 合并两个有序链表
 *
 * You are given the heads of two sorted linked lists list1 and list2.
 * Merge the two lists in a one sorted list. The list should be made by splicing together the nodes of the first two lists.
 * Return the head of the merged linked list.
 *
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/problems/merge-two-sorted-lists
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
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function mergeTwoLists($l1, $l2)
    {
        $head = new ListNode();
        $p = $head;
        do {
            if ($l1->val <= $l2->val) {
                $p->next = $l1;
                $l1 = $l1->next;
            } else {
                $p->next = $l2;
                $l2 = $l2->next;
            }
            $p = $p->next;
        } while ($l1 != null && $l2 != null);
        if ($l1 == null) {
            $p->next = $l2;
        }
        if ($l2 == null) {
            $p->next = $l1;
        }
        return $head->next;
    }
}

/**
 * Class Solution2
 *
 * 采用递归方式
 */
class Solution2 {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function mergeTwoLists($l1, $l2)
    {
        if (empty($l1)) {
            return $l2;
        }
        if (empty($l2)) {
            return $l1;
        }
        if ($l1->val < $l2->val) {
            $l1->next = $this->mergeTwoLists($l1->next, $l2);
            return $l1;
        } else {
            $l2->next = $this->mergeTwoLists($l1, $l2->next);
            return $l2;
        }
    }
}