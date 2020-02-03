<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

## Sobre este tutorial

Este tutorial tem o intuito de exemplificar o processo de obtenção da chave de API através do console. Por favor, siga os passos abaixo.

### Criando um usuário

Acesse o **console da API** e clique no botão de "register" para criar um novo usuário.

<img src="https://raw.githubusercontent.com/GuilhermeAlbert/employee/master/public/screenshots/1-register-screen.png" width="100%">

Após isto, você precisa criar a chave de API pessoal.

### Criando a sua personal access token

Crie a chave clicando em "Create new Token".

<img src="https://raw.githubusercontent.com/GuilhermeAlbert/employee/master/public/screenshots/2-create-token.png" width="100%">

Escolha um nome legal para sua personal access token.

<img src="https://raw.githubusercontent.com/GuilhermeAlbert/employee/master/public/screenshots/3-choose-token-name.png" width="100%">

Voilà! Você tem uma chave da API agora. **Não se esqueça de copiar a chave gerada para usá-la posteriormente.**.

<img src="https://raw.githubusercontent.com/GuilhermeAlbert/employee/master/public/screenshots/4-token-was-created.png" width="100%">

### Fazendo a chamada na API usando um cliente de APIs 

Para obter um resultado da API, você precisa utilizar a chave gerada anteriormente. Copie a chave e cole dentro do seu gerenciador de APIs na sessão de autorização (use o tipo `Bear Token`) e faça a chamada.

<img src="https://raw.githubusercontent.com/GuilhermeAlbert/employee/master/public/screenshots/5-call-with-client.png" width="100%">

### Fazendo a chamada na API usando o Swagger

Acesse o endpoint `/api/documentation` e use a documentação do Swagger para fazer chamadas na API.

<img src="https://raw.githubusercontent.com/GuilhermeAlbert/employee/master/public/screenshots/6-call-with-swagger.png" width="100%">

----

<p align="center">Este documento foi criado por Guilherme Albert e emponderado por Trebla Labs.

<img src="https://treblalabs.com/img/trebla-main.svg" width="400">

</p>