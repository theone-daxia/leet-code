<?php

/**
 * 二叉树的直径
 *
 * 给定一棵二叉树，你需要计算它的直径长度。一棵二叉树的直径长度是任意两个结点路径长度中的最大值。这条路径可能穿过也可能不穿过根结点。
 * 注意：两结点之间的路径长度是以它们之间边的数目表示。
 *
 * Given the root of a binary tree, return the length of the diameter of the tree.
 * The diameter of a binary tree is the length of the longest path between any two nodes in a tree. This path may or may not pass through the root.
 * The length of a path between two nodes is represented by the number of edges between them.
 *
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/problems/diameter-of-binary-tree
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

    public $max = 0;

    /**
     * 思路：
     *     以任意一个节点为中心，找出它左右子树的长度和，记录在 $max 里（只记录最大的），
     *     所有节点都计算完后，$max 就是二叉树的长度。
     *
     * @param TreeNode $root
     * @return Integer
     */
    function diameterOfBinaryTree($root) {
        if ($root == null) {
            return 0;
        }
        $this->dfs($root);
        return $this->max;
    }

    function dfs($node) {
        if ($node->left == null && $node->right == null) {
            return 0;
        }
        $leftLen = $node->left == null ? 0 : $this->dfs($node->left) + 1;
        $rightLen = $node->right == null ? 0 : $this->dfs($node->right) + 1;
        $this->max = max($this->max, $leftLen + $rightLen);
        return max($leftLen, $rightLen);
    }
}