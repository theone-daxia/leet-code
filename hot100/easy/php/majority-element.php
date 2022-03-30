<?php

/**
 * 多数元素
 *
 * 给定一个大小为 n 的数组，找到其中的多数元素。多数元素是指在数组中出现次数 大于 ⌊ n/2 ⌋ 的元素。
 * 你可以假设数组是非空的，并且给定的数组总是存在多数元素。
 *
 * 尝试设计时间复杂度为 O(n)、空间复杂度为 O(1) 的算法解决此问题。
 *
 * Given an array nums of size n, return the majority element.
 * The majority element is the element that appears more than ⌊n / 2⌋ times. You may assume that the majority element always exists in the array.
 *
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/problems/majority-element
 */

class Solution {

    /**
     * 思路：
     *     既然多数元素的数量是大于 ⌊ n/2 ⌋ 的，那就可以用消除法，
     *     让多数元素跟不相等的元素相互抵消，那最终留下来的元素肯定就是多数元素。
     *
     * @param Integer[] $nums
     * @return Integer
     */
    function majorityElement($nums) {
        $a = null;
        $count = 0;
        foreach ($nums as $num) {
            if ($a == null) {
                $a = $num;
            }
            if ($a == $num) {
                $count++;
            } else {
                $count--;
                if ($count == 0) {
                    $a = null;
                }
            }
        }
        return $a;
    }
}