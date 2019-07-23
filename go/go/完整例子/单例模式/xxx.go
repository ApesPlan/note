package xxx

import (
    "sync"
)

type xxx struct {
}

var instance *xxx
 var once sync.Once

func GetInstance() *xxx {
    once.Do(func() {
        instance = &xxx{}
    })
    return instance
}