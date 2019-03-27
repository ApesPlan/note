<meta name="csrf-token" content="{{csrf_token()}}">

<script>
    var CENTER_HOST = "{{env('CENTER_HOST')}}";
    var ENV = "{{env('APP_ENV')}}";
    var APP_URL = "{{env('APP_URL')}}";
</script>
@if(env('APP_ENV')=='server')

@endif

<script src="/dist/{{env('APP_ENV')}}/dist.js?{{time()}}"></script>
<div class="question">@{{qsIndex + 1}} . @{{thqs.question}}</div> 如果没有“”就不用加@ 有了需要加@{{}}

<div :class='["answer","a"+k,
{right_answer:k==thqs.right_index&&chooseLock},
{choose_answer:k==thqs.choose&&chooseLock}]' @click="choose(k)" v-for="v,k in thqs.selects">
    @{{v}}
</div>


