package main

import (
	"fmt"
	"math/rand"
	"time"
)

func main() {
	// go build -o 路径+文件.exe（输出） 路径加文件名（输入）
	time.Sleep(1 * time.Second)
	fmt.Printf("%.2f", 20.0)
	fmt.Printf("%10.2f", 20.0)  // 左对齐
	fmt.Printf("-%10.2f", 20.0) // 右对齐
	rand.Intn(100)
	rand.New(rand.NewSource(time.Now().Unix())) // 秒
	rand.New(rand.NewSource(time.Now().UnixNano())) // 纳秒
}
