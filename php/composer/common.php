<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/24
 * Time: 19:50
 */
// 下载composer
https://getcomposer.org/Composer-Setup.exe
// 注意替换php.exe
//  composer 的全局配置
composer config -g repo.packagist composer https://packagist.phpcomposer.com
// 前项目的 composer.json 配置
composer config repo.packagist composer https://packagist.phpcomposer.com
或
"repositories": {
    "packagist": {
        "type": "composer",
        "url": "https://packagist.phpcomposer.com"
    }
}

composer install
// 解除镜像并恢复到 packagist 官方源
composer config -g --unset repos.packagist