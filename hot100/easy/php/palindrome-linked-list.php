<?php

/**
 * 回文链表
 *
 * 给你一个单链表的头节点 head ，请你判断该链表是否为回文链表。如果是，返回 true ；否则，返回 false 。
 *
 * 你能否用 O(n) 时间复杂度和 O(1) 空间复杂度解决此题？
 *
 * Given the head of a singly linked list, return true if it is a palindrome.
 *
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/problems/palindrome-linked-list
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
class Solution {

    /**
     * @param ListNode $head
     * @return Boolean
     */
    function isPalindrome($head) {
        if ($head == null) {
            return true;
        }

        // 找到前半部分链表的尾节点，并反转后半部分链表
        $firstHalfEnd = $this->endOfFirstHalf($head);
        $secondHalfStart = $this->reverseList($firstHalfEnd->next);

        // 判断是否回文
        $p1 = $head;
        $p2 = $secondHalfStart;
        $result = true;
        while ($result && $p2 != null) {
            if ($p1->val != $p2->val) {
                $result = false;
            }
            $p1 = $p1->next;
            $p2 = $p2->next;
        }

        // 还原链表并返回结果
        $this->reverseList($secondHalfStart);
        return $result;
    }

    /**
     * 寻找前半段的尾节点
     * @param $head
     * @return ListNode
     */
    function endOfFirstHalf($head)
    {
        $slow = $fast = $head;
        while ($fast->next && $fast->next->next) {
            $slow = $slow->next;
            $fast = $fast->next->next;
        }
        return $slow;
    }

    /**
     * 反转链表
     * @param $head
     * @return ListNode
     */
    function reverseList($head)
    {
        $pre = null;
        $curr = $head;
        while ($curr != null) {
            $nextTmp = $curr->next;
            $curr->next = $pre;
            $pre = $curr;
            $curr = $nextTmp;
        }
        return $pre;
    }
}