# Sistema de Enquete

###Para utilizar esse sistema, siga os passos descritos abaixo:
* Após clonar o repositório, atualize o composer com o comando na raiz do projeto: "composer update".
* Vá a pasta public, e atualize as dependencias do bower com o comando: "bower install"
* Execute a aplicação com o comando na raiz do projeto: "php artisan serve"
* **Pronto!** Tudo rodando. :)

###Considerações importantes!
* O sistema foi desenvolvido com angular e [Lumen](http://lumen.laravel.com/), este foi construido baseado no laravel 5
* Por ser, um miniframework, algumas camadas foram retiradas, até para simplificar o desenvolvimento, como por exemplo, a camada de Requests (Tratamento de requisições), deixando assim este processo na própria controller.
* O banco escolhido foi o sqlite, não vi necessidade de utilizar um MySql ou qualquer outro para este exemplo, porém caso aja necessidade as migrações estão registradas do Lumen e podem ser implementadas em outros SGBD's.
