${workspaceRoot}:就是你打开vscode读取的项目目录
"program"中的"${fileDirname}"是以当前选中文件作为启动点
更建议使用"program"的"${workspaceRoot}", 以包名作为启动点的方式进行配置
文件家名称 .vscode
打开新的文件会覆盖窗口中的,怎么改  "workbench.editor.enablePreview": false
settings.json
// 系统配置1
{
"files.autoSave": "afterDelay",
"workbench.editor.enablePreview": false
}
// 系统配置2
{
    "files.autoSave": "afterDelay",
    "workbench.editor.enablePreview": false,
    "git.autofetch": true,
    "editor.tabSize": 2,
    "terminal.integrated.shell.windows": "C:\\Windows\\System32\\cmd.exe"
}

// 项目配置
{
    "go.useLanguageServer": true,
    "go.languageServerExperimentalFeatures": {
        "format": false,
        "autoComplete": true,
        "rename": true,
        "goToDefinition": true,
        "hover": true,
        "signatureHelp": true,
        "goToTypeDefinition": true,
        "goToImplementation": true,
        "documentSymbols": true,
        "workspaceSymbols": true,
        "findReferences": true,
        "diagnostics": false
    },
    "go.formatTool": "goimports",
    "go.vetFlags": [
        "-unsafeptr"
    ]
}

koroFileHeader // 自动注释 
文件头部添加注释:

在文件开头添加注释，记录文件信息
支持用户高度自定义注释选项
保存文件的时候，自动更新最后的编辑时间和编辑人
快捷键：window：ctrl+alt+i,mac：ctrl+cmd+i

在光标处添加函数注释:

在光标处自动生成一个注释模板，下方有栗子
支持用户高度自定义注释选项
快捷键：window：ctrl+alt+t,mac：ctrl+cmd+t