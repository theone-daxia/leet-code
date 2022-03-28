<?php

/**
 * 对称二叉树
 *
 * 给你一个二叉树的根节点 root ， 检查它是否轴对称。
 *
 * Given the root of a binary tree, check whether it is a mirror of itself (i.e., symmetric around its center).
 *
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/problems/symmetric-tree
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
     * @return Boolean
     */
    function isSymmetric($root) {
        if ($root == null) {
            return true;
        }
        return $this->isMirror($root->left, $root->right);
    }

    function isMirror($p, $q) {
        if ($p == null && $q == null) {
            return true;
        }
        if ($p == null || $q == null || $p->val != $q->val) {
            return false;
        }
        return $this->isMirror($p->left, $q->right) && $this->isMirror($p->right, $q->left);
    }
}

class Solution2 {

    /**
     * 迭代
     * @param TreeNode $root
     * @return Boolean
     */
    function isSymmetric($root) {
        if ($root == null) {
            return true;
        }

        $que = [];
        array_push($que, $root->left);
        array_push($que, $root->right);

        while (!empty($que)) {
            $a = array_pop($que);
            $b = array_pop($que);
            if ($a == null && $b == null) {
                continue;
            }
            if ($a == null || $b == null || $a->val != $b->val) {
                return false;
            }
            array_push($a->left);
            array_push($b->right);
            array_push($a->right);
            array_push($b->left);
        }
        return true;
    }
}