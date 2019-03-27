<div v-if="user.id!=0"></div>
<span class="title" v-text="user.campus"></span>
<router-link :to="{name:'my_tasks'}" class="link">我的任务</router-link>
<router-link :to="{name:'act_answer'}" class="answer right" tag="div" active-class></router-link>

<keep-alive>
    <router-view v-if="$route.meta.keepAlive"></router-view>
</keep-alive>
<router-view v-if="!$route.meta.keepAlive"></router-view>
keep-alive用法
<keep-alive>包裹动态组件时,会缓存不活动的组件实例,而不是销毁它们
    <keep-alive>是一个抽象组件:它自身不会渲染一个DOM元素,也不会出现在父组件链中
        当组件在<keep-alive>内被切换,它的activated和deactivated这两个生命周期钩子函数将会被对应执行

<div class="board cant" v-if="!canJoin"> !canJoin是ts类里的属性 直接用


