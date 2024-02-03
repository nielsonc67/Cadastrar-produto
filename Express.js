// server.js

const express = require('express');
const bodyParser = require('body-parser');
const app = express();
const port = 3000;

// Middleware para parsear o corpo das requisições
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

// Simulação de um banco de dados de produtos
let products = [];

// Rota para salvar um novo produto
app.post('/api/products', (req, res) => {
    const { name, barcode } = req.body;
    const newProduct = { name, barcode };
    products.push(newProduct);
    res.json({ message: 'Produto salvo com sucesso!' });
});

// Rota para buscar um produto pelo código de barras
app.get('/api/products/:barcode', (req, res) => {
    const { barcode } = req.params;
    const product = products.find(p => p.barcode === barcode);
    if (product) {
        res.json(product);
    } else {
        res.status(404).json({ error: 'Produto não encontrado' });
    }
});

app.listen(port, () => {
    console.log(Servidor rodando em http://localhost:${port});
});