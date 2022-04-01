<?php

/**
 * 汉明距离
 *
 * 两个整数之间的 汉明距离 指的是这两个数字对应二进制位不同的位置的数目。
 * 给你两个整数 x 和 y，计算并返回它们之间的汉明距离。
 *
 * 你能在不使用额外空间且时间复杂度为 O(n) 的情况下解决这个问题吗? 你可以假定返回的数组不算在额外空间内。
 *
 * Given an array nums of n integers where nums[i] is in the range [1, n], return an array of all the integers in the range [1, n] that do not appear in nums.
 *
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/problems/find-all-numbers-disappeared-in-an-array
 */

class Solution {

    /**
     * 思路：
     *     先利用异或，找出 x 与 y 不同的位置，
     *     再数出 1 的个数即可（利用不断移除最右侧的 1 来数）。
     *
     * @param Integer $x
     * @param Integer $y
     * @return Integer
     */
    function hammingDistance($x, $y) {
        $distance = 0;
        $num = $x ^ $y;
        while ($num != 0) {
            $distance++;
            $num = $num & ($num - 1);
        }
        return $distance;
    }
}