<?php

/**
 * 二叉树的中序遍历
 *
 * 给定一个二叉树的根节点 root ，返回 它的 中序 遍历 。
 *
 * Given the root of a binary tree, return the inorder traversal of its nodes' values.
 *
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/problems/binary-tree-inorder-traversal
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
     * @param TreeNode $root
     * @return Integer[]
     */
    function inorderTraversal($root) {
        $res = [];
        if ($root == null) {
            return $res;
        }
        $res = array_merge($res, $this->inorderTraversal($root->left));
        $res[] = $root->val;
        $res = array_merge($res, $this->inorderTraversal($root->right));
        return $res;
    }
}

class Solution2 {

    public $res = [];

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function inorderTraversal($root) {
        if ($root == null) {
            return $this->res;
        }
        $this->inorderTraversal($root->left);
        $this->res[] = $root->val;
        $this->inorderTraversal($root->right);
        return $this->res;
    }
}