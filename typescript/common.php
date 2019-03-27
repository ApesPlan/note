declare 在于声明该变量已经在其他某个js中存在，同时也将失去编译器对他的所有语法智能感知，语法检查等功能
export   import 模块在其自身的作用域里执行，而不是在全局作用域里；这意味着定义在一个模块里的变量，函数，类等等在模块外部是不可见的，除非你明确地使用export形式之一导出它们。 相反，如果想使用其它模块导出的变量，函数，类，接口等的时候，你必须要导入它们，可以使用 import形式之一。
任何包含顶级import或者export的文件都被当成一个模块。相反地，如果一个文件不带有顶级的import或者export声明，那么它的内容被视为全局可见的（因此对模块也是可见的）。
test()
<script type="text/javascript">
    var str = "Visit W3School";
    var patt1 = new RegExp("W3School");
    var result = patt1.test(str);
    document.write("Result: " + result);
</script>

Result: true

for (v of arr) {}

使用 async / await, 搭配 promise, 可以通过编写形似同步的代码来处理异步流程, 提高代码的简洁性和可读性.

await 操作符用于等待一个 Promise 对象, 它只能在异步函数 async function 内部使用.


