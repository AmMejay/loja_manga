#  Sistema de Loja de Mangás

Sistema web desenvolvido em **PHP** e **MySQL** para gerenciamento de uma loja de mangás. O projeto permite visualizar os mangás disponíveis, consultar lojas cadastradas, realizar compras e gerenciar devoluções de pedidos de forma simples e intuitiva.

---

##  Funcionalidades

-  Listagem de mangás disponíveis
-  Visualização das lojas cadastradas
-  Realização de compras
-  Edição de pedidos
-  Exclusão de pedidos
-  Gerenciamento de devoluções
-  Integração com banco de dados MySQL

---

##  Tecnologias Utilizadas

- PHP
- MySQL
- HTML5
- CSS3
- XAMPP (Apache + MySQL)

---

##  Estrutura do Projeto

```
loja_manga/
│
├── css/
│   └── style.css
│
├── loja/
│   └── listaLoja.php
│
├── manga/
│   └── listaManga.php
│
├── pedidos/
│   ├── comprar.php
│   ├── processar_compra.php
│   ├── processar_edicao.php
│   ├── editPedido.php
│   ├── deletePedido.php
│   └── listaDevolucao.php
│
├── database.php
├── data.sql
├── index.php
└── README.md
```

---

##  Como executar o projeto

### 1. Clone o repositório

```bash
git clone https://github.com/seu-usuario/loja_manga.git
```

ou faça o download do projeto em `.zip`.

### 2. Coloque a pasta no XAMPP

Copie a pasta do projeto para:

```
xampp/htdocs/
```

### 3. Inicie os serviços

Abra o **XAMPP Control Panel** e inicie:

- Apache
- MySQL

### 4. Importe o banco de dados

1. Abra o **phpMyAdmin**
2. Crie um banco de dados
3. Importe o arquivo:

```
data.sql
```

### 5. Configure a conexão

Caso necessário, altere as informações do arquivo:

```
database.php
```

com os dados do seu banco de dados.

### 6. Execute

Abra o navegador e acesse:

```
http://localhost/loja_manga
```

---

##  Funcionalidades da aplicação

### Página inicial
- Acesso rápido aos módulos do sistema.

### Mangás
- Exibe todos os mangás disponíveis.

### Lojas
- Lista todas as lojas cadastradas.

### Compras
- Permite selecionar uma loja e um mangá para realizar uma compra.

### Devoluções
- Lista os pedidos que podem ser devolvidos e permite seu gerenciamento.

---

##  Objetivo

Este projeto foi desenvolvido com o objetivo de praticar conceitos de desenvolvimento web utilizando **PHP**, **MySQL**, manipulação de banco de dados, organização de arquivos, operações CRUD e integração entre front-end e back-end.

---

##  Autor

Desenvolvido por **Nícolas Rafael**.

---

##  Licença

Este projeto possui finalidade educacional e pode ser utilizado para estudos e aprimoramento de conhecimentos em desenvolvimento web.
