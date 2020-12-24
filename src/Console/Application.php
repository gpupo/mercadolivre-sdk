<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/mercadolivre-sdk created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace Gpupo\MercadolivreSdk\Console;

use Gpupo\CommonSdk\Console\AbstractApplication;
use Gpupo\CommonSdk\FactoryInterface;
use Gpupo\MercadolivreSdk\Factory;
use Psr\Log\LoggerInterface;
use Symfony\Contracts\Cache\CacheInterface;

final class Application extends AbstractApplication
{
    protected $commonParameters = [
        [
            'key' => 'client_id',
        ],
        [
            'key' => 'secret_key',
        ],
        [
            'key' => 'access_token',
        ],
        [
            'key' => 'env',
            'options' => ['sandbox', 'api'],
            'default' => 'sandbox',
            'name' => 'Version',
        ],
        [
            'key' => 'sslVersion',
            'options' => ['SecureTransport', 'TLS'],
            'default' => 'SecureTransport',
            'name' => 'SSL Version',
        ],
        [
            'key' => 'registerPath',
            'default' => false,
        ],
        [
            'key' => 'app_url',
        ],
    ];

    public function factorySdk(array $options, LoggerInterface $logger = null, CacheInterface $cache = null): FactoryInterface
    {
        return new Factory($options, $logger, $cache);
    }
}
