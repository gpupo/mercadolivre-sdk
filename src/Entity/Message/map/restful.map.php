<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/mercadolivre-sdk created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

return [
    'findByOrderId' => [
        'GET',
        '/messages/orders/{itemId}?&offset={offset}&limit={limit}',
    ],
    'create' => [
        'POST',
        '/messages/?',
    ],
];
