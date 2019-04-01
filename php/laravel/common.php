composer create-project laravel/laravel laravel54 "5.4.*"

$class = new ReflectionClass('\\App\\Models\\Act\\' . $modelName);
$obj = $class->newInstance();
$find = $obj->where("user_id", $user_id)->first();

// 直接引入config里的配置
$this->appid = config('center.appid');
$this->appsecret = config('center.appsecret');
$this->tokenUrl = config('center.tokenUrl');
$this->attemptUrl = config('center.attemptUrl');

$request->input("model")
$request->user->id

// 拼接实力对象
$class = new ReflectionClass('\\App\\Models\\Act\\' . $modelName);
$obj = $class->newInstance();
$find = $obj->where("user_id", $user_id)->first();

use App\Utils\Json;
public function response($code = 0, $data = [], $message = '')
{
$respones['code'] = $code;
$respones['data'] = $data;
$respones['message'] = $message == '' ? Json::getCodeMessage($code) : $message;
return $respones;
}
return $this->response(Code::ok, ["can" => $act->isCanJoin()]);

const QuestionsNumb = 6;
self::QuestionsNumb

json格式返回
return Json::response(Code::ok, $awards);

if (preg_match('/^\d*/', $prize->name, $matches)) {}

$data = array_map(function ($item) use ($targetKey) {
    return array_merge($item, [
    'initials' => $this->getInitials($item[$targetKey]),
    ]);
}, $data);



