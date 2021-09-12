# Desafio M2 - Documentação

## Descrição do desafio

Montar uma api RESTful com laravel para alimentar uma SPA com as seguintes funções:

1. Cadastrar/Editar/Listar/Excluir cidades
2. Cadastrar/Editar/Listar/Excluir grupo de cidades
3. Cadastrar/Editar/Listar/Excluir Campanhas para o grupo de cidades onde cada
grupo possui somente uma campanha ativa
4. Cadastrar/Editar/Listar/Excluir desconto para os produtos da campanha
5. Cadastrar/Editar/Listar/Excluir produtos

Obs: As tabelas de relacionamento estão a cargo do desenvolvedor.
Cada cidade possui somente um grupo

## Instalação do projeto

Requisitos:

- [ ]  PHP 8
- [ ]  Composer
- [ ]  Postgresql
    - [ ]  Habilitar extensão do pgsql no arquivo de php.ini
- [ ]  GIT

1. Faça o clone do projeto do github para sua maquina.
2. Abra o projeto com algum editor de texto ou IDE.
3. Rode os seguintes comandos no terminal:

    ```bash
    composer install
    composer update
    composer dump-autoload
    ```

4. Busque na raiz do projeto o arquivo **.env.example** e renomeio para **.env**
5. Abra o .env e configure as variáveis para conexão com banco 

    ```php
    DB_CONNECTION=pgsql
    DB_HOST=127.0.0.1
    DB_PORT=5432
    DB_DATABASE=base
    DB_USERNAME=postgres
    DB_PASSWORD=senha
    ```

6. Rode os seguintes comandos no terminal para rodar as migrations e os seeds e em seguida subir o projeto para teste: 

    ```bash
    php artisan migrate:install
    php artisan db:seed
    php artisan serve
    ```

## MER

![Untitled](Desafio%20M2%20-%20Documentac%CC%A7a%CC%83o%2040edf908cc2f418dbd90719da65152b4/Untitled.png)

## Rotas

![Untitled](Desafio%20M2%20-%20Documentac%CC%A7a%CC%83o%2040edf908cc2f418dbd90719da65152b4/Untitled%201.png)

Arquivo de configuração para o postman [https://github.com/Felipe-Dumont/desafio-m2/blob/master/m2.postman_collection.json](https://github.com/Felipe-Dumont/desafio-m2/blob/master/m2.postman_collection.json)

Link rotas [https://www.getpostman.com/collections/f7664173901728167e57](https://www.getpostman.com/collections/f7664173901728167e57)