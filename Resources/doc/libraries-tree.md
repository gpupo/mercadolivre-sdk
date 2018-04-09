## Árvore de dependências (libraries)
```
gpupo/common-schema v1.1.9 Common schema
`--gpupo/common ^1.7
   `--php ^5.6 || ^7.0
gpupo/common-sdk 3.0.1 Componente de uso comum entre SDKs para integração a partir de aplicações PHP com Restful webservices
|--codeclimate/php-test-reporter @dev
|  |--ext-curl *
|  |--php >=5.3
|  |--satooshi/php-coveralls 1.0.*
|  |  |--ext-json *
|  |  |--ext-simplexml *
|  |  |--guzzle/guzzle ^2.8 || ^3.0
|  |  |  |--ext-curl *
|  |  |  |--php >=5.3.3
|  |  |  `--symfony/event-dispatcher ~2.1
|  |  |     `--php >=5.3.9
|  |  |--php ^5.3.3 || ^7.0
|  |  |--psr/log ^1.0
|  |  |  `--php >=5.3.0
|  |  |--symfony/config ^2.1 || ^3.0 || ^4.0
|  |  |  |--php ^7.1.3
|  |  |  `--symfony/filesystem ~3.4|~4.0
|  |  |     `--php ^7.1.3
|  |  |--symfony/console ^2.1 || ^3.0 || ^4.0
|  |  |  |--php ^7.1.3
|  |  |  `--symfony/polyfill-mbstring ~1.0
|  |  |     `--php >=5.3.3
|  |  |--symfony/stopwatch ^2.0 || ^3.0 || ^4.0
|  |  |  `--php ^7.1.3
|  |  `--symfony/yaml ^2.0 || ^3.0 || ^4.0
|  |     `--php ^7.1.3
|  `--symfony/console >=2.0
|     |--php ^7.1.3
|     `--symfony/polyfill-mbstring ~1.0
|        `--php >=5.3.3
|--gpupo/cache *
|  |--fig/cache-util dev-master as 1.0.x-dev
|  |  |--php >=5.4.0
|  |  `--psr/cache ^1.0.0
|  |     `--php >=5.3.0
|  |--gpupo/common *
|  |  `--php ^5.6 || ^7.0
|  |--php ^5.6 || ^7.0
|  `--psr/cache ^1.0
|     `--php >=5.3.0
|--gpupo/common ^1.7.0
|  `--php ^5.6 || ^7.0
|--monolog/monolog *
|  |--php >=5.3.0
|  `--psr/log ~1.0
|     `--php >=5.3.0
|--php ^7.1.3
|--psr/log ^1.0
|  `--php >=5.3.0
|--sebastian/peek-and-poke 1.0.x@dev
|  `--php >=5.6.0
|--symfony/console ^4.0
|  |--php ^7.1.3
|  `--symfony/polyfill-mbstring ~1.0
|     `--php >=5.3.3
`--twig/twig *
   |--php ^7.0
   `--symfony/polyfill-mbstring ~1.0
      `--php >=5.3.3
phpunit/phpunit 7.1.1 The PHP Unit Testing framework.
|--ext-dom *
|--ext-json *
|--ext-libxml *
|--ext-mbstring *
|--ext-xml *
|--myclabs/deep-copy ^1.6.1
|  `--php ^5.6 || ^7.0
|--phar-io/manifest ^1.0.1
|  |--ext-dom *
|  |--ext-phar *
|  |--phar-io/version ^1.0.1
|  |  `--php ^5.6 || ^7.0
|  `--php ^5.6 || ^7.0
|--phar-io/version ^1.0
|  `--php ^5.6 || ^7.0
|--php ^7.1
|--phpspec/prophecy ^1.7
|  |--doctrine/instantiator ^1.0.2
|  |  `--php ^7.1
|  |--php ^5.3|^7.0
|  |--phpdocumentor/reflection-docblock ^2.0|^3.0.2|^4.0
|  |  |--php ^7.0
|  |  |--phpdocumentor/reflection-common ^1.0.0
|  |  |  `--php >=5.5
|  |  |--phpdocumentor/type-resolver ^0.4.0
|  |  |  |--php ^5.5 || ^7.0
|  |  |  `--phpdocumentor/reflection-common ^1.0
|  |  |     `--php >=5.5
|  |  `--webmozart/assert ^1.0
|  |     `--php ^5.3.3 || ^7.0
|  |--sebastian/comparator ^1.1|^2.0
|  |  |--php ^7.0
|  |  |--sebastian/diff ^2.0 || ^3.0
|  |  |  `--php ^7.1
|  |  `--sebastian/exporter ^3.1
|  |     |--php ^7.0
|  |     `--sebastian/recursion-context ^3.0
|  |        `--php ^7.0
|  `--sebastian/recursion-context ^1.0|^2.0|^3.0
|     `--php ^7.0
|--phpunit/php-code-coverage ^6.0.1
|  |--ext-dom *
|  |--ext-xmlwriter *
|  |--php ^7.1
|  |--phpunit/php-file-iterator ^1.4.2
|  |  `--php >=5.3.3
|  |--phpunit/php-text-template ^1.2.1
|  |  `--php >=5.3.3
|  |--phpunit/php-token-stream ^3.0
|  |  |--ext-tokenizer *
|  |  `--php ^7.1
|  |--sebastian/code-unit-reverse-lookup ^1.0.1
|  |  `--php ^5.6 || ^7.0
|  |--sebastian/environment ^3.1
|  |  `--php ^7.0
|  |--sebastian/version ^2.0.1
|  |  `--php >=5.6
|  `--theseer/tokenizer ^1.1
|     |--ext-dom *
|     |--ext-tokenizer *
|     |--ext-xmlwriter *
|     `--php ^7.0
|--phpunit/php-file-iterator ^1.4.3
|  `--php >=5.3.3
|--phpunit/php-text-template ^1.2.1
|  `--php >=5.3.3
|--phpunit/php-timer ^2.0
|  `--php ^7.1
|--phpunit/phpunit-mock-objects ^6.1
|  |--doctrine/instantiator ^1.0.5
|  |  `--php ^7.1
|  |--php ^7.1
|  |--phpunit/php-text-template ^1.2.1
|  |  `--php >=5.3.3
|  `--sebastian/exporter ^3.1
|     |--php ^7.0
|     `--sebastian/recursion-context ^3.0
|        `--php ^7.0
|--sebastian/comparator ^2.1
|  |--php ^7.0
|  |--sebastian/diff ^2.0 || ^3.0
|  |  `--php ^7.1
|  `--sebastian/exporter ^3.1
|     |--php ^7.0
|     `--sebastian/recursion-context ^3.0
|        `--php ^7.0
|--sebastian/diff ^3.0
|  `--php ^7.1
|--sebastian/environment ^3.1
|  `--php ^7.0
|--sebastian/exporter ^3.1
|  |--php ^7.0
|  `--sebastian/recursion-context ^3.0
|     `--php ^7.0
|--sebastian/global-state ^2.0
|  `--php ^7.0
|--sebastian/object-enumerator ^3.0.3
|  |--php ^7.0
|  |--sebastian/object-reflector ^1.1.1
|  |  `--php ^7.0
|  `--sebastian/recursion-context ^3.0
|     `--php ^7.0
|--sebastian/resource-operations ^1.0
|  `--php >=5.6.0
`--sebastian/version ^2.0.1
   `--php >=5.6
symfony/var-dumper v4.0.8 Symfony mechanism for exploring and dumping PHP variables
|--php ^7.1.3
|--symfony/polyfill-mbstring ~1.0
|  `--php >=5.3.3
`--symfony/polyfill-php72 ~1.5
   `--php >=5.3.3

```
---
