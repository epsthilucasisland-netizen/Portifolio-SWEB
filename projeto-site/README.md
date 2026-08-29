# 🛍️ THIGGA — Loja Virtual de Artigos Esportivos

## 📖 Descrição do projeto

O **THIGGA** é um site de e-commerce desenvolvido para a venda de artigos esportivos, reunindo produtos como camisetas, tênis, shorts, bonés e acessórios em uma plataforma moderna e intuitiva.

O projeto foi desenvolvido utilizando **PHP, MySQL, HTML5, CSS3 e JavaScript**, contando também com um painel administrativo (CRUD) para gerenciamento de produtos, categorias e clientes. Seu objetivo é oferecer uma experiência simples, rápida e responsiva tanto para clientes quanto para administradores da loja.

---

## 🎯 Objetivos

* Desenvolver uma loja virtual funcional de artigos esportivos.
* Aplicar conceitos de desenvolvimento web utilizando PHP e banco de dados MySQL.
* Criar um sistema CRUD para gerenciamento de informações.
* Oferecer uma navegação intuitiva e responsiva para diferentes dispositivos.
* Demonstrar a integração entre front-end e back-end em um único projeto.

---

## 👥 Público-alvo / Faixa etária

O site foi pensado para pessoas entre **14 e 40 anos**, especialmente:

* Praticantes de esportes;
* Jovens interessados em moda urbana;
* Clientes que buscam roupas e acessórios esportivos;
* Consumidores que preferem compras rápidas pela internet.

---

## 🛒 O que o usuário encontrará

Na área pública do site, o usuário poderá encontrar:

* Página inicial com produtos em destaque;
* Catálogo completo de produtos;
* Categorias organizadas por tipo de produto;
* Página "Sobre" apresentando a marca;
* Página de contato;
* Área de login para acesso administrativo.

Já o administrador possui acesso ao painel onde pode:

* Cadastrar produtos;
* Editar informações;
* Excluir registros;
* Gerenciar categorias;
* Visualizar clientes cadastrados.

---

## 💡 Problema que o site resolve

Muitas lojas pequenas possuem dificuldade em organizar seus produtos e oferecer um catálogo digital eficiente.

O **THIGGA** resolve esse problema ao disponibilizar:

* Organização de produtos por categorias;
* Administração completa através de um painel;
* Facilidade de atualização do catálogo;
* Experiência de compra simples e objetiva.

---

## 🛡️ Cuidados adotados durante o desenvolvimento

Durante a construção do projeto foram adotados diversos cuidados técnicos:

* Separação entre front-end e back-end;
* Organização do código em pastas específicas;
* Reutilização da conexão com o banco utilizando `require_once`;
* Utilização de **PDO** para conexão segura com MySQL;
* Consultas preparadas (`prepare`) para evitar SQL Injection;
* Estrutura responsiva para melhor adaptação em dispositivos móveis;
* Interface limpa, priorizando usabilidade e legibilidade.

---

## 🎨 Identidade visual

A identidade visual da THIGGA foi inspirada em grandes marcas esportivas, transmitindo modernidade, desempenho e estilo urbano.

### Paleta de cores

| Cor      | Código    |
| -------- | --------- |
| Preto    | `#111111` |
| Vermelho | `#C1121F` |
| Branco   | `#FFFFFF` |
| Cinza    | `#2A2A2A` |

### Tipografia

**Fonte principal:** Poppins (Google Fonts)

Características da fonte:

* Moderna
* Alta legibilidade
* Excelente para interfaces digitais
* Visual esportivo e minimalista

### Elementos visuais

* Ícones minimalistas;
* Cards de produtos;
* Botões arredondados;
* Banner principal em destaque;
* Layout com bastante contraste entre preto e vermelho;
* Navegação superior fixa.

---

## 🏗️ Estrutura inicial do site

A aplicação foi dividida em duas áreas principais:

### Área pública

* Home (`index.php`)
* Produtos
* Categorias
* Sobre
* Contato

### Área administrativa

* Login
* Dashboard
* CRUD de Produtos
* CRUD de Categorias
* CRUD de Clientes

---

## ⚙️ Recursos utilizados

### Front-end

* HTML5
* CSS3
* JavaScript
* Font Awesome
* Google Fonts

### Back-end

* PHP 8+
* MySQL
* PDO

### Funcionalidades

* Sistema de Login
* Sessões de usuário
* CRUD completo
* Listagem dinâmica de produtos
* Relacionamento entre categorias e produtos
* Dashboard administrativo

---

## 📁 Organização das pastas

```text
thigga_projeto/
│
├── admin/
│   ├── index.php
│   ├── dashboard.php
│   ├── produtos.php
│   ├── categorias.php
│   └── clientes.php
│
├── assets/
│   ├── css/
│   ├── js/
│   └── img/
│
├── config/
│   ├── conexao.php
│   └── auth.php
│
├── database/
│   └── thigga.sql
│
├── index.php
├── produtos.php
├── categorias.php
├── sobre.php
├── contato.php
└── README.md
```

---

## 🚀 Tecnologias

* **HTML5**
* **CSS3**
* **JavaScript**
* **PHP**
* **MySQL**
* **PDO**

---

## 👨‍💻 Autor

Projeto acadêmico desenvolvido por Lucas Oliveira Souza e Thiago Maia, para demonstrar a criação de um sistema web completo de loja virtual utilizando PHP, MySQL e tecnologias modernas de desenvolvimento web.



