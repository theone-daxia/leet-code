<?php

/**
 * 两数之和
 *
 * Given an array of integers nums and an integer target, return indices of the two numbers such that they add up to target.
 * You may assume that each input would have exactly one solution, and you may not use the same element twice.
 * You can return the answer in any order.
 *
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/problems/two-sum
 */

function twoSum($nums, $target)
{
    $map = [];
    foreach ($nums as $index => $num) {
        if (array_key_exists($target - $num, $map)) {
            return [$map[$target - $num], $index];
        }
        $map[$num] = $index;
    }
    return [];
}