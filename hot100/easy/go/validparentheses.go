/**
 * 有效的括号
 *
 * Given a string s containing just the characters '(', ')', '{', '}', '[' and ']', determine if the input string is valid.
 *
 * An input string is valid if:
 *     1. Open brackets must be closed by the same type of brackets.
 *     2. Open brackets must be closed in the correct order.
 *
 * 来源：力扣（LeetCode）
 * 链接：https://leetcode-cn.com/problems/valid-parentheses
 */

func isValid(s string) bool {
    bracketsMap := map[string]string{
        ")": "(",
        "]": "[",
        "}": "{",
    }
    stack := []string{}
    for _, v := range s {
        if len(arr) == 0 {
            stack = append(stack, string(v))
            continue
        }
        lastIndex := len(arr) - 1
        last := arr[lastIndex]
        match, ok := bracketsMap[string(v)]
        if ok && match == last {
            stack = stack[:lastIndex]
        } else {
            stack = append(stack, string(v))
        }
    }
    if (len(stack)) == 0 {
        return true
    } else {
        return false
    }
}

/**
 * 解析：
 *     遍历字符串，只要是左括号就入栈，
 *     是右括号，就弹出栈顶元素，并与map中对应元素比较，不同就 false，
 *     最后栈是空的就为 true，否则为 false 。
 */