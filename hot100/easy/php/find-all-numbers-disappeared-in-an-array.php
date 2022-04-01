<?php

/**
 * 找到所有数组中消失的数字
 *
 * 给你一个含 n 个整数的数组 nums ，其中 nums[i] 在区间 [1, n] 内。请你找出所有在 [1, n] 范围内但没有出现在 nums 中的数字，并以数组的形式返回结果。
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
     *     将所有正数作为数组下标，置对应数组值为负值。那么，仍为正数的位置即为（未出现过）消失的数字。
     *
     * @param Integer[] $nums
     * @return Integer[]
     */
    function findDisappearedNumbers($nums) {
        $res = [];
        foreach ($nums as $num) {
            $nums[abs($num) - 1] = -abs($nums[abs($num) - 1]);
        }
        foreach ($nums as $key => $num) {
            if ($num > 0) {
                $res[] = $key + 1;
            }
        }
        return $res;
    }
}