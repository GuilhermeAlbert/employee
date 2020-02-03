<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

## About this tutorial

This tutorial is intended to exemplify the process of obtaining the API key. Do the following steps:

### Create a personal user

Access the application **API console** and click on "register" button to create a new user.

<img src="https://raw.githubusercontent.com/GuilhermeAlbert/employee/documentation%2339/public/screenshots/1-register-screen.png" width="100%">

After created the user, you have to create a personal API key.

### Create a personal access token

Create a new token by clicking on button "Create new Token".

<img src="https://raw.githubusercontent.com/GuilhermeAlbert/employee/documentation%2339/public/screenshots/2-create-token.png" width="100%">

Choose a beaultiful name to your personal access token.

<img src="https://raw.githubusercontent.com/GuilhermeAlbert/employee/documentation%2339/public/screenshots/3-choose-token-name.png" width="100%">

Voilà! You have a token now. **Don't forget to copy the generated token, to make a API call with this**.

<img src="https://raw.githubusercontent.com/GuilhermeAlbert/employee/documentation%2339/public/screenshots/4-token-was-created.png" width="100%">

### Making a API call using a API client

To get data from API, you have to use your access token before generated. Copy your token and paste inside the API client on authorization section (use the `Bear Token` type) and make the call.

<img src="https://raw.githubusercontent.com/GuilhermeAlbert/employee/documentation%2339/public/screenshots/5-call-with-client.png" width="100%">

### Making a API call using Swagger

Access the endpoint `/api/documentation` and use the Swagger docs to make API calls.

<img src="https://raw.githubusercontent.com/GuilhermeAlbert/employee/documentation%2339/public/screenshots/6-call-with-swagger.png" width="100%">

----

<p align="center">This docs was created by Guilherme Albert and powered by Trebla Labs.

<img src="https://treblalabs.com/img/trebla-main.svg" width="400">

</p>