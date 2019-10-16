cnpm install webpack webpack-cli -D
cnpm insatll file-loader -D // 将图片文件打包成图片文件 用来处理jpg/png/gif 等文件格式
cnpm install url-loader -D  // 将图片文件打包成base64或图片文件 放入js中
// css-loader使你能够使用类似@import 和 url(...)的方法实现 require()的功能
// style-loader将所有的计算后的样式加入页面中
// 二者组合在一起使你能够把样式表嵌入webpack打包后的JS文件中
cnpm install style-loader css-loader -D // 将css打包
cnpm install sass-loader node-sass -D // sass
cnpm install postcss-loader -D // 为浏览器添加兼容个属性的css
cnpm install autoprefixer -D // 为浏览器添加兼容个属性的css 配合postcss-loader
cnpm install html-webpack-plugin -D // 自动生成index.html文件 自动引入打包好的js 但少id='root'
// 每次构建项目之前，将原先的构建完成的文件夹删除
cnpm install clean-webpack-plugin -D // 如果打包的bundle.js文件变为了dist.js这个插件能删除过去的bundle.js
cnpm install webpack-dev-server -D // 安装webpack服务器 推荐 热更 -w

cnpm install express webpack-dev-middleware -D // 服务器 node server
cnpm install ansi-colors -D // 报错需要安装的

cnpm install babel-loader @babel/core -D // 打通webpack与babel
cnpm install @babel/preset-env -D // babel处理es6 但仍有些变量和函数不能翻译
cnpm install @babel/polyfill -D

// babel的三个loader 可以解决 箭头函数这类es6 语法， 
// 但是无法解决promise， symbol 这类新增的内建对象，因此需要引入 babel-polyfill来进行全局的转换
// entry: ['babel-polyfill', './src/main.js'],
// 打包后的bundle会比之前要大
// 原因是， babel-polyfill 会对全局进行改写，这样其实坏处是污染了全局的环境，并且增加了打包后的文件大小
// 这也是要进行安装在dependency 而不是 devDependency的原因
cnpm install babel-loader @babel/core  @babel/preset-env @babel/polyfill -D
// 因此， webpack4.0 提供了另外的 plugin-transform-runtime
cnpm install --save-dev @babel/plugin-transform-runtime
cnpm install --save @babel/runtime

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


// 引入node的path模块
const path = require('path'); // 定义路径
const HtmlWebpackPlugin = require('html-webpack-plugin'); // 自动生成index.html文件 自动引入打包好的js 但少id='root'

// 每次构建项目之前，将原先的构建完成的文件夹删除
const CleanWebpackPlugin = require('clean-webpack-plugin'); // 如果打包的bundle.js文件变为了dist.js这个插件能删除过去的bundle.js

// uglifyjs-webpack-plugin 是用来对js 代码进行压缩体积用的，在webpack4.0中， 默认的配置是进行压缩，
// 可以通过 mode 模式的 development 来设置成不进行压缩，默认模式是production
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');

// copy-webpack-plugin
// 我们一般会把开发的所有源码和资源文件放在 src/ 目录下，构建的时候产出一个 build/ 目录，
// 通常会直接拿 build 中的所有文件来发布。有些文件没经过 webpack 处理，但是我们希望它们也能出现在 build 目录下，
// 这时就可以使用 CopyWebpackPlugin 来处理了
const CopyWebpackPlugin = require('copy-webpack-plugin')

// 抽离css样式
var ExtractTextPlugin = require('extract-text-webpack-plugin');
var LessMoblie = new ExtractTextPlugin('share_mobile.css');
var LessPc = new ExtractTextPlugin('share_pc.css');

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


    // 配置常用模块的相对路径
    // 实际引用中
    // imoprt uitl from 'Util/sss'
    // 原始：
    // import util from './src/util/sss'
    resolve: {
        // alias: {
        //   Util: path.resolve(__dirname, 'src/util/'),
        // },
        // // 这个配置可以定义在进行模块路径解析时，webpack 会尝试帮你补全那些后缀名来进行查找
        // extensions: [".js", ".vue"],
        alias: { vue: 'vue/dist/vue.common.js' },
        extensions: ['.ts']
    },

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
              //   test: /\.(css|scss)$/,
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
              loader: "babel-loader", // babel 处理es6 babel 的目的就是为了将es6 的相关语法，转换成es5 的语法
              options: {
                  // presets: ["@babel/preset-env"] // es6中的函数和变量有些还是不能翻译
                  presets: [["@babel/preset-env"], {
                      targets: { // 在大于什么样的版本的浏览器生效
                          chrome: "67",
                      },
                      useBuiltIns: 'usage' // 自定义根据需求加载特殊的es6变量和函数
                  }],
                  plugins: ['@babel/plugin-transform-runtime']
              }
          },
          {
              test: /\.ts$/,
              exclude: /node_modules/,
              use: 'ts-loader'
          },

          {
              test: /less[\/\\].+?\.less$/,
              use: LessMoblie.extract({
                  use: ['css-loader', 'less-loader']
              })
          },
          {
              test: /less_pc[\/\\].+?\.less$/,
              use: LessPc.extract({
                  use: ['css-loader', 'less-loader']
              })
          },
          {
              test: /\.(png)|(jpg)$/,
              exclude: /node_modules/,
              use: "url-loader"
          }
      ]
    },
    // plugin 可以在webpack运行到某个时刻的时候，帮你做一些事情，很想生命周期函数
    plugins: [
        new HtmlWebpackPlugin({
            template: 'src/index.html' // 在打包的时候使用html模板，解决没有id=root的问题
        }),
        // new CleanWebpackPlugin(['dist']) // 如果打包的dist.js文件变为了bundle.js这个插件能删除过去的dist.js
        
        // DefinePlugin 是 webpack 内置的插件，可以使用 webpack.DefinePlugin 直接获取。
        // 这个插件用于创建一些在编译时可以配置的全局常量，这些常量的值我们可以在 webpack 的配置中去指定
        // console.log("Running App version " + VERSION);
        // if(!BROWSER_SUPPORTS_HTML5) require("html5shiv");
        new webpack.DefinePlugin({
            PRODUCTION: JSON.stringify(true), // const PRODUCTION = true
            VERSION: JSON.stringify('5fa3b9'), // const VERSION = '5fa3b9'
            BROWSER_SUPPORTS_HTML5: true, // const BROWSER_SUPPORTS_HTML5 = 'true'
            TWO: '1+1', // const TWO = 1 + 1,
            CONSTANTS: {
              APP_VERSION: JSON.stringify('1.1.2') // const CONSTANTS = { APP_VERSION: '1.1.2' }
            },
            'process.env': {
                NODE_ENV: '"production"'
            }
        }),
        new CopyWebpackPlugin([
            { from: 'src/file.txt', to: 'build/file.txt', }, // 顾名思义，from 配置来源，to 配置目标路径
            { from: 'src/*.ico', to: 'build/*.ico' }, // 配置项可以使用 glob
            // 可以配置很多项复制规则
        ]),
        // 这个插件用于忽略某些特定的模块，让 webpack 不把这些指定的模块打包进去。例如我们使用 moment.js，直接引用后，里边有大量的 i18n 的代码，
        // 导致最后打包出来的文件比较大，而实际场景并不需要这些 i18n 的代码，
        // 这时我们可以使用 IgnorePlugin 来忽略掉这些代码文件，
        new webpack.IgnorePlugin(/^\.\/locale$/, /moment$/), // IgnorePlugin 配置的参数有两个，第一个是匹配引入模块路径的正则表达式，第二个是匹配模块的对应上下文，即所在目录名。
        LessPc,
        LessMoblie,
    ],
    optimization: {
        usedExports: true, // 表示js方法类使用到了才导入打包文件中
        minimizer: [
            new UglifyJsPlugin() // 压缩
        ]
    },
    output: {
        // publicPath: 'http://cdn.com.cn', // 这个地址会自动天骄到filename.js前面
        // filename: 'bundle.js', // 最后打包成什么文件
        // // filename: '[name].js', // entry打包生成多个文件时
        // // __dirname 当前 webpack.config.js的绝对路径
        // path: path.resolve(__dirname, 'bundle') // 拼接路径
        filename: 'dist.js',
        path: path.resolve(__dirname + "/../../public", 'dist')
    }
}



// webpack 4.0 不再使用extra-text-webpack-plugin来分离css 转而使用mini-css-extract-plugin
// mini-css-extract-plugin 既需要配置plugin 也需要配置loader
// 这个插件一般在生产环境中使用，并且使用时不能使用style-loader
const MiniCssExtractPlugin = require('mini-css-extract-plugin')
module.exports = {
    plugins: [
        new MiniCssExtractPlugin({
            // hash 在每次构建的时候都会重新全部生成 ，所有的文件的hash 都是同一个值， 
            // 无论是否修改了文件，所有的文件都将重新生成， 起不到缓存的效果； 
            // chunkhash根据不同的入口文件(Entry)进行依赖文件解析、构建对应的chunk，生成对应的哈希值,
            // 比如我们将一些公共模块，或者第三方依赖包独立开来，接着用chunkhash 生成哈希值，
            // 只要不改变公共代码，就不需要重新构建；
            // 然而当chunkhash 用在css 中时， 由于css 和js 用了同一个chunkhash，
            // 所以当只改变js 时，css 文件也会重新生成， 所以css 中我们使用contenthash
            filename: "[name].[contenthash].css",
            chunkFilename: "[id].css"
        })
    ],
    module: {
        rules: [{
            test: /\.(css|scss)$/,
            include: [path.resolve(__dirname, '../src')],
            use: [
                MiniCssExtractPlugin.loader,
                'css-loader'
            ]
        }, ]
    }
}