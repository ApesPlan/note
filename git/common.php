ssh-keygen -t rsa -C "735761545@qq.com" // 三次回车即生成ssh-key,然后配置好
git init // 初始化本地版本库
git status // 查看本地版本库状态
git add . // 跟踪所有改动过的文件
git add 文件名 // 跟踪指定文件
git commit -m '注释' // 提交所有更新过的文件
git push // 提交
git pull // 拉取分支到本地工作区
git fetch // 拉取分支到本地仓库

git diff 不加参数即默认比较工作区与暂存区
git mv 旧文件名 新文件名 // 文件改名
git rm 文件名 // 删除文件
git rm --cached 文件名 // 停止跟踪文件但不删除
git log // 查看提交历史
git log -p 文件名 // 查看指定文件的提交历史
git blame 文件名 // 以列表形式查看指定文件的提交历史
git reset --hard HEAD // 撤销工作目录中所有未提交文件的修改内容
git checkout HEAD 文件名 // 撤销指定的未提交文件的修改内容
git branch // 显示所有本地分支
git checkout 分支名/tag // 切换到指定分支或标签
git checkout -d 分支名 // 删除本地分支
git branch 分支名 // 创建新分支
git merge --no-ff pack_dist_server // 合并pack_dist_server分支到当前分支
git remote -v // 查看远程版本库的信息
git remote add origin 仓库地址 // 关联远程仓库
git push --tags // 上传所有标签

docker image 查看已经打包好tag的镜像
docker stop id 关闭镜像
打开docker-compose.yml文件 更改docker id 保存
docker-compose up

当更新到了master分支后，在master分支上打tag
步骤
git checkout master
git merge --no-ff pack_dist_server
git tag
git tag release-v0.0.4
git push --tag
git push
git push --tags // 上传所有标签

git reset --soft HEAD^ // 撤销commit