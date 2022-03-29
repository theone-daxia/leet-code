<?php

/**
 * 只出现一次的数字
 *
 * 给定一个非空整数数组，除了某个元素只出现一次以外，其余每个元素均出现两次。找出那个只出现了一次的元素。
 * 说明：
 * 你的算法应该具有线性时间复杂度。 你可以不使用额外空间来实现吗？
 *
 * Given a non-empty array of integers nums, every element appears twice except for one. Find that single one.
 * You must implement a solution with a linear runtime complexity and use only constant extra space.
 *
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/problems/single-number
 */

class Solution1 {

    /**
     * 思想：
     *     定义一个哈希表 map，遍历一遍 nums，
     *     如果 num 在 map 里，就 unset 掉；如果不在，就加入，
     *     因为除了一个数只出现一次，其他都出现了两次，所以遍历完成时，map 里只剩下了那个出现一次的数。
     *     利用哈希表查找 O(1) 的特点，该方法时间复杂度为 O(n)，空间复杂度也为 O(n)。
     *
     * @param Integer[] $nums
     * @return Integer
     */
    function singleNumber($nums) {
        $map = [];
        foreach ($nums as $num) {
            if (isset($map[$num])) {
                unset($map[$num]);
            } else {
                $map[$num] = 1;
            }
        }
        return array_keys($map)[0];
    }
}

class Solution2 {

    /**
     * 思想：
     *     重点：不需要额外空间，就往位运算上想
     *
     *     1、这里用到了 异或（两个运算子不同时，为 true，否则为 false）
     *     2、异或满足的运算定律：
     *         （1）与自身运算，为 false ｜ x ^ x = 0
     *         （2）与 0 运算，等于本身 ｜ x ^ 0 = x
     *         （3）交换律 ｜ x ^ y = y ^ x
     *         （4）结合律 ｜ x ^ (y ^ z) = (x ^ y) ^ z
     *
     *     利用这些定律，将所有的数都异或起来，相同的两个数，结果为 0，
     *     最终就变成 0 和那个单独的数异或，结果就是那个单独的数。
     *
     * @param Integer[] $nums
     * @return Integer
     */
    function singleNumber($nums) {
        $res = 0;
        foreach ($nums as $num) {
            $res = $res ^ $num;
        }
        return $res;
    }
}