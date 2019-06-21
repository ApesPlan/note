govendor要放到path中,如果不在，可以用临时环境变量加入GOPATH
gin -a 8088 -p 8089 run main.go // 热更新，bin下需要gin.exe

无中间件启动
使用

r := gin.New()
代替

// 默认启动方式，包含 Logger、Recovery 中间件
r := gin.Default()