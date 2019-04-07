npm init 初始化package.json
cnpm install webpack webpack-cli --save-dev
== cnpm install webpack webpack-cli -D
cnpm install webpack webpack-cli -g --save-dev // 全局安装
cnpm uninstall webpack webpack-cli --save-dev // 全局卸载
npx webpack index.js //运行当前目录下的webpack
cnpm info webpack // 查看webpack版本
cnpm install webpack@4.16.5 -D 下载对应版本的webpack
// 默认打包文件是在webpack.config.js中
npx webpack --config webpackconfig.js // 指定打包配置文件在webpackconfig.js

此时打包的时候有警告，说没有mode 需要配置mode
