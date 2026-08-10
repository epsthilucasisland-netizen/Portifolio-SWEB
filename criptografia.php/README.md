# 🔐 Criptografia no PHP

Projeto educacional desenvolvido em **PHP** para demonstrar, de forma simples e visual, diferentes técnicas relacionadas à segurança e ao processamento de informações.

A aplicação utiliza uma única página (`index.php`) para apresentar explicações e permitir que o usuário digite um texto e visualize os resultados de diferentes funções disponíveis no PHP.

## 📚 Sobre o projeto

O objetivo deste projeto é apresentar, de maneira prática, a diferença entre **hash**, **codificação** e **criptografia**.

O usuário informa um texto e a aplicação demonstra:

* 🔑 **MD5**
* 🔐 **SHA-256**
* 🔒 **password_hash()**
* 📝 **Base64**

> **Observação:** Base64 não é criptografia, mas uma técnica de codificação. MD5 e SHA-256 são funções de hash.

## 🖥️ Demonstração

A página possui um campo onde o usuário pode informar um texto:

```text
Digite um texto:
┌──────────────────────────────┐
│ Olá mundo                    │
└──────────────────────────────┘

        [ Demonstrar ]
```

Após enviar o formulário, o sistema apresenta os resultados:

```text
Texto informado:
Olá mundo

MD5:
...

SHA-256:
...

password_hash():
...

Base64:
...
```

## 🛠️ Tecnologias utilizadas

* **PHP**
* **HTML5**
* **CSS3**

Não são utilizados frameworks ou bibliotecas externas.

## 📁 Estrutura do projeto

```text
criptografia-php/
│
├── index.php
├── style.css
└── README.md
```

### `index.php`

Arquivo principal da aplicação.

Contém:

* Estrutura HTML da página;
* Código PHP;
* Formulário para entrada do texto;
* Geração dos hashes;
* Codificação em Base64;
* Apresentação dos resultados.

### `style.css`

Arquivo responsável pelo estilo visual da aplicação.

Contém:

* Cores;
* Layout;
* Cards;
* Formulário;
* Menu;
* Responsividade para dispositivos móveis.

## 🔎 Técnicas demonstradas

### MD5

O MD5 transforma uma entrada em um hash de 128 bits, normalmente representado por 32 caracteres hexadecimais.

No PHP:

```php
md5($texto);
```

**Importante:** MD5 não é recomendado para aplicações modernas que exigem segurança, especialmente para armazenamento de senhas.

---

### SHA-256

SHA-256 é uma função de hash que produz um resultado de 256 bits, normalmente representado por 64 caracteres hexadecimais.

No PHP:

```php
hash("sha256", $texto);
```

---

### password_hash()

A função `password_hash()` foi desenvolvida para gerar hashes apropriados para armazenamento de senhas.

Exemplo:

```php
password_hash($senha, PASSWORD_DEFAULT);
```

Para verificar uma senha:

```php
password_verify($senha, $hash);
```

Essa é a abordagem recomendada pelo PHP para armazenamento de senhas.

---

### Base64

Base64 é uma **codificação**, e não um método de criptografia.

Para codificar:

```php
base64_encode($texto);
```

Para decodificar:

```php
base64_decode($texto);
```

Como não utiliza uma chave secreta, Base64 não deve ser utilizado para proteger informações confidenciais.

## 🔐 Hash x Criptografia

Uma das propostas do projeto é mostrar a diferença entre essas técnicas.

### Hash

```text
Texto
  ↓
  HASH
  ↓
Resultado
```

O hash é utilizado quando não é necessário recuperar o texto original.

Exemplos:

* MD5
* SHA-256
* `password_hash()`

### Criptografia

```text
Texto
  ↓
Criptografia + chave
  ↓
Texto criptografado
  ↓
Descriptografia + chave
  ↓
Texto original
```
## 📌 Requisitos

* PHP 8.0 ou superior
* Navegador web
* Servidor PHP local

Pode ser utilizado, por exemplo:
* XAMPP
* WampServer
* Laragon
* Servidor embutido do PHP

## 🎯 Objetivos educacionais

Este projeto foi desenvolvido com o objetivo de auxiliar no aprendizado de:

* PHP;
* HTML;
* CSS;
* Funções de hash;
* Segurança de senhas;
* Codificação de dados;
* Conceitos básicos de criptografia;
* Diferenças entre hash, codificação e criptografia.


