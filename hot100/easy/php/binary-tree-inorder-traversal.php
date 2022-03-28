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
     * 递归
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

    /**
     * 迭代
     * @param TreeNode $root
     * @return Integer[]
     */
    function inorderTraversal($root) {
    }
}

/**
 * 二叉树有深度遍历和广度遍历，深度遍历包含：前序、中序、后序三种，广度遍历即为层序遍历。
 *
 * 前序：根结点 -> 左子树 -> 右子树
 * 中序：左子树 -> 根结点 -> 右子树
 * 后序：左子树 -> 右子树 -> 根结点
 *
 * 即根结点在前，为前序；根结点在中，为中序；根结点在后，为后序。
 */