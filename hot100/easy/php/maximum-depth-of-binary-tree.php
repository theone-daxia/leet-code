<?php

/**
 * 二叉树的最大深度
 *
 * 给定一个二叉树，找出其最大深度。
 * 二叉树的深度为根节点到最远叶子节点的最长路径上的节点数。
 * 说明: 叶子节点是指没有子节点的节点。
 *
 * Given the root of a binary tree, return its maximum depth.
 * A binary tree's maximum depth is the number of nodes along the longest path from the root node down to the farthest leaf node.
 *
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/problems/maximum-depth-of-binary-tree
 */

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution1 {

    /**
     * 递归
     *
     * 思想：
     *     取 左子树最大深度 和 右子树最大深度 中较大的一个，加上一，即为整个二叉树的最大深度。
     *
     * @param TreeNode $root
     * @return Integer
     */
    function maxDepth($root) {
        if ($root == null) {
            return 0;
        }
        return 1 + max($this->maxDepth($root->left), $this->maxDepth($root->right));
    }
}

class Solution2 {

    /**
     * 迭代
     *
     * 思想：
     *     一层一层往下走，每到一层，就将 depth 加一，并构造出一个新数组，保存这层所有的节点，
     *     直到这层没有节点了，depth 就是最大深度。
     *
     * @param TreeNode $root
     * @return Integer
     */
    function maxDepth($root) {
        if ($root == null) {
            return 0;
        }
        $depth = 0;
        $que = [];
        array_push($que, $root->left);
        array_push($que, $root->right);

        while (!empty($que)) {
            $depth++;
            $que = array_filter($que);
            if (empty($que)) {
                return $depth;
            }
            $newQue = [];
            foreach ($que as $node) {
                array_push($newQue, $node->left);
                array_push($newQue, $node->right);
            }
            $que = $newQue;
        }
        return $depth;
    }
}