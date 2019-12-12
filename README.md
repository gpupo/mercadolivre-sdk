# Mercadolivre-SDK

SDK Não Oficial para integração a partir de aplicações PHP com as APIs Mercadolivre

[![Build Status](https://secure.travis-ci.org/gpupo/mercadolivre-sdk.png?branch=master)](http://travis-ci.org/gpupo/mercadolivre-sdk)

[![Paypal Donations](https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=EK6F2WRKG7GNN&item_name=mercadolivre-sdk)


## Requisitos para uso

* PHP *>=7.4*
* [curl extension](http://php.net/manual/en/intro.curl.php)
* [Composer Dependency Manager](http://getcomposer.org)

A versão atual deste pacote funciona apenas em [versões de PHP atualmente suportadas](http://php.net/supported-versions.php).

Este componente **não é uma aplicação Stand Alone** e seu objetivo é ser utilizado como biblioteca.
Sua implantação deve ser feita por desenvolvedores experientes. **Isto não é um Plugin!**

As opções que funcionam no modo de comando apenas servem para depuração em modo de
desenvolvimento.

A documentação mais importante está nos testes unitários. Se você não consegue ler os testes unitários, eu recomendo que não utilize esta biblioteca.

## Direitos autorais e de licença

Este componente está sob a [licença MIT](https://github.com/gpupo/common-sdk/blob/master/LICENSE). Para a informação dos direitos autorais e de licença você deve ler o arquivo de [licença](https://github.com/gpupo/common-sdk/blob/master/LICENSE) que é distribuído com este código-fonte.

### Resumo da licença

Exigido:

- Aviso de licença e direitos autorais

Permitido:

- Uso comercial
- Modificação
- Distribuição
- Sublicenciamento

Proibido:

- Responsabilidade Assegurada

## Agradecimentos

* A todos os que [contribuiram com patchs](https://github.com/gpupo/mercadolivre-sdk/contributors);
* Aos que [fizeram sugestões importantes](https://github.com/gpupo/mercadolivre-sdk/issues);
* Aos desenvolvedores que criaram as [bibliotecas utilizadas neste componente](https://github.com/gpupo/mercadolivre-sdk/blob/master/Resources/doc/libraries-list.md).

 _- [Gilmar Pupo](https://opensource.gpupo.com/)_


## Instalação

Adicione o pacote ``mercadolivre-sdk`` ao seu projeto utilizando [composer](http://getcomposer.org):

    composer require gpupo/mercadolivre-sdk

## Uso



## Links

* [Mercadolivre-sdk Composer Package](https://packagist.org/packages/gpupo/mercadolivre-sdk) no packagist.org
* [Documentação Oficial](http://developers.mercadolivre.com.br/)
* [Lista de apps em sua conta Mercado Livre](https://developers.mercadolivre.com.br/apps/home/)
* [SDK Oficial](https://github.com/mercadolivre/marketplace-api-sdk-php)
* [Marketplace-bundle Composer Package](https://opensource.gpupo.com/MarkethubBundle/) - Integração deste pacote com Symfony
* [Outras SDKs para o Ecommerce do Brasil](https://opensource.gpupo.com/common-sdk/)
* [Github Repository](https://github.com/gpupo/mercadolivre-sdk/);


## Desenvolvimento

    git clone --depth=1  git@github.com:gpupo/mercadolivre-sdk.git
    cd mercadolivre-sdk;
    ant;

Personalize a configuração do ``phpunit``:

    cp phpunit.xml.dist phpunit.xml;

Personalize os parâmetros!


*Dica*: Verifique os logs gerados em ``var/log/main.log``
