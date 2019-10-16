{
    "name": "cherry_custom",
    "version": "1.0.1",
    "main": "./index.ts",
    "scripts": {
        "build:dev": "./node_modules/.bin/webpack-cli --config \"./webpack_config/webpack.dev.js\" -w",
        "build:prod": "./node_modules/.bin/webpack-cli --config \"./webpack_config/webpack.prod.js\"",
        "build:debug": "./node_modules/.bin/webpack-cli --config \"./webpack_config/webpack.debug.js\" -w"
    },
    "dependencies": {
        "@tweenjs/tween.js": "^17.2.0", // 是一个 过渡计算工具包
        "@types/jquery": "^3.2.15", // 加载typescript依赖的jquery包
        "@types/three": "^0.84.28", // 加载typescript依赖的three.js包
        "ali-oss": "^5.0.0", // 阿里对象存储包
        "bitbar-webpack-progress-plugin": "^1.0.0", // 进度条
        "css-loader": "^0.28.11", // 打包css的加载器
        "extract-text-webpack-plugin": "^4.0.0-beta.0", //该插件的主要是为了抽离css样式,防止将样式打包在js中引起页面样式加载错乱的现象;
        "file-loader": "^1.1.5", // 打包file的加载器
        "jquery": "^3.3.1", // jquery包
        "js-cookie": "^2.1.4", // cookie
        "less": "^3.0.1", // less
        "less-loader": "^4.1.0", // 打包less的加载器
        "optimize-css-assets-webpack-plugin": "^4.0.0", // css文件压缩组件
        "postcss-loader": "^2.1.5", // 打包postcss的加载器 PostCSS是一个使用JS插件转换样式的工具。这些插件可以提升CSS，支持变量和混合，转换未来的CSS语法，内联图像等。
        "promise-polyfill": "^7.1.2", //promise回调
        "three": "^0.91.0", // three.js包
        "ts-loader": "^4.2.0", // 打包ts的加载器
        "typescript": "^2.8.1", // typescript包
        "uglifyjs-webpack-plugin": "^1.2.4", //js文件压缩
        "url-loader": "^1.0.1", // 打包url的加载器
        "vue": "^2.5.2", // vue
        "vue-awesome-swiper": "^3.1.3", // 轮播插件swiper
        "vue-class-component": "^6.2.0", // 提供一套class风格的vue组件编写方法
        "vue-concise-slider": "^2.4.8", // vue滑动组件
        "vue-lazyload": "^1.1.4", // 懒加载组件
        "vue-property-decorator": "^6.0.0", //这个库完全依赖于vue-class-component typescript中写vue
        "vue-router": "^3.0.1",
        "webpack": "^4.5.0",
        "webpack-cli": "^3.3.0",
        "webpack-merge": "^4.1.1" // 合并配置对象
    },
    "author": "maseer",
    "license": "NONE"
}