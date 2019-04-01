AnswerStore::where("valid", true)->select(["question", "right_index", "selects"])->get()->toArray();
事务
DB::beginTransaction();
try {
    $chance = LotteryChance::addChance($user);
    PointsLog::changePoints(
    $user->id,
    '-'.LotteryChance::ONE_CHANCE_POINTS,
    PointsLog::TYPE_ACT_LOTTERY_CHANCE,
    $chance->id,
    '抽奖消耗积分'
    );
} catch (\Exception $e) {
    DB::rollback();
    return Json::response(Code::server_error);
}

DB::commit();

public static function getWins(User $user)
{
    $data = LotteryWin::leftJoin('lottery_award', 'lottery_win.lottery_award_id', '=', 'lottery_award.id')
    ->select(
    'lottery_award.name as award_name',
    'lottery_award.image as award_image',
    'lottery_award.type as award_type',
    'lottery_win.*'
    )
    ->where('lottery_win.user_id', $user->id)
    ->orderBy('lottery_win.created_at', 'desc')
    ->get();
return $data;
}

$signStore = SignStore::where([
    ['start_date', '<=', Carbon::today()],
    ['end_date', '>=', Carbon::today()]
])->get();

$log = [
    'user_id' => $user_id,
    'points' => $points,
    'type' => $type,
    'related_id' => $related_id,
    'description' => $desc,
];
return self::create($log);

$agentApply = $request->user->agentApply()->orderBy('id', 'desc')->first();
$cities = City::select('id', 'name', 'initials')->get();

$data = Campus::where('name', 'like', '%'.$request->name.'%')->select('id', 'name')->get();

PointsExchangeMoney::join('points_money_relation', 'points_exchange_money.points_money_relation_id', '=', 'points_money_relation.id')
->where('user_id', $user_id)
->sum('points_money_relation.money');

$list = PointsLog::where('user_id', $request->user->id)
->latest()
->offset($offset)
->limit($request->pageSize)
->get();

$list = PointsLog::where('user_id', $request->user->id)
->latest()
->offset($offset)
->limit($request->pageSize)
->get()
->each(function($value) {
$value->relation = PointsLog::factory($value->type, $value->related_id);
});

$data = Question::where('valid', 1)
->orderBy('order')
->take(self::ROWS)
->get();

return UserTask::where([['task_id', $task_id], ['status', '>', 0]])->count();











