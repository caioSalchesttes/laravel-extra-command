# Laravel Extra Commands

Este pacote fornece comandos adicionais para o framework Laravel, que podem ajudar a acelerar o seu fluxo de trabalho de desenvolvimento.

## Instalação

Para instalar o pacote, você pode usar o Composer:

\`\`\`bash
composer require caio/laravel-extra-commands
\`\`\`

## Comandos Disponíveis

No momento, o pacote oferece o seguinte comando:

### make:service

Este comando cria uma nova classe de serviço no diretório `App\Services`. 

\`\`\`bash
php artisan make:service NomeDoServico
\`\`\`

Se o nome do serviço não terminar com "Service", o comando adicionará automaticamente.

Por exemplo, o comando a seguir:

\`\`\`bash
php artisan make:service Teste
\`\`\`

Irá criar a classe `TesteService` no diretório `App\Services`.

## Personalização

O comando `make:service` usa um arquivo stub para gerar a nova classe de serviço. Você pode personalizar este stub conforme necessário. O arquivo stub está localizado em:

\`\`\`bash
vendor/caio/laravel-extra-commands/stubs/service.stub
\`\`\`

## Contribuição

Contribuições são bem-vindas! Por favor, abra um issue ou submita um pull request no [repositório do pacote no GitHub](link-para-o-seu-repositório).

## Licença

Este pacote é licenciado sob a [MIT license](link-para-a-sua-licença).
