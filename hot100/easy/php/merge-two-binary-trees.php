<?php

/**
 * 合并二叉树
 *
 * 给你两棵二叉树： root1 和 root2 。
 * 想象一下，当你将其中一棵覆盖到另一棵之上时，两棵树上的一些节点将会重叠（而另一些不会）。你需要将这两棵树合并成一棵新二叉树。
 * 合并的规则是：如果两个节点重叠，那么将这两个节点的值相加作为合并后节点的新值；否则，不为 null 的节点将直接作为新二叉树的节点。
 * 返回合并后的二叉树。
 * 注意: 合并过程必须从两个树的根节点开始。
 *
 * You are given two binary trees root1 and root2.
 * Imagine that when you put one of them to cover the other, some nodes of the two trees are overlapped while the others are not.
 * You need to merge the two trees into a new binary tree.
 * The merge rule is that if two nodes overlap, then sum node values up as the new value of the merged node. Otherwise, the NOT null node will be used as the node of the new tree.
 * Return the merged tree.
 * Note: The merging process must start from the root nodes of both trees.
 *
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/problems/merge-two-binary-trees
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
     * 直接将树 2 合并到树 1。
     *
     * @param TreeNode $root1
     * @param TreeNode $root2
     * @return TreeNode
     */
    function mergeTrees($root1, $root2) {
        if ($root1 == null) {
            return $root2;
        }
        if ($root2 == null) {
            return $root1;
        }
        $root1->val += $root2->val;
        $root1->left = $this->mergeTrees($root1->left, $root2->left);
        $root1->right = $this->mergeTrees($root1->right, $root2->right);
        return $root1;
    }
}

class Solution2 {

    /**
     * 不动原来的两个树，返回一个新的树。
     *
     * @param TreeNode $root1
     * @param TreeNode $root2
     * @return TreeNode
     */
    function mergeTrees($root1, $root2) {
        if ($root1 == null && $root2 == null) {
            return null;
        }
        $root = new TreeNode(($root1 ? $root1->val : 0) + ($root2 ? $root2->val : 0));
        $root->left = $this->mergeTrees($root1 ? $root1->left : null, $root2 ? $root2->left : null);
        $root->right = $this->mergeTrees($root1 ? $root1->right : null, $root2 ? $root2->right : null);
        return $root;
    }
}