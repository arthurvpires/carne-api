# API RESTful para gerar e apresentar parcelas de carnê usando PHP e Laravel

Este projeto é uma API RESTful desenvolvida com Laravel para gerar e gerenciar parcelas de carnê. O projeto inclui funcionalidades para criar e recuperar carnês e suas parcelas.

## Requisitos

- PHP >= 8.3.3
- Composer
- MySQL

## Configuração do Ambiente

### 1. Clonando o Repositório

Clone o repositório para o seu ambiente local:

```bash
git clone https://github.com/arthurvpires/carne-api.git

```

 ### 2. Renomeie o arquivo .env.example para .env e ajuste as configurações conforme necessário:

```bash 
cp .env.example .env
```

### 3. Instale as dependências do projeto usando o Composer:

```bash 
composer install
```

### 4. Crie o banco de dados especificado no arquivo .env

- Execute as migrations para criar as tabelas necessárias:

 ```bash
 php artisan migrate
 ```

## Para rodar a aplicação localmente, você pode usar o servidor embutido do Laravel:

```bash 
php artisan serve
```

## Para executar os testes: 
```bash
vendor/bin/phpunit
```

## Acessar API

 A API estará disponível em http://localhost:8000 com uma view disponível para testar os casos citados no arquivo do projeto. Para fazer outras requições via Postman, por exemplo, o link da API é: http://localhost:8000/api/carne
