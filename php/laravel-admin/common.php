$router->resource('example', ExampleController::class);
php artisan make:model Data\ActivityAlertStyle -m
数据表格最后一列默认是操作列，包含编辑按钮与删除按钮。如果需要自定义操作列，则可以把默认的操作列禁用，再进行自定义。
$grid->disableActions();

laravel-admin form中的数据，在提交后，保存前，获取并进行编辑

在模型中添加如下方法：

public static function boot()
{
    parent::boot();

    static::saving(function ($model) {

    $model->display_where = json_encode($model->display_where);

    });
 }

























