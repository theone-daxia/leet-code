<?php

/**
 * 买卖股票的最佳时机
 *
 * 给定一个数组 prices ，它的第 i 个元素 prices[i] 表示一支给定股票第 i 天的价格。
 * 你只能选择 某一天 买入这只股票，并选择在 未来的某一个不同的日子 卖出该股票。设计一个算法来计算你所能获取的最大利润。
 * 返回你可以从这笔交易中获取的最大利润。如果你不能获取任何利润，返回 0 。
 *
 * You are given an array prices where prices[i] is the price of a given stock on the ith day.
 * You want to maximize your profit by choosing a single day to buy one stock and choosing a different day in the future to sell that stock.
 * Return the maximum profit you can achieve from this transaction. If you cannot achieve any profit, return 0.
 *
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/problems/best-time-to-buy-and-sell-stock
 */

class Solution {

    /**
     * 思想：
     *     相当于找后面一个数减前面一个数的最大值，
     *     设定一个最小值 min 作为被减数，取值先定为第一个数，
     *     遍历一遍数组，当前数如果比 min 小，则将当前数赋值给 min，
     *     因为后一个数减前一个数，前一个数越小，差值才会越大，
     *     然后设定个 maxDiff 保存差值，当前数与 min 的差值如果比 maxDiff 大，则将新的差值赋给 maxDiff，
     *     遍历完成，maxDiff 就是最大的差值。
     * 
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) {
        $min = $prices[0];
        $maxDiff = 0;
        foreach ($prices as $price) {
            if ($price < $min) {
                $min = $price;
            } else if (($price - $min) > $maxDiff) {
                $maxDiff = $price - $min;
            }
        }
        return $maxDiff;
    }
}