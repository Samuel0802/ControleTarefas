### Instalando Laravel Ui

composer require laravel/ui:

### Gerar o scaffolding (exemplo com Bootstrap e autenticação):

php artisan ui bootstrap --auth

### Comando para carregar o Bootstrap

npm install e npm run dev

### Criando Controller estilo --resource

 php artisan make:controller --resource TarefasController --model=Tarefa

 ### Nova classe de mail

 php artisan make:mail MensagemTesteMail --markdown emails.mensagem

 ### Publicando E customizando o template de Email

 php artisan vendor:publish

 ### Classe Texto para texto de notificação

php artisan make:notification RedefinirSenhaNotification

