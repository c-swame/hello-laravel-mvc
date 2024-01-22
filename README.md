# Aplicação Laravel

Esta aplicação foi desenvolvida com Laravel 10.x.
Como estudo para criação de crud e armazenamnto de imagens;



## Instalação

Para instalar a aplicação, siga os seguintes passos:

### 1. Clone o repositório:

git clone https://github.com/c-swame/hello-laravel-mvc.git


### 2. Entre na pasta da aplicação:

cd hello-laravel-mvc


### 3. Instale as dependências:

composer install


### 4. Crie um arquivo `.env` e defina as variáveis de ambiente:

veja: '.env.example';

e edite: '.env';


### 5. Gere uma chave de criptografia:

php artisan key:generate


### 6. Migre o banco de dados:

php artisan migrate


## Execução

Para executar a aplicação, execute os seguintes comandos:

npm run build (se necessário);

npm run dev (se necessário);

php artisan serve;


A aplicação será iniciada na porta 8000.

## Notas

Afim de facilitar os testes manuais, não foi adicionada validação de email, mas os usuários criados com email finalizados em "@connecta.com" serão do tipo "admin", enquanto os demais serão do tipo "user".
