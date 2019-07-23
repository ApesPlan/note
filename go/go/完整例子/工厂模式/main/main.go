package main

import (
	"fmt"
	"xxx/model"
)

func main() {
	// 创建要给Student实例 正常实例化结构体
	// var stu = model.Student{
	// 	Name :"tom",
	// 	Score : 78.9,
	// }

	//定student结构体是首字母小写，我们可以通过工厂模式来解决
	var stu = model.NewStudent("tom~", 98.8)

	fmt.Println(*stu) //&{....}
	fmt.Println("name=", stu.Name, " score=", stu.GetScore())
}