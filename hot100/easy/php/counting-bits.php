<?php

/**
 * 比特位计数
 *
 * 给你一个整数 n ，对于 0 <= i <= n 中的每个 i ，计算其二进制表示中 1 的个数 ，返回一个长度为 n + 1 的数组 ans 作为答案。
 *
 * 1、很容易就能实现时间复杂度为 O(n log n) 的解决方案，你可以在线性时间复杂度 O(n) 内用一趟扫描解决此问题吗？
 * 2、你能不使用任何内置函数解决此问题吗？（如，C++ 中的 __builtin_popcount ）
 *
 * Given an integer n, return an array ans of length n + 1 such that for each i (0 <= i <= n), ans[i] is the number of 1's in the binary representation of i.
 *
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/problems/counting-bits
 */

class Solution1 {

    /**
     * 思想：
     *     计算 i 有几个 1，可以分为两部分，
     *     一部分是将 i 右移 1 位后，得到的这个比 i 小的数（i>>1）；另一部分是 i 的末尾，
     *     （i>>1）的 1 的个数加上 i 末尾 1 的个数，即是 i 的 1 的个数，
     *     而（i>>1）比 i 小，所以在计算 i 的 1 的个数的时候，（i>>1）的 1 的个数已经计算过了，
     *     再定义出 res[0]，剩下的就都可以计算出了。
     *
     * @param Integer $n
     * @return Integer[]
     */
    function countBits($n) {
        $res = [];
        $res[0] = 0;
        for ($i = 1; $i <= $n; $i++) {
            $res[$i] = $res[($i >> 1)] + ($i & 1);
        }
        return $res;
    }
}

class Solution2 {

    /**
     * 思想：
     *     i&(i-1) 可以将 i 最右边的一个 1 去掉，
     *     所以 i&(i-1) 比 i 小，
     *     i&(i-1) 的 1 的个数已经在前面计算过了，
     *     所以 i 的 1 的个数等于 i&(i-1) 的 1 的个数加上 1，
     *     注意：i 得大于 0。
     *
     * @param Integer $n
     * @return Integer[]
     */
    function countBits($n) {
        $res = [];
        $res[0] = 0;
        for ($i = 1; $i <= $n; $i++) {
            $res[$i] = $res[$i & ($i - 1)] + 1;
        }
        return $res;
    }
}

class Solution3 {

    /**
     * 思想：
     *     计算 i 的 1 的个数，就不断除 2，把余数收集起来，最后把所有余数相加，即为结果。
     *
     * @param Integer $n
     * @return Integer[]
     */
    function countBits($n) {
        $res = [];
        $res[0] = 0;
        for ($i = 1; $i <= $n; $i++) {
            $collect = [];
            $tmp = $i;
            while ($tmp > 0) {
                $collect[] = $tmp % 2;
                $tmp = floor($tmp / 2);
            }
            $res[] = array_sum($collect);
        }
        return $res;
    }
}