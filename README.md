## Instalação

- Fazer o pull request da branch (feature/teste_menew_renato_maldonado)
- Rodar o comando (composer install), caso não tenha feito.
- Rodar o comando (php artisan migrate --seed) para construir a base de dados ou rodar a query do arquivo SQL que está na pasta database.

## Subir Servidor

- Rodar o comando (php artisan serve).

## Observações

- Foram implementados os design patterns repository e service layer.
- Foi construído comandos para gerar ambos designs que estão no diretório Commands.
- Caso queria utilizar o comando para gerar um reposity rode (php artisan make:respository "Nome que deseja dar para a model"). Será gerado o repositório, a model, a migration e a factory.
- Caso queria utilizar o comando para gerar um service rode (php artisan make:service "Nome que deseja dar para a model" "Nome da ação que deseja que o service faço ex.: Cadastrar"). Será gerado o service com a interface, base, abstract, client e o provider.

