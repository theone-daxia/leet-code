<?php

/**
 * 移动零
 *
 * 给定一个数组 nums，编写一个函数将所有 0 移动到数组的末尾，同时保持非零元素的相对顺序。
 * 请注意 ，必须在不复制数组的情况下原地对数组进行操作。
 *
 * 你能尽量减少完成的操作次数吗？
 *
 * Given an integer array nums, move all 0's to the end of it while maintaining the relative order of the non-zero elements.
 * Note that you must do this in-place without making a copy of the array.
 *
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/problems/move-zeroes
 */

class Solution1 {

    /**
     * 思路：
     *     只要非零，就 unset 掉，然后在最后加上一个零。
     *
     * @param Integer[] $nums
     * @return NULL
     */
    function moveZeroes(&$nums) {
        foreach ($nums as $key => $num) {
            if ($num == 0) {
                unset($nums[$key]);
                array_push($nums, 0);
            }
        }
    }
}

class Solution2 {

    /**
     * 思路：
     *     将所有非零的数，从头往后重新放置，
     *     然后将剩下的位置都放零。
     *
     * @param Integer[] $nums
     * @return NULL
     */
    function moveZeroes(&$nums) {
        $index = 0;
        foreach ($nums as $key => $num) {
            if ($num != 0) {
                $nums[$index] = $num;
                $index++;
            }
        }
        for ($i = $index; $i < count($nums); $i++) {
            $nums[$i] = 0;
        }
    }
}

class Solution3 {

    /**
     * 思路：
     *     这个比较抽象，先找到第一个零的下标 index，
     *     再找到最靠近的一个非零数，将它两交换，然后非零数的下一个必定是零，所以 index++，
     *     重复这样的过程。
     *
     * @param Integer[] $nums
     * @return NULL
     */
    function moveZeroes(&$nums) {
        $index = -1;
        foreach ($nums as $key => $num) {
            if ($index < 0 && $num == 0) {
                $index = $key;
            }
            if ($num != 0 && $index >= 0) {
                $nums[$index] = $num;
                $nums[$key] = 0;
                $index++;
            }
        }
    }
}