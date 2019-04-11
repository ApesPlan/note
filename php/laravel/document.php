php artisan key:generate 生成APP_KEY

定义一个包含空格的环境变量值，可以通过将字符串放到双引号中来实现 APP_NAME="My Application"

'debug' => env('APP_DEBUG', false),
传递到 env 函数的第二个参数是默认值，如果环境变量没有被配置将会使用该默认值。

判断当前应用环境 $environment = App::environment();