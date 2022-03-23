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

func twoSum(nums []int, target int) []int {
    res := []int{}
    mapTmp := map[int]int{}
    for k, v := range nums {
        index, ok := mapTmp[target - v]
        if ok {
            res = []int{k, index}
            break
        }
        mapTmp[v] = k
    }
    return res
}