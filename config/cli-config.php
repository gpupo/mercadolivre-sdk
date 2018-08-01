<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Gpupo\MercadolivreSdk\Tests\Bootstrap;

require 'vendor/autoload.php';

$entityManager = Bootstrap::factoryDoctrineEntityManager();

return ConsoleRunner::createHelperSet($entityManager);
