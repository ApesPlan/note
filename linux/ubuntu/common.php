<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/24
 * Time: 19:50
 */
// win 10 打开控制面板-卸载程序-打开或关闭wendiows功能-开启适用于Linux的windows子系统功能，重启
// 在windows store 里安装linux ubuntu
// 启动
// 首先
sudo apt-get update
sudo apt-get install nginx
sudo service nginx restart

sudo apt-get install mysql-server mysql-client
mysql -u root -p
sudo mysql
mysqld_safe --skip-grant-tables &
sudo service mysql restart
use mysql;
update mysql.user set authentication_string=PASSWORD('447728'),plugin='mysql_native_password' where user='root';
flush privileges;
show databases;
exit;
sudo apt-get install php7.2 php7.2-fpm php7.2-mysql

sudo vim /etc/nginx/sites-available/default
sudo cp default default.bak
sudo vim /etc/php/7.2/fpm/pool.d/www.conf
sudo service php7.2-fpm start
cd /mnt/d/ruanjian/phpStudy/PHPTutorial/WWW

use joyway_campus_activity;
source /mnt/f/joyway_campus_activity_20190325.sql;