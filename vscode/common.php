打开新的文件会覆盖窗口中的,怎么改  "workbench.editor.enablePreview": false
{
"files.autoSave": "afterDelay",
"workbench.editor.enablePreview": false
}

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