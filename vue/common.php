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

    1.this.$router.push()

    描述：跳转到不同的url，但这个方法会向history栈添加一个记录，点击后退会返回到上一个页面。

    2.this.$router.replace()

    描述：同样是跳转到指定的url，但是这个方法不会向history里面添加新的记录，点击返回，会跳转到上上一个页面。上一个记录是不存在的。

    3.this.$router.go(n)

    相对于当前页面向前或向后跳转多少个页面,类似 window.history.go(n)。n可为正数可为负数。正数返回上一个页面


    路由守卫的触发流程
    1.点击路由跳转
    2.在失活的组件（即将离开的页面组件）里调用离开路由守卫 beforeRouteLeave
    3.调用全局的前置守卫 beforeEach
    4.在重用的组件里调用 beforeRouteUpdate
    5.调用路由独享的守卫 beforeEnter
    6.解析异步路由组件
    7.在被激活的组件（即将进入的页面组件）里调用 beforeRouteEnter
    8.调用全局的解析守卫 beforeResolve
    9.导航被确认
    10.调用全局的后置守卫 afterEach
    11.触发DOM更新