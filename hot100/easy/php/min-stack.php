<?php

/**
 * 最小栈
 *
 * 设计一个支持 push ，pop ，top 操作，并能在常数时间内检索到最小元素的栈。
 * 实现 MinStack 类:
 *   MinStack() 初始化堆栈对象。
 *   void push(int val) 将元素val推入堆栈。
 *   void pop() 删除堆栈顶部的元素。
 *   int top() 获取堆栈顶部的元素。
 *   int getMin() 获取堆栈中的最小元素。
 *
 * Design a stack that supports push, pop, top, and retrieving the minimum element in constant time.
 * Implement the MinStack class:
 *   MinStack() initializes the stack object.
 *   void push(int val) pushes the element val onto the stack.
 *   void pop() removes the element on the top of the stack.
 *   int top() gets the top element of the stack.
 *   int getMin() retrieves the minimum element in the stack.
 *
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/problems/min-stack
 */

/**
 * 思想：
 *     每进入一个元素，就将最小值也 push 进去，相当于每次都 push 两个数，
 *     这样 pop 的时候也需要 pop 两次，
 *     数组最后一个元素就是最小值。
 *
 * Class MinStack1
 */
class MinStack1 {

    private $stack;

    /**
     * initialize your data structure here.
     */
    function __construct() {
        $this->stack = [];
    }

    /**
     * @param Integer $val
     * @return NULL
     */
    function push($val) {
        if (empty($this->stack)) {
            array_push($this->stack, $val);
            array_push($this->stack, $val);
        } else {
            $min = $this->getMin();
            array_push($this->stack, $val);
            $newMin = $val < $min ? $val : $min;
            array_push($this->stack, $newMin);
        }
    }

    /**
     * @return NULL
     */
    function pop() {
        array_pop($this->stack);
        array_pop($this->stack);
    }

    /**
     * @return Integer
     */
    function top() {
        return $this->stack[count($this->stack) - 2];
    }

    /**
     * @return Integer
     */
    function getMin() {
        return end($this->stack);
    }
}

/**
 * 思想：
 *     采用链表，每个节点会保存当前值、最小值、next。
 *
 * Class MinStack2
 */
class MinStack2 {

    private $stack;

    /**
     * initialize your data structure here.
     */
    function __construct() {
    }

    /**
     * @param Integer $val
     * @return NULL
     */
    function push($val) {
        if ($this->stack == null) {
            $this->stack = new Node($val, $val, null);
        } else {
            $this->stack = new Node($val, min($val, $this->stack->min), $this->stack);
        }
    }

    /**
     * @return NULL
     */
    function pop() {
        $this->stack = $this->stack->next;
    }

    /**
     * @return Integer
     */
    function top() {
        return $this->stack->val;
    }

    /**
     * @return Integer
     */
    function getMin() {
        return $this->stack->min;
    }
}

class Node
{
    public $val;
    public $min;
    public $next;

    public function __construct($val, $min, $next)
    {
        $this->val = $val;
        $this->min = $min;
        $this->next = $next;
    }
}

/**
 * Your MinStack object will be instantiated and called as such:
 * $obj = MinStack();
 * $obj->push($val);
 * $obj->pop();
 * $ret_3 = $obj->top();
 * $ret_4 = $obj->getMin();
 */