
package main
 
import "fmt"
 
func Adder() func(v int) int{ //闭包 返回值为匿名函数
	sum := 0					//自由变量 自由变量 我的理解是此函数内有效的不被回收的值
	return func(v int)int{		//返回值为函数 完成闭包流程
		sum += v				//sum为叠加 不会被释放
		return sum
	}
}

// IAdder 正统的函数式编程
type IAdder func(int) (int , IAdder)
func adder2(base int) IAdder{
	return func(v int) (int, IAdder) {
		return base +v, adder2(base +v )
	}
}

func main(){
	a := Adder()				//将函数作为变量赋值给a是函数式编程的特点
	for i:= 0; i < 10; i++{
		fmt.Println(a(i))		//打印闭包返回值 i值实际是向Adder（）的匿名函数赋值
	}

	a1 := adder2(0)
	for i:= 0; i < 10; i++{
		var s int
		s, a1 = a1(i)
		fmt.Println(s)
	}
}