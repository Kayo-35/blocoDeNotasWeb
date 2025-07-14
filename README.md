# Desenvolvimento de um bloco de notas Web

## Tecnologias utilizadas

- PHP
- HTML/CSS/Bootstrap

## Metodologia e Objetivos

- Modelado utilizando princípios de OOP
- Aderir ao Modelo MVC
- Seguir boas práticas de desenvolvimento

## Implementando

### Requer:

- PHP >= 8.2
- Composer >= 2.8.9
- MySQL ou MariaDB

### Etapas

1. Clone o repositório
2. Edite o arquivo .env para incluir as configurações do seu ambiente(base de dados)
3. Em public/resources há o arquivo dbCreate.sql para criar a base de dados e o de inserts.

#### Comandos

- Instalar as dependências via composer(uma única vez)

```bash
composer install
```

- Exemplo de como executar(utilizando o servidor dev built-in do php)

```bash
php -S localhost:8000 -t public
```

Basta então visitar localhost:8000 e testar a aplicação.
