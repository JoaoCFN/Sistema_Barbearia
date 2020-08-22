const express = require("express")
const server = express()


//liga o server
server.listen(3000)

//acessar pastas publicas como os arquivos css do sistema
server.use(express.static("public"))

//utilizando template engine
const nunjucks = require("nunjucks")
nunjucks.configure("src/views", {
    express: server,
    noCache: true
})

// listando rotas
server.get("/", (req, res) => { // O "/" sempre vai voltar p paginica inical, depois é só copiar e colar as proximas rotas
    return res.render("index.html")
})