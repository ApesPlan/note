// 进入数据库
mysql -hlocalhost -uroot -p447728
// 查看数据库列表
show databases;
// 使用某数据库
use 库名;
// 向数据库里导入数据
source d:/文件名;

like  %在后才能使用到索引

mysql -uroot -proot
use mysql
GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY '447728' WITH GRANT OPTION; // 设置远程连接并设置访问密码
flush privileges;
查看修改是否成功
select host,user from user;
单独ip
GRANT ALL PRIVILEGES ON *.* TO 'root'@'192.168.0.110' IDENTIFIED BY '447728' WITH GRANT OPTION;

update user set Password=password('123456') where User='root'; // 重置密码