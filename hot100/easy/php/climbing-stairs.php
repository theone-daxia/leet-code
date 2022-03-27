<?php

/**
 * 爬楼梯
 *
 * 假设你正在爬楼梯。需要 n 阶你才能到达楼顶。
 * 每次你可以爬 1 或 2 个台阶。你有多少种不同的方法可以爬到楼顶呢？
 *
 * You are climbing a staircase. It takes n steps to reach the top.
 * Each time you can either climb 1 or 2 steps. In how many distinct ways can you climb to the top?
 *
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/problems/climbing-stairs
 */

class Solution1 {

    public $map = [];

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function climbStairs($n) {
        if ($n == 1) {
            return 1;
        }
        if ($n == 2) {
            return 2;
        }
        $res = $this->climbStairs($n - 1) + $this->climbStairs($n - 2);
        $this->map[$n] = $res;
        return $res;
    }
}

/**
 * Class Solution2
 *
 * 即斐波那契数列
 */
class Solution2 {

    /**
     * @param Integer $n
     * @return Integer
     */
    function climbStairs($n) {
        if ($n <= 2) {
            return $n;
        }
        $a = 1;
        $b = 2;
        $c = 0;
        $i = 2;
        while ($i < $n) {
            $c = $a + $b;
            $a = $b;
            $b = $c;
            $i++;
        }
        return $c;
    }
}