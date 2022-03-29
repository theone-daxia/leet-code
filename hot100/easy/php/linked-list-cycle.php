<?php

/**
 * 环形链表
 *
 * 如果链表中有某个节点，可以通过连续跟踪 next 指针再次到达，则链表中存在环。 为了表示给定链表中的环，评测系统内部使用整数 pos 来表示链表尾连接到链表中的位置（索引从 0 开始）。注意：pos 不作为参数进行传递 。仅仅是为了标识链表的实际情况。
 * 如果链表中存在环 ，则返回 true 。 否则，返回 false 。
 *
 * Given head, the head of a linked list, determine if the linked list has a cycle in it.
 * There is a cycle in a linked list if there is some node in the list that can be reached again by continuously following the next pointer. Internally, pos is used to denote the index of the node that tail's next pointer is connected to. Note that pos is not passed as a parameter.
 * Return true if there is a cycle in the linked list. Otherwise, return false.
 *
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/problems/linked-list-cycle
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
     * 思想：
     *     快慢指针
     *     慢的一次走一步，快的一次走两步，要是有环，他两肯定会相遇
     *
     * @param ListNode $head
     * @return Boolean
     */
    function hasCycle($head) {
        $slow = $head;
        $fast = $head;
        while ($fast && $fast->next) {
            $slow = $slow->next;
            $fast = $fast->next->next;
            if ($slow == $fast) {
                return true;
            }
        }
        return false;
    }
}