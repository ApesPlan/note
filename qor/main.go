package main

import (
  "fmt"
  "net/http"
  "github.com/qor/admin"
  "github.com/jinzhu/gorm"
  _ "github.com/jinzhu/gorm/dialects/mysql"
)

// User Define a GORM-backend model
type User struct {
  gorm.Model
  Name string
}

// Product Define another GORM-backend model
type Product struct {
  gorm.Model
  Name        string
  Description string
}

func main() {
	// 数据库连接
	mysqlURL := "root:447728@/admin_custom_cherry_cn?charset=utf8&parseTime=True&loc=Local"
	DB, _ := gorm.Open("mysql", mysqlURL)
	DB.AutoMigrate(&User{}, &Product{})

	// Initalize
	Admin := admin.New(&admin.AdminConfig{DB: DB})

	// Create resources from GORM-backend model
	Admin.AddResource(&User{})
	Admin.AddResource(&Product{})

	// Initalize an HTTP request multiplexer
	mux := http.NewServeMux()

	// Mount admin to the mux
	Admin.MountTo("/admin", mux)

	fmt.Println("Listening on: 9000")
	http.ListenAndServe(":9000", mux)
}