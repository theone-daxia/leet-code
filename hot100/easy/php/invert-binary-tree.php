<?php

/**
 * 翻转二叉树
 *
 * 给你一棵二叉树的根节点 root ，翻转这棵二叉树，并返回其根节点。
 *
 * Given the root of a binary tree, invert the tree, and return its root.
 *
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/problems/invert-binary-tree
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
class Solution {

    /**
     * 思路：
     *     把每个节点的左右子节点交换就可以了。
     *
     * 这题可用前、中、后序、层序遍历来做，周末补充
     *
     * @param TreeNode $root
     * @return TreeNode
     */
    function invertTree($root) {
        if ($root == null) {
            return $root;
        }
        $tmp = $root->left;
        $root->left = $root->right;
        $root->right = $tmp;

        $this->invertTree($root->left);
        $this->invertTree($root->right);
        return $root;
    }
}