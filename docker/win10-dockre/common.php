docker run -d --name mysql57 --network lnmp7 -p 5432:3306 -v F:/windoc/data/mysql57/config:/etc/mysql/mysql.conf.d -v F:/windoc/data/mysql57/data:/var/lib/mysql -e MYSQL_ROOT_PASSWORD=oneone mysql:5.7
docker run -d --name lmysql57 -p 5400:3306 -v F:/windoc/data/lmysql57/config:/etc/mysql/mysql.conf.d -v F:/windoc/data/lmysql57/data:/var/lib/mysql -e MYSQL_ROOT_PASSWORD=oneone mysql:5.7

导入
docker load -i 路径\文件名
docker load<D:\dockerbase.zip

重命名
docker tag 500b941e6f79 tomcat7:jre7