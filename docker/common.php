privileged被引入docker。
使用该参数，container内的root拥有真正的root权限。
否则，container内的root只是外部的一个普通用户权限。
privileged启动的容器，可以看到很多host上的设备，并且可以执行mount。
甚至允许你在docker容器中启动docker容器
docker run -d --name nginx1142 --network lnmp7 -p 7777:80 -v /data/nginx1142/www/html:/usr/share/nginx/html -v /data/nginx1142/nginx_conf:/etc/nginx/conf.d -v  /data/nginx1142/wwwlogs:/var/log/nginx/ --privileged=true nginx:1.14.2


docker network create -d bridge lnmp7
docker network ls
docker network rm ID
docker pull mysql:5.7
docker run -d --name mysql57 --network lnmp7 -p 6668:3306 -v /data/mysql57:/var/lib/mysql -e MYSQL_ROOT_PASSWORD=447728 mysql:5.7
docker exec -it mysql57 /bin/bash
mysql -u root -p
select host,user from user;

docker pull nginx:1.14.2
docker run -d --name nginx1142 --network lnmp7 -p 7777:80 -v /data/nginx1142/www/html:/usr/share/nginx/html -v /data/nginx1142/nginx_conf:/etc/nginx/conf.d -v  /data/nginx1142/wwwlogs:/var/log/nginx/ nginx:1.14.2

docker run -it --name nginx1142 --network lnmp7 -p 7777:80 -v /data/nginx1142/www/html:/usr/share/nginx/html -v /data/nginx1142/nginx_conf:/etc/nginx/conf.d nginx:1.14.2 /bin/bash
docker run -d --name nginx1142 --network lnmp7 -p 7777:80 -v /data/nginx1142/www/html:/usr/share/nginx/html nginx:1.14.2
docker run -it --name nginx1142 --network lnmp7 -p 7777:80 -v /data/nginx1142/www/html:/usr/share/nginx/html nginx:1.14.2 /bin/bash
docker run -d --name nginx1142 --network lnmp7 -p 7777:80 nginx:1.14.2
docker run -dit --name nginx1142 --network lnmp7 -p 7777:80 nginx:1.14.2 /bin/bash
docker exec -it nginx1142 /bin/bash
docker pull php:7.2-fpm
docker run -d --name phpfpm72 --network lnmp7 -p 7778:9000 -v /data/nginx1142/www/html:/usr/share/nginx/html php:7.2-fpm
docker exec -it phpfpm72 /bin/bash
nginx -g 'daemon off;'
CMD ["nginx","-g","daemon off;"]

echo -n "" > error.log 清空文件里的内容

docker container cp nginx1142:/etc/nginx . // 复制容器里的配置文件到linux下
docker port nginx1142 // 查看端口
docker inspect nginx1142|grep IPAddress

netstat -ntlp // 查看端口列表

ctrl p + q
ctrl d
exit
[ctrl+D]退出后不会终止容器运行
docker exec -it [CONTAINER_NAME or CONTAINER_ID] /bin/bash


vim /etc/sysconfig/network-scripts/ifcfg-enp0s3


TYPE="Ethernet"
PROXY_METHOD="none"
BROWSER_ONLY="no"
BOOTPROTO="dhcp"
DEFROUTE="yes"
IPV4_FAILURE_FATAL="no"
IPV6INIT="yes"
IPV6_AUTOCONF="yes"
IPV6_DEFROUTE="yes"
IPV6_FAILURE_FATAL="no"
IPV6_ADDR_GEN_MODE="stable-privacy"
NAME="enp0s3"
UUID="31178fbf-0efa-453a-b611-75892b4ae6bc"
DEVICE="enp0s3"
ONBOOT="yes"




TYPE="Ethernet"
PROXY_METHOD="none"
BROWSER_ONLY="no"
BOOTPROTO="static"
DEFROUTE="yes"
IPV4_FAILURE_FATAL="no"
IPV6INIT="yes"
IPV6_AUTOCONF="yes"
IPV6_DEFROUTE="yes"
IPV6_FAILURE_FATAL="no"
IPV6_ADDR_GEN_MODE="stable-privacy"
NAME="enp0s3"
UUID="01bdf903-27c1-44b3-a5a2-8105ea495691"
DEVICE="enp0s3"
ONBOOT="yes"
IPADDR=10.10.10.180
NETMASK=255.255.255.0
GATEWAY=10.10.10.1
DNS=8.8.8.8
NM_CONTROLLED=no


修改 BOOTPROTO="static"
添加
IPADDR=10.10.10.20
NETMASK=255.255.255.0
GATEWAY=10.10.10.1
DNS=8.8.8.8

vim /etc/resolv.conf
添加 nameserver 8.8.8.8


service network restart

route add 172.18.0.0 mask 255.255.255.0 10.10.10.180
route print
route delete 172.18.0.0

// 让外部可以访问ip
ip转发没有打开
sysctl net.ipv4.ip_forward
显示net.ipv4.ip_forward=0则表示未打开
vim /etc/sysctl.conf
net.ipv4.ip_forward = 1
systemctl restart network
sysctl net.ipv4.ip_forward

docker network create -d bridge test1 网络桥
docker network remove  bridge lnmp7

docker run -d --name mysql57 --network lnmp7 -p 3306:3306 -v F:/windoc/data/mysql57/config:/etc/mysql/mysql.conf.d -v F:/windoc/data/mysql57/data:/var/lib/mysql -e MYSQL_ROOT_PASSWORD=oneone mysql:5.7

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin/ --filename=composer


WARNING: IPv4 forwarding is disabled. Networking will not work.
echo net.ipv4.ip_forward=1 >> /etc/sysctl.conf
service network restart
