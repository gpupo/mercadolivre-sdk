<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/mercadolivre-sdk created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

use Symfony\Component\Dotenv\Dotenv;

if (!class_exists('\Gpupo\Common\Console\Application')) {
    require __DIR__.'/../vendor/autoload.php';
}

if (!class_exists(Dotenv::class)) {
    throw new RuntimeException('Please run "composer require symfony/dotenv" to load the ".env" files configuring the application.');
}
    // load all the .env files
    (new Dotenv(true))->loadEnv(dirname(__DIR__).'/.env');
