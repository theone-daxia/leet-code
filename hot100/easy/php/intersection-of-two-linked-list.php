<?php

/**
 * 相交链表
 *
 * 给你两个单链表的头节点 headA 和 headB ，请你找出并返回两个单链表相交的起始节点。如果两个链表不存在相交节点，返回 null 。
 * 题目数据 保证 整个链式结构中不存在环。
 * 注意，函数返回结果后，链表必须 保持其原始结构 。
 *
 * 进阶：你能否设计一个时间复杂度 O(m + n) 、仅用 O(1) 内存的解决方案？
 *
 * Given the heads of two singly linked-lists headA and headB, return the node at which the two lists intersect. If the two linked lists have no intersection at all, return null.
 * The test cases are generated such that there are no cycles anywhere in the entire linked structure.
 * Note that the linked lists must retain their original structure after the function returns.
 *
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/problems/intersection-of-two-linked-lists
 */

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */

class Solution {

    /**
     * 思路：
     *     两个链表 A、B，分两路走，
     *     一路走完 A 再走 B，一路走完 B 再走 A，
     *     这两条路的长度是相等的，
     *     如果有相交，那两个节点相等的时候就是相交的节点，
     *     如果没有相交，那它们会同时走完，最后为 null == null，返回 null 。
     *
     * @param ListNode $headA
     * @param ListNode $headB
     * @return ListNode
     */
    function getIntersectionNode($headA, $headB) {
        if ($headA == null || $headB == null) {
            return null;
        }
        $a = $headA;
        $b = $headB;
        while ($a != $b) {
            $a = $a == null ? $headB : $a->next;
            $b = $b == null ? $headA : $b->next;
        }
        return $a;
    }
}