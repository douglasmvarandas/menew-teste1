# Informações sobre a aplicação
Aplicação desenvolvida com o uso do framework Laravel versão 8.x

## Requisitos para a execução do projeto
- PHP >= 7.3
- BCmath PHP Extension
- Ctype PHP Extension
- Fileinfo PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSsl PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Mysql PHP Extension

## Gerando a chave da aplicação
Antes de iniciar a aplicação, é necessário gerar uma chave para a aplicação em seu diretório.

    php artisan key:generate

## Configuração do banco de dados
Para configurar o banco de dados renomeia o arquivo .env.example para .env e configure as propriedades do arquivo.

- DB_CONNECTION=mysql **//tipo de conexão**
- DB_HOST=127.0.0.1 **//host do banco de dados**
- DB_PORT=3306 **//porta de execução do banco de dados**
- DB_DATABASE=laravel **//nome do banco de dados**
- DB_USERNAME=root **//username do banco de dados**
- DB_PASSWORD= **//password do banco de dados**

## Executando as migrações
Caso queira gerar a estrutura do banco de dados, execute o seguinte comando dentro do diretório da aplicação

    php artisan migrate

## Executando servidor
O laravel trás embutido em seu sistema, um servidor interno em PHP para executar a aplicação, digite o comando abaixo dentro do diretório do aplicativo.

    php artisan serve

## Endpoints da aplicação
### /contatos/index

    Lista todos os contatos cadastrados

### /contatos/index?query=Jane

    Realiza uma busca nos contatos

### /contatos/create

    Renderiza o formulário para criar um novo contato

### /contatos/store

    Cria um novo contato

### /contatos/edit/{id}

    Renderiza o formulário para editar um contato específico

### /contatos/update/{id}

    Atualiza um contato específico

### /contatos/delete/{id}

    Remove um contato específico