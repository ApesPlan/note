cnpm install webpack webpack-cli -D
cnpm insatll file-loader -D // 将图片文件打包成图片文件
cnpm install url-loader -D  // 将图片文件打包成base64或图片文件 放入js中
cnpm install style-loader css-loader -D // 将css打包
cnpm install sass-loader node-sass -D // sass
cnpm install postcss-loader -D // 为浏览器添加兼容个属性的css
cnpm install autoprefixer -D // 为浏览器添加兼容个属性的css 配合postcss-loader
cnpm install html-webpack-plugin -D // 自动生成index.html文件 自动引入打包好的js 但少id='root'
cnpm install clean-webpack-plugin -D // 如果打包的bundle.js文件变为了dist.js这个插件能删除过去的bundle.js
cnpm install webpack-dev-server -D // 安装webpack服务器 推荐

cnpm install express webpack-dev-middleware -D // 服务器 node server
cnpm install ansi-colors -D // 报错需要安装的

cnpm install babel-loader @babel/core -D // 打通webpack与babel
cnpm install @babel/preset-env -D // babel处理es6 但仍有些变量和函数不能翻译
cnpm install @babel/polyfill -D

cnpm install babel-loader @babel/core  @babel/preset-env @babel/polyfill -D

cnpm install core-js -D // 缺的时候安装
cnpm install core-js@2 -D //  报错需要安装的

cnpm install core-js core-js@2 -D

cnpm install @babel/plugin-transform-runtime -D
cnpm install @babel/runtime -D
cnpm install @babel/runtime-corejs2 -D

cnpm install webpack-merge -D // 合并配置文件功能

cnpm install webpack webpack-cli file-loader url-loader style-loader css-loader sass-loader node-sass postcss-loader autoprefixer html-webpack-plugin clean-webpack-plugin -D

cnpm install ts-loader typescript -D
cnpm install lodash -D // lodash库
cnpm install @types/lodash -D // lodash对应的typescript文件


const path = require('path'); // 定义路径
const HtmlWebpackPlugin = require('html-webpack-plugin'); // 自动生成index.html文件 自动引入打包好的js 但少id='root'
const CleanWebpackPlugin = require('clean-webpack-plugin'); // 如果打包的bundle.js文件变为了dist.js这个插件能删除过去的bundle.js


module.exports = {
    mode: 'production',
    devtool: 'cheap-module-source-map', // 线上用

    mode: 'development',
    // devtool: 'none', // 报错提示在打完包的文件中
    devtool: 'cheap-module-eval-source-map', // 最佳
    // devtool: 'eval', // 最快，但可能提示不全面
    // devtool: 'source-map', // 报错提示在原文件中 会多生成一个main.map.js 慢
    // devtool: 'inline-source-map', // 报错提示在原文件中 只有一个main.js 会精确到哪一行哪一列 慢
    // devtool: 'cheap-inline-source-map', // 报错提示在原文件中 只有一个main.js 会精确到哪一行 稍微快了
    // devtool: 'cheap-module-inline-source-map', // 第三方模块里的错误都管
    entry: './index.js', // 打包从哪个文件开始 没有output filename的话，默认生成的是main.js
    // // 如果output filename的话 需要用通配符[name].js，不然报错，都会被打包成一个文件
    // entry: {
    //     main: './src/index.js', // 如果没有output filename的话，默认生成的是main.js
    //     sub: './src/index.js' // 如果没有没有output filename的话，默认生成的是sub.js
    // },
    devServer: {
        contentBase: './dist', // 制定运行目录
        open: true, // 自动打开默认浏览器
        // proxy: { // 跨域代理
        //     '/api': 'http://localhost:3000'
        // }
        port: 8090
    },
    module: {
      rules: [
          {
              test: /\.(jpg|png|gif)$/,
              use: {
                  // loader: 'file-loader',
                  loader: 'url-loader', // 将图片文件打包成base64 放入js中
                  options: {
                      name: '[name].[ext]', // 以原文件的名字和后缀名输出文件
                      outputPath: 'images/', // 输出路径在output(dist)
                      limit: 2048 // 当图片小于2048个字节（2kb）的时候才打包
                  }
              }
           },
          {
              test: /\.css$/,
              // use: ['style-loader', 'css-loader']
              use: [
                  'style-loader',
                  {
                      loader: 'css-loader',
                      options: {
                          importLoaders: 2, // 引用层级为2
                          modules: true // 开css模块化打包
                      }
                  },
                  // 'css-loader',
                  'sass-loader',
                  'postcss-loader' // 为浏览器添加兼容个属性的css
              ]
           },
          {
              test: /\.js$/,
              exclude: /node_modules/,
              loader: "babel-loader", // babel 处理es6
              options: {
                  // presets: ["@babel/preset-env"] // es6中的函数和变量有些还是不能翻译
                  presets: [["@babel/preset-env"], {
                      targets: { // 在大于什么样的版本的浏览器生效
                          chrome: "67",
                      },
                      useBuiltIns: 'usage' // 自定义根据需求加载特殊的es6变量和函数
                  }]
              }
          },
      ]
    },
    // plugin 可以在webpack运行到某个时刻的时候，帮你做一些事情，很想生命周期函数
    plugins: [
        new HtmlWebpackPlugin({
            template: 'src/index.html' // 在打包的时候使用html模板，解决没有id=root的问题
        }),
        // new CleanWebpackPlugin(['dist']) // 如果打包的dist.js文件变为了bundle.js这个插件能删除过去的dist.js
    ],
    optimization: {
        usedExports: true // 表示js方法类使用到了才导入打包文件中
    },
    output: {
        publicPath: 'http://cdn.com.cn', // 这个地址会自动天骄到filename.js前面
        filename: 'bundle.js', // 最后打包成什么文件
        // filename: '[name].js', // entry打包生成多个文件时
        path: path.resolve(__dirname, 'bundle') // 拼接路径
    }
}