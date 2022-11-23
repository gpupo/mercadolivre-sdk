<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/mercadolivre-sdk created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file LICENSE which is
 * distributed with this source code. For more information, see <https://opensource.gpupo.com/>
 */

namespace Gpupo\MercadolivreSdk\Entity\Product\Exceptions;

class AdInvalidFieldUpdateException extends \RuntimeException 
{
    /**
     * @var string
     */
    private $fieldName;

    public function __construct(string $fieldName, int $code = 400, \Throwable $previous = null)
    {
        $this->fieldName = $fieldName;

        $message = sprintf('Ad "%s" field could not be updated', $fieldName);
        parent::__construct($message, $code, $previous);
    }

    public function getInvalidField(): string
    {
        return $this->fieldName;
    }
}