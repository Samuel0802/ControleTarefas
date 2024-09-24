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

### Pacote Laravel Excel

composer require maatwebsite/excel:^3.1.47 --ignore-platform-reqs
php artisan vendor:publish --provider="Maatwebsite\Excel\ExcelServiceProvider" --tag=config


## Exportando um arquivo em XLSX

 php artisan make:export TarefasExport  --model=Tarefa
 https://docs.laravel-excel.com/3.1/exports/

 ## Exportando um arquivo em PDF

 composer require mpdf/mpdf --ignore-platform-reqs

## Exportando DomPDF 

composer require barryvdh/laravel-dompdf --ignore-platform-reqs
php artisan vendor:publish --provider="Barryvdh\DomPDF\ServiceProvider"
'PDF' => Barryvdh\DomPDF\Facade\Pdf::class,

### Exportando Toastr

https://github.com/brian2694/laravel-toastr

https://codeseven.github.io/toastr/demo.html


