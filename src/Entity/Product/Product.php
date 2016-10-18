<?php

namespace Gpupo\MercadolivreSdk\Entity\Product;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

/**
 * Product Entity.
 *
 * @method string getProductId()    Acesso a productId
 * @method setProductId(string $productId)    Define productId
 * @method Gpupo\MercadolivreSdk\Entity\Product\Skus getSkus()    Acesso a skus
 * @method setSkus(Gpupo\MercadolivreSdk\Entity\Product\Skus $skus)    Define skus
 * @method string getDepartment()    Acesso a department
 * @method setDepartment(string $department)    Define department
 * @method string getProductType()    Acesso a productType
 * @method setProductType(string $productType)    Define productType
 * @method string getBrand()    Acesso a brand
 * @method setBrand(string $brand)    Define brand
 * @method Gpupo\MercadolivreSdk\Entity\Product\Attributes\Attributes getAttributes()    Acesso a attributes
 * @method setAttributes(Gpupo\MercadolivreSdk\Entity\Product\Attributes\Attributes $attributes)    Define attributes
 */
final class Product extends EntityAbstract implements EntityInterface
{
    /**
     * @codeCoverageIgnore
     */
    public function getSchema()
    {
        return [
            'title'           => 'string',
            'category_id'     => 'string',
            'price'           => 'number',
            'currency_id'     => 'string',
            'buying_mode'     => 'string',
            'listing_type_id' => 'string',
            'condition'       => 'string',
            'description'     => 'string',
            'variations'      => 'object',
        ];
    }
}
