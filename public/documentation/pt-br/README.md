<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

## Sobre Employee

Este projeto contém o back-end da aplicação. Verifique as notas de versão:

- [Laravel soft deletes](https://laravel.com/docs/5.8/eloquent#soft-deleting): Deleta virtualmente do banco de dados.

- [Redis](https://redis.io/documentation) Cache: Gerencia o cache da aplicação com o banco de dados NoSQL Redis.

- [Image cache](http://image.intervention.io/use/cache)/image resize: Efetua o dimensionamento das imagens e as armazena em cache.

- [Testes unitários](https://laravel.com/docs/master/http-tests) para verificar o funcionamento de uma feature branch.

- CRUD completo com os padrões da API RESTful:

    `GET`: Index - Obtém todos os recursos

    `GET`: Show - Obtém um recurso específico

    `POST`: Store - Salva um novo recurso

    `PUT/PATCH`: Update - Atualiza um recurso existente

    `DELETE`: Destroy - Destrói um recurso existente

- [Form request](https://laravel.com/docs/master/validation) para validar os dados da requisição.

- [Rules](https://laravel.com/docs/master/validation#custom-validation-rules) para validar regras específicas da aplicação.

- [Resources](https://laravel.com/docs/master/eloquent-resources) para manipular as respostas da aplicação.

- [Comando](https://github.com/GuilhermeAlbert/employee/blob/master/app/Console/Commands/CacheClear.php) para limpar todo o cache: `php artisan clear:all`

- Documentação de API com [Swagger Open API anotation](https://swagger.io/). Endpoint: `/api/documentation`

- Pacote de traduções do Laravel: Mensagens em inglês ou português.

- [Passport](https://laravel.com/docs/master/passport) para fazer a autenticação da API.

----

## Iniciando

Execute a configuração do ambiente de desenvolvimento usando um servidor da Web, banco de dados e dependências do PHP.

### Linux: Ubuntu 16.04 LTS

Execute a instalação do Apache, MySQL, PHP e seus módulos.

```shell
sudo apt-get update
```

Instale as dependências necessárias: 

```shell
sudo apt-get install php7.2 php7.2-cli php7.2-common php7.2-xml php7.2-mbstring php7.2-pgsql php7.2-mysql php7.2-curl php7.2-gd php7.2-json curl -y
```

E instale a redis cache e a extensão gráfica php GD.

```shell
sudo apt-get php-redis php-gd
```

Verifique a versão com `php -v`


```
PHP 7.2.17-1+ubuntu16.04.1+deb.sury.org+3 (cli) (built: Apr 10 2019 10:50:19) ( NTS )
Copyright (c) 1997-2018 The PHP Group
Zend Engine v3.2.0, Copyright (c) 1998-2018 Zend Technologies
    with Zend OPcache v7.2.17-1+ubuntu16.04.1+deb.sury.org+3, Copyright (c) 1999-2018, by Zend Technologies
```

Inicie o servidor web: `sudo systemctl start apache2 && systemctl status apache2`

Para a instalação do laravel, primeiro você precisa ter o compositor em sua máquina, se não conseguir fazer o download de um executável e instalar o compositor sem muita dificuldade em sua máquina.

Clique no link para fazer o download:

```shell 
https://getcomposer.org/
```

Com o compositor em sua máquina Windows, instalaremos nosso utilitário, o Laravel Installer. Primeiro abra seu prompt de comando, basta usar a combinação de teclas `CTRL + R` e, na janela exibida, digite: `cmd`. Depois disso, pressione ENTER para abrir o prompt.

Com o prompt aberto, digite e execute o comando abaixo:

```shell 
composer global require "laravel/installer"
```

Para acessar os arquivos do aplicativo, você precisa baixar o repositório no GitHub.


## Instalando o projeto

Execute a clonagem do repositório através do GitHub:

```shell 
git clone https://github.com/GuilhermeAlbert/employee.git
```

Navegue pelas pastas do seu computador até chegar à pasta clonada:

```shell 
cd employee
```

Use o *composer* para executar a instalação:

```shell 
composer install
```

Se for preciso, use o gerenciador de pacotes do node para instalar as dependências necessárias:

```shell 
npm install
```

Você precisará configurar o arquivo `.env` para o projeto, definindo os valores de conexão com o banco de dados e, se necessário, criando uma nova chave de hash.

```shell
cp .env.example .env
```

```shell
php artisan key:generate
```

## Criando a base de dados:

Crie o banco de dados no seu ambiente de gerenciador de banco de dados MySQL:

```sql
CREATE DATABASE employee;
```

Use `migrations` para criar as tabelas do banco de dados:

```shell
php artisan migrate
```

Execute todos os dados falsos da fábrica de banco de dados:

```shell
php artisan db:seed
```

Execute este comando para instalar o `Laravel passport auth`:

```shell
php artisan passport:install
```

## Starting server

Comece a exibir o aplicativo no servidor:

```shell
php artisan serve
```

Se tudo estiver correto, ao executar o `php artisan serve` no terminal, algo como:

```
Laravel development server started: <http://127.0.0.1:8000>
```

Para testar a API, você deve seguir as etapas: [https://github.com/GuilhermeAlbert/employee/tree/master/public/documentation/pt-br](https://github.com/GuilhermeAlbert/employee/tree/master/public/documentation/pt-br).

----

## Testes unitários

Você pode executar os testes de unidade seguindo os documentos de teste abaixo:

Use os seguintes comandos para executar testes de unidade.

##### Teste específico

Para rodar um teste específico utilize o seguinte comando: 

`./vendor/bin/phpunit --filter testGetSuccess ./tests/Unit/IndexFuncionarioTest`.

`./vendor/bin/phpunit --filter testGetFail ./tests/Unit/IndexFuncionarioTest`.

Você pode ver todos os testes possíveis aqui: [https://github.com/GuilhermeAlbert/employee/tree/master/tests/Unit](https://github.com/GuilhermeAlbert/employee/tree/master/tests/Unit)

Explicação: 

**`testGetSuccess`**: Nome do método.

**`./tests/Unit/IndexFuncionarioTest`**: Nome da classe.

##### Todos os testes

Para executar todos os testes, use o seguinte comando: `./vendor/bin/phpunit`.
