<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/mercadolivre-sdk
 * Created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file
 * LICENSE which is distributed with this source code.
 * Para a informação dos direitos autorais e de licença você deve ler o arquivo
 * LICENSE que é distribuído com este código-fonte.
 * Para obtener la información de los derechos de autor y la licencia debe leer
 * el archivo LICENSE que se distribuye con el código fuente.
 * For more information, see <https://opensource.gpupo.com/>.
 *
 */

namespace  Gpupo\MercadolivreSdk\Tests\Entity\Order\Payments;

use Gpupo\MercadolivreSdk\Entity\Order\Payments\Payment;
use Gpupo\Tests\CommonSdk\Traits\EntityTrait;
use PHPUnit\Framework\TestCase as CoreTestCase;

/**
 * @coversDefaultClass \Gpupo\MercadolivreSdk\Entity\Order\Payments\Payment
 *
 * @method int                                                              getId()                                                                                                           A $id acessor.
 * @method                                                                  setId(integer $id)                                                                                                A $id setter
 * @method int                                                              getOrderId()                                                                                                      A $order_id acessor.
 * @method                                                                  setOrderId(integer $order_id)                                                                                     A $order_id setter
 * @method int                                                              getPayerId()                                                                                                      A $payer_id acessor.
 * @method                                                                  setPayerId(integer $payer_id)                                                                                     A $payer_id setter
 * @method Gpupo\MercadolivreSdk\Entity\Order\Payments\Collector            getCollector()                                                                                                    A $collector acessor.
 * @method                                                                  setCollector(Gpupo\MercadolivreSdk\Entity\Order\Payments\Collector $collector)                                    A $collector setter
 * @method string                                                           getCurrencyId()                                                                                                   A $currency_id acessor.
 * @method                                                                  setCurrencyId(string $currency_id)                                                                                A $currency_id setter
 * @method string                                                           getStatus()                                                                                                       A $status acessor.
 * @method                                                                  setStatus(string $status)                                                                                         A $status setter
 * @method string                                                           getStatusCode()                                                                                                   A $status_code acessor.
 * @method                                                                  setStatusCode(string $status_code)                                                                                A $status_code setter
 * @method string                                                           getStatusDetail()                                                                                                 A $status_detail acessor.
 * @method                                                                  setStatusDetail(string $status_detail)                                                                            A $status_detail setter
 * @method float                                                            getTransactionAmount()                                                                                            A $transaction_amount acessor.
 * @method                                                                  setTransactionAmount(float $transaction_amount)                                                                   A $transaction_amount setter
 * @method float                                                            getShippingCost()                                                                                                 A $shipping_cost acessor.
 * @method                                                                  setShippingCost(float $shipping_cost)                                                                             A $shipping_cost setter
 * @method float                                                            getOverpaidAmount()                                                                                               A $overpaid_amount acessor.
 * @method                                                                  setOverpaidAmount(float $overpaid_amount)                                                                         A $overpaid_amount setter
 * @method float                                                            getTotalPaidAmount()                                                                                              A $total_paid_amount acessor.
 * @method                                                                  setTotalPaidAmount(float $total_paid_amount)                                                                      A $total_paid_amount setter
 * @method float                                                            getMarketplaceFee()                                                                                               A $marketplace_fee acessor.
 * @method                                                                  setMarketplaceFee(float $marketplace_fee)                                                                         A $marketplace_fee setter
 * @method float                                                            getCouponAmount()                                                                                                 A $coupon_amount acessor.
 * @method                                                                  setCouponAmount(float $coupon_amount)                                                                             A $coupon_amount setter
 * @method datetime                                                         getDateCreated()                                                                                                  A $date_created acessor.
 * @method                                                                  setDateCreated(datetime $date_created)                                                                            A $date_created setter
 * @method datetime                                                         getDateLastModified()                                                                                             A $date_last_modified acessor.
 * @method                                                                  setDateLastModified(datetime $date_last_modified)                                                                 A $date_last_modified setter
 * @method string                                                           getCardId()                                                                                                       A $card_id acessor.
 * @method                                                                  setCardId(string $card_id)                                                                                        A $card_id setter
 * @method string                                                           getReason()                                                                                                       A $reason acessor.
 * @method                                                                  setReason(string $reason)                                                                                         A $reason setter
 * @method string                                                           getActivationUri()                                                                                                A $activation_uri acessor.
 * @method                                                                  setActivationUri(string $activation_uri)                                                                          A $activation_uri setter
 * @method string                                                           getPaymentMethodId()                                                                                              A $payment_method_id acessor.
 * @method                                                                  setPaymentMethodId(string $payment_method_id)                                                                     A $payment_method_id setter
 * @method int                                                              getInstallments()                                                                                                 A $installments acessor.
 * @method                                                                  setInstallments(integer $installments)                                                                            A $installments setter
 * @method int                                                              getIssuerId()                                                                                                     A $issuer_id acessor.
 * @method                                                                  setIssuerId(integer $issuer_id)                                                                                   A $issuer_id setter
 * @method Gpupo\MercadolivreSdk\Entity\Order\Payments\AtmTransferReference getAtmTransferReference()                                                                                         A $atm_transfer_reference acessor.
 * @method                                                                  setAtmTransferReference(Gpupo\MercadolivreSdk\Entity\Order\Payments\AtmTransferReference $atm_transfer_reference) A $atm_transfer_reference setter
 * @method string                                                           getCouponId()                                                                                                     A $coupon_id acessor.
 * @method                                                                  setCouponId(string $coupon_id)                                                                                    A $coupon_id setter
 * @method string                                                           getOperationType()                                                                                                A $operation_type acessor.
 * @method                                                                  setOperationType(string $operation_type)                                                                          A $operation_type setter
 * @method string                                                           getPaymentType()                                                                                                  A $payment_type acessor.
 * @method                                                                  setPaymentType(string $payment_type)                                                                              A $payment_type setter
 * @method array                                                            getAvailableActions()                                                                                             A $available_actions acessor.
 * @method                                                                  setAvailableActions(array $available_actions)                                                                     A $available_actions setter
 * @method float                                                            getInstallmentAmount()                                                                                            A $installment_amount acessor.
 * @method                                                                  setInstallmentAmount(float $installment_amount)                                                                   A $installment_amount setter
 * @method string                                                           getDeferredPeriod()                                                                                               A $deferred_period acessor.
 * @method                                                                  setDeferredPeriod(string $deferred_period)                                                                        A $deferred_period setter
 * @method datetime                                                         getDateApproved()                                                                                                 A $date_approved acessor.
 * @method                                                                  setDateApproved(datetime $date_approved)                                                                          A $date_approved setter
 * @method string                                                           getAuthorizationCode()                                                                                            A $authorization_code acessor.
 * @method                                                                  setAuthorizationCode(string $authorization_code)                                                                  A $authorization_code setter
 * @method string                                                           getTransactionOrderId()                                                                                           A $transaction_order_id acessor.
 * @method                                                                  setTransactionOrderId(string $transaction_order_id)                                                               A $transaction_order_id setter
 */
class PaymentTest extends CoreTestCase
{
    use EntityTrait;

    const QUALIFIED = Payment::class;

    public static function setUpBeforeClass()
    {
        static::setFullyQualifiedObject(self::QUALIFIED);
        parent::setUpBeforeClass();
    }

    /**
     * @return Payment
     */
    public function dataProviderPayment()
    {
        $expected = [
            'id' => 'integer',
            'order_id' => 'integer',
            'payer_id' => 'integer',
            'collector' => 'object',
            'currency_id' => 'string',
            'status' => 'string',
            'status_code' => 'string',
            'status_detail' => 'string',
            'transaction_amount' => 'number',
            'shipping_cost' => 'number',
            'overpaid_amount' => 'number',
            'total_paid_amount' => 'number',
            'marketplace_fee' => 'number',
            'coupon_amount' => 'number',
            'date_created' => 'datetime',
            'date_last_modified' => 'datetime',
            'card_id' => 'string',
            'reason' => 'string',
            'activation_uri' => 'string',
            'payment_method_id' => 'string',
            'installments' => 'integer',
            'issuer_id' => 'integer',
            'atm_transfer_reference' => 'object',
            'coupon_id' => 'string',
            'operation_type' => 'string',
            'payment_type' => 'string',
            'available_actions' => 'array',
            'installment_amount' => 'number',
            'deferred_period' => 'string',
            'date_approved' => 'datetime',
            'authorization_code' => 'string',
            'transaction_order_id' => 'string',
        ];

        return $this->dataProviderEntitySchema(self::QUALIFIED, $expected);
    }

    /**
     * @testdox Have a getter ``getId()`` to get ``Id``
     * @dataProvider dataProviderPayment
     * @cover ::getId
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetId(Payment $payment, array $expected)
    {
        $payment->setId($expected['id']);
        $this->assertSame($expected['id'], $payment->getId());
    }

    /**
     * @testdox Have a setter ``setId()`` to set ``Id``
     * @dataProvider dataProviderPayment
     * @cover ::setId
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetId(Payment $payment, array $expected)
    {
        $payment->setId($expected['id']);
        $this->assertSame($expected['id'], $payment->getId());
    }

    /**
     * @testdox Have a getter ``getOrderId()`` to get ``OrderId``
     * @dataProvider dataProviderPayment
     * @cover ::getOrderId
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetOrderId(Payment $payment, array $expected)
    {
        $payment->setOrderId($expected['order_id']);
        $this->assertSame($expected['order_id'], $payment->getOrderId());
    }

    /**
     * @testdox Have a setter ``setOrderId()`` to set ``OrderId``
     * @dataProvider dataProviderPayment
     * @cover ::setOrderId
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetOrderId(Payment $payment, array $expected)
    {
        $payment->setOrderId($expected['order_id']);
        $this->assertSame($expected['order_id'], $payment->getOrderId());
    }

    /**
     * @testdox Have a getter ``getPayerId()`` to get ``PayerId``
     * @dataProvider dataProviderPayment
     * @cover ::getPayerId
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetPayerId(Payment $payment, array $expected)
    {
        $payment->setPayerId($expected['payer_id']);
        $this->assertSame($expected['payer_id'], $payment->getPayerId());
    }

    /**
     * @testdox Have a setter ``setPayerId()`` to set ``PayerId``
     * @dataProvider dataProviderPayment
     * @cover ::setPayerId
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetPayerId(Payment $payment, array $expected)
    {
        $payment->setPayerId($expected['payer_id']);
        $this->assertSame($expected['payer_id'], $payment->getPayerId());
    }

    /**
     * @testdox Have a getter ``getCollector()`` to get ``Collector``
     * @dataProvider dataProviderPayment
     * @cover ::getCollector
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetCollector(Payment $payment, array $expected)
    {
        $payment->setCollector($expected['collector']);
        $this->assertSame($expected['collector'], $payment->getCollector());
    }

    /**
     * @testdox Have a setter ``setCollector()`` to set ``Collector``
     * @dataProvider dataProviderPayment
     * @cover ::setCollector
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetCollector(Payment $payment, array $expected)
    {
        $payment->setCollector($expected['collector']);
        $this->assertSame($expected['collector'], $payment->getCollector());
    }

    /**
     * @testdox Have a getter ``getCurrencyId()`` to get ``CurrencyId``
     * @dataProvider dataProviderPayment
     * @cover ::getCurrencyId
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetCurrencyId(Payment $payment, array $expected)
    {
        $payment->setCurrencyId($expected['currency_id']);
        $this->assertSame($expected['currency_id'], $payment->getCurrencyId());
    }

    /**
     * @testdox Have a setter ``setCurrencyId()`` to set ``CurrencyId``
     * @dataProvider dataProviderPayment
     * @cover ::setCurrencyId
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetCurrencyId(Payment $payment, array $expected)
    {
        $payment->setCurrencyId($expected['currency_id']);
        $this->assertSame($expected['currency_id'], $payment->getCurrencyId());
    }

    /**
     * @testdox Have a getter ``getStatus()`` to get ``Status``
     * @dataProvider dataProviderPayment
     * @cover ::getStatus
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetStatus(Payment $payment, array $expected)
    {
        $payment->setStatus($expected['status']);
        $this->assertSame($expected['status'], $payment->getStatus());
    }

    /**
     * @testdox Have a setter ``setStatus()`` to set ``Status``
     * @dataProvider dataProviderPayment
     * @cover ::setStatus
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetStatus(Payment $payment, array $expected)
    {
        $payment->setStatus($expected['status']);
        $this->assertSame($expected['status'], $payment->getStatus());
    }

    /**
     * @testdox Have a getter ``getStatusCode()`` to get ``StatusCode``
     * @dataProvider dataProviderPayment
     * @cover ::getStatusCode
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetStatusCode(Payment $payment, array $expected)
    {
        $payment->setStatusCode($expected['status_code']);
        $this->assertSame($expected['status_code'], $payment->getStatusCode());
    }

    /**
     * @testdox Have a setter ``setStatusCode()`` to set ``StatusCode``
     * @dataProvider dataProviderPayment
     * @cover ::setStatusCode
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetStatusCode(Payment $payment, array $expected)
    {
        $payment->setStatusCode($expected['status_code']);
        $this->assertSame($expected['status_code'], $payment->getStatusCode());
    }

    /**
     * @testdox Have a getter ``getStatusDetail()`` to get ``StatusDetail``
     * @dataProvider dataProviderPayment
     * @cover ::getStatusDetail
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetStatusDetail(Payment $payment, array $expected)
    {
        $payment->setStatusDetail($expected['status_detail']);
        $this->assertSame($expected['status_detail'], $payment->getStatusDetail());
    }

    /**
     * @testdox Have a setter ``setStatusDetail()`` to set ``StatusDetail``
     * @dataProvider dataProviderPayment
     * @cover ::setStatusDetail
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetStatusDetail(Payment $payment, array $expected)
    {
        $payment->setStatusDetail($expected['status_detail']);
        $this->assertSame($expected['status_detail'], $payment->getStatusDetail());
    }

    /**
     * @testdox Have a getter ``getTransactionAmount()`` to get ``TransactionAmount``
     * @dataProvider dataProviderPayment
     * @cover ::getTransactionAmount
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetTransactionAmount(Payment $payment, array $expected)
    {
        $payment->setTransactionAmount($expected['transaction_amount']);
        $this->assertSame($expected['transaction_amount'], $payment->getTransactionAmount());
    }

    /**
     * @testdox Have a setter ``setTransactionAmount()`` to set ``TransactionAmount``
     * @dataProvider dataProviderPayment
     * @cover ::setTransactionAmount
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetTransactionAmount(Payment $payment, array $expected)
    {
        $payment->setTransactionAmount($expected['transaction_amount']);
        $this->assertSame($expected['transaction_amount'], $payment->getTransactionAmount());
    }

    /**
     * @testdox Have a getter ``getShippingCost()`` to get ``ShippingCost``
     * @dataProvider dataProviderPayment
     * @cover ::getShippingCost
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetShippingCost(Payment $payment, array $expected)
    {
        $payment->setShippingCost($expected['shipping_cost']);
        $this->assertSame($expected['shipping_cost'], $payment->getShippingCost());
    }

    /**
     * @testdox Have a setter ``setShippingCost()`` to set ``ShippingCost``
     * @dataProvider dataProviderPayment
     * @cover ::setShippingCost
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetShippingCost(Payment $payment, array $expected)
    {
        $payment->setShippingCost($expected['shipping_cost']);
        $this->assertSame($expected['shipping_cost'], $payment->getShippingCost());
    }

    /**
     * @testdox Have a getter ``getOverpaidAmount()`` to get ``OverpaidAmount``
     * @dataProvider dataProviderPayment
     * @cover ::getOverpaidAmount
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetOverpaidAmount(Payment $payment, array $expected)
    {
        $payment->setOverpaidAmount($expected['overpaid_amount']);
        $this->assertSame($expected['overpaid_amount'], $payment->getOverpaidAmount());
    }

    /**
     * @testdox Have a setter ``setOverpaidAmount()`` to set ``OverpaidAmount``
     * @dataProvider dataProviderPayment
     * @cover ::setOverpaidAmount
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetOverpaidAmount(Payment $payment, array $expected)
    {
        $payment->setOverpaidAmount($expected['overpaid_amount']);
        $this->assertSame($expected['overpaid_amount'], $payment->getOverpaidAmount());
    }

    /**
     * @testdox Have a getter ``getTotalPaidAmount()`` to get ``TotalPaidAmount``
     * @dataProvider dataProviderPayment
     * @cover ::getTotalPaidAmount
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetTotalPaidAmount(Payment $payment, array $expected)
    {
        $payment->setTotalPaidAmount($expected['total_paid_amount']);
        $this->assertSame($expected['total_paid_amount'], $payment->getTotalPaidAmount());
    }

    /**
     * @testdox Have a setter ``setTotalPaidAmount()`` to set ``TotalPaidAmount``
     * @dataProvider dataProviderPayment
     * @cover ::setTotalPaidAmount
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetTotalPaidAmount(Payment $payment, array $expected)
    {
        $payment->setTotalPaidAmount($expected['total_paid_amount']);
        $this->assertSame($expected['total_paid_amount'], $payment->getTotalPaidAmount());
    }

    /**
     * @testdox Have a getter ``getMarketplaceFee()`` to get ``MarketplaceFee``
     * @dataProvider dataProviderPayment
     * @cover ::getMarketplaceFee
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetMarketplaceFee(Payment $payment, array $expected)
    {
        $payment->setMarketplaceFee($expected['marketplace_fee']);
        $this->assertSame($expected['marketplace_fee'], $payment->getMarketplaceFee());
    }

    /**
     * @testdox Have a setter ``setMarketplaceFee()`` to set ``MarketplaceFee``
     * @dataProvider dataProviderPayment
     * @cover ::setMarketplaceFee
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetMarketplaceFee(Payment $payment, array $expected)
    {
        $payment->setMarketplaceFee($expected['marketplace_fee']);
        $this->assertSame($expected['marketplace_fee'], $payment->getMarketplaceFee());
    }

    /**
     * @testdox Have a getter ``getCouponAmount()`` to get ``CouponAmount``
     * @dataProvider dataProviderPayment
     * @cover ::getCouponAmount
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetCouponAmount(Payment $payment, array $expected)
    {
        $payment->setCouponAmount($expected['coupon_amount']);
        $this->assertSame($expected['coupon_amount'], $payment->getCouponAmount());
    }

    /**
     * @testdox Have a setter ``setCouponAmount()`` to set ``CouponAmount``
     * @dataProvider dataProviderPayment
     * @cover ::setCouponAmount
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetCouponAmount(Payment $payment, array $expected)
    {
        $payment->setCouponAmount($expected['coupon_amount']);
        $this->assertSame($expected['coupon_amount'], $payment->getCouponAmount());
    }

    /**
     * @testdox Have a getter ``getDateCreated()`` to get ``DateCreated``
     * @dataProvider dataProviderPayment
     * @cover ::getDateCreated
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetDateCreated(Payment $payment, array $expected)
    {
        $payment->setDateCreated($expected['date_created']);
        $this->assertSame($expected['date_created'], $payment->getDateCreated());
    }

    /**
     * @testdox Have a setter ``setDateCreated()`` to set ``DateCreated``
     * @dataProvider dataProviderPayment
     * @cover ::setDateCreated
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetDateCreated(Payment $payment, array $expected)
    {
        $payment->setDateCreated($expected['date_created']);
        $this->assertSame($expected['date_created'], $payment->getDateCreated());
    }

    /**
     * @testdox Have a getter ``getDateLastModified()`` to get ``DateLastModified``
     * @dataProvider dataProviderPayment
     * @cover ::getDateLastModified
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetDateLastModified(Payment $payment, array $expected)
    {
        $payment->setDateLastModified($expected['date_last_modified']);
        $this->assertSame($expected['date_last_modified'], $payment->getDateLastModified());
    }

    /**
     * @testdox Have a setter ``setDateLastModified()`` to set ``DateLastModified``
     * @dataProvider dataProviderPayment
     * @cover ::setDateLastModified
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetDateLastModified(Payment $payment, array $expected)
    {
        $payment->setDateLastModified($expected['date_last_modified']);
        $this->assertSame($expected['date_last_modified'], $payment->getDateLastModified());
    }

    /**
     * @testdox Have a getter ``getCardId()`` to get ``CardId``
     * @dataProvider dataProviderPayment
     * @cover ::getCardId
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetCardId(Payment $payment, array $expected)
    {
        $payment->setCardId($expected['card_id']);
        $this->assertSame($expected['card_id'], $payment->getCardId());
    }

    /**
     * @testdox Have a setter ``setCardId()`` to set ``CardId``
     * @dataProvider dataProviderPayment
     * @cover ::setCardId
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetCardId(Payment $payment, array $expected)
    {
        $payment->setCardId($expected['card_id']);
        $this->assertSame($expected['card_id'], $payment->getCardId());
    }

    /**
     * @testdox Have a getter ``getReason()`` to get ``Reason``
     * @dataProvider dataProviderPayment
     * @cover ::getReason
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetReason(Payment $payment, array $expected)
    {
        $payment->setReason($expected['reason']);
        $this->assertSame($expected['reason'], $payment->getReason());
    }

    /**
     * @testdox Have a setter ``setReason()`` to set ``Reason``
     * @dataProvider dataProviderPayment
     * @cover ::setReason
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetReason(Payment $payment, array $expected)
    {
        $payment->setReason($expected['reason']);
        $this->assertSame($expected['reason'], $payment->getReason());
    }

    /**
     * @testdox Have a getter ``getActivationUri()`` to get ``ActivationUri``
     * @dataProvider dataProviderPayment
     * @cover ::getActivationUri
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetActivationUri(Payment $payment, array $expected)
    {
        $payment->setActivationUri($expected['activation_uri']);
        $this->assertSame($expected['activation_uri'], $payment->getActivationUri());
    }

    /**
     * @testdox Have a setter ``setActivationUri()`` to set ``ActivationUri``
     * @dataProvider dataProviderPayment
     * @cover ::setActivationUri
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetActivationUri(Payment $payment, array $expected)
    {
        $payment->setActivationUri($expected['activation_uri']);
        $this->assertSame($expected['activation_uri'], $payment->getActivationUri());
    }

    /**
     * @testdox Have a getter ``getPaymentMethodId()`` to get ``PaymentMethodId``
     * @dataProvider dataProviderPayment
     * @cover ::getPaymentMethodId
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetPaymentMethodId(Payment $payment, array $expected)
    {
        $payment->setPaymentMethodId($expected['payment_method_id']);
        $this->assertSame($expected['payment_method_id'], $payment->getPaymentMethodId());
    }

    /**
     * @testdox Have a setter ``setPaymentMethodId()`` to set ``PaymentMethodId``
     * @dataProvider dataProviderPayment
     * @cover ::setPaymentMethodId
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetPaymentMethodId(Payment $payment, array $expected)
    {
        $payment->setPaymentMethodId($expected['payment_method_id']);
        $this->assertSame($expected['payment_method_id'], $payment->getPaymentMethodId());
    }

    /**
     * @testdox Have a getter ``getInstallments()`` to get ``Installments``
     * @dataProvider dataProviderPayment
     * @cover ::getInstallments
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetInstallments(Payment $payment, array $expected)
    {
        $payment->setInstallments($expected['installments']);
        $this->assertSame($expected['installments'], $payment->getInstallments());
    }

    /**
     * @testdox Have a setter ``setInstallments()`` to set ``Installments``
     * @dataProvider dataProviderPayment
     * @cover ::setInstallments
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetInstallments(Payment $payment, array $expected)
    {
        $payment->setInstallments($expected['installments']);
        $this->assertSame($expected['installments'], $payment->getInstallments());
    }

    /**
     * @testdox Have a getter ``getIssuerId()`` to get ``IssuerId``
     * @dataProvider dataProviderPayment
     * @cover ::getIssuerId
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetIssuerId(Payment $payment, array $expected)
    {
        $payment->setIssuerId($expected['issuer_id']);
        $this->assertSame($expected['issuer_id'], $payment->getIssuerId());
    }

    /**
     * @testdox Have a setter ``setIssuerId()`` to set ``IssuerId``
     * @dataProvider dataProviderPayment
     * @cover ::setIssuerId
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetIssuerId(Payment $payment, array $expected)
    {
        $payment->setIssuerId($expected['issuer_id']);
        $this->assertSame($expected['issuer_id'], $payment->getIssuerId());
    }

    /**
     * @testdox Have a getter ``getAtmTransferReference()`` to get ``AtmTransferReference``
     * @dataProvider dataProviderPayment
     * @cover ::getAtmTransferReference
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetAtmTransferReference(Payment $payment, array $expected)
    {
        $payment->setAtmTransferReference($expected['atm_transfer_reference']);
        $this->assertSame($expected['atm_transfer_reference'], $payment->getAtmTransferReference());
    }

    /**
     * @testdox Have a setter ``setAtmTransferReference()`` to set ``AtmTransferReference``
     * @dataProvider dataProviderPayment
     * @cover ::setAtmTransferReference
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetAtmTransferReference(Payment $payment, array $expected)
    {
        $payment->setAtmTransferReference($expected['atm_transfer_reference']);
        $this->assertSame($expected['atm_transfer_reference'], $payment->getAtmTransferReference());
    }

    /**
     * @testdox Have a getter ``getCouponId()`` to get ``CouponId``
     * @dataProvider dataProviderPayment
     * @cover ::getCouponId
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetCouponId(Payment $payment, array $expected)
    {
        $payment->setCouponId($expected['coupon_id']);
        $this->assertSame($expected['coupon_id'], $payment->getCouponId());
    }

    /**
     * @testdox Have a setter ``setCouponId()`` to set ``CouponId``
     * @dataProvider dataProviderPayment
     * @cover ::setCouponId
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetCouponId(Payment $payment, array $expected)
    {
        $payment->setCouponId($expected['coupon_id']);
        $this->assertSame($expected['coupon_id'], $payment->getCouponId());
    }

    /**
     * @testdox Have a getter ``getOperationType()`` to get ``OperationType``
     * @dataProvider dataProviderPayment
     * @cover ::getOperationType
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetOperationType(Payment $payment, array $expected)
    {
        $payment->setOperationType($expected['operation_type']);
        $this->assertSame($expected['operation_type'], $payment->getOperationType());
    }

    /**
     * @testdox Have a setter ``setOperationType()`` to set ``OperationType``
     * @dataProvider dataProviderPayment
     * @cover ::setOperationType
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetOperationType(Payment $payment, array $expected)
    {
        $payment->setOperationType($expected['operation_type']);
        $this->assertSame($expected['operation_type'], $payment->getOperationType());
    }

    /**
     * @testdox Have a getter ``getPaymentType()`` to get ``PaymentType``
     * @dataProvider dataProviderPayment
     * @cover ::getPaymentType
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetPaymentType(Payment $payment, array $expected)
    {
        $payment->setPaymentType($expected['payment_type']);
        $this->assertSame($expected['payment_type'], $payment->getPaymentType());
    }

    /**
     * @testdox Have a setter ``setPaymentType()`` to set ``PaymentType``
     * @dataProvider dataProviderPayment
     * @cover ::setPaymentType
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetPaymentType(Payment $payment, array $expected)
    {
        $payment->setPaymentType($expected['payment_type']);
        $this->assertSame($expected['payment_type'], $payment->getPaymentType());
    }

    /**
     * @testdox Have a getter ``getAvailableActions()`` to get ``AvailableActions``
     * @dataProvider dataProviderPayment
     * @cover ::getAvailableActions
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetAvailableActions(Payment $payment, array $expected)
    {
        $payment->setAvailableActions($expected['available_actions']);
        $this->assertSame($expected['available_actions'], $payment->getAvailableActions());
    }

    /**
     * @testdox Have a setter ``setAvailableActions()`` to set ``AvailableActions``
     * @dataProvider dataProviderPayment
     * @cover ::setAvailableActions
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetAvailableActions(Payment $payment, array $expected)
    {
        $payment->setAvailableActions($expected['available_actions']);
        $this->assertSame($expected['available_actions'], $payment->getAvailableActions());
    }

    /**
     * @testdox Have a getter ``getInstallmentAmount()`` to get ``InstallmentAmount``
     * @dataProvider dataProviderPayment
     * @cover ::getInstallmentAmount
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetInstallmentAmount(Payment $payment, array $expected)
    {
        $payment->setInstallmentAmount($expected['installment_amount']);
        $this->assertSame($expected['installment_amount'], $payment->getInstallmentAmount());
    }

    /**
     * @testdox Have a setter ``setInstallmentAmount()`` to set ``InstallmentAmount``
     * @dataProvider dataProviderPayment
     * @cover ::setInstallmentAmount
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetInstallmentAmount(Payment $payment, array $expected)
    {
        $payment->setInstallmentAmount($expected['installment_amount']);
        $this->assertSame($expected['installment_amount'], $payment->getInstallmentAmount());
    }

    /**
     * @testdox Have a getter ``getDeferredPeriod()`` to get ``DeferredPeriod``
     * @dataProvider dataProviderPayment
     * @cover ::getDeferredPeriod
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetDeferredPeriod(Payment $payment, array $expected)
    {
        $payment->setDeferredPeriod($expected['deferred_period']);
        $this->assertSame($expected['deferred_period'], $payment->getDeferredPeriod());
    }

    /**
     * @testdox Have a setter ``setDeferredPeriod()`` to set ``DeferredPeriod``
     * @dataProvider dataProviderPayment
     * @cover ::setDeferredPeriod
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetDeferredPeriod(Payment $payment, array $expected)
    {
        $payment->setDeferredPeriod($expected['deferred_period']);
        $this->assertSame($expected['deferred_period'], $payment->getDeferredPeriod());
    }

    /**
     * @testdox Have a getter ``getDateApproved()`` to get ``DateApproved``
     * @dataProvider dataProviderPayment
     * @cover ::getDateApproved
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetDateApproved(Payment $payment, array $expected)
    {
        $payment->setDateApproved($expected['date_approved']);
        $this->assertSame($expected['date_approved'], $payment->getDateApproved());
    }

    /**
     * @testdox Have a setter ``setDateApproved()`` to set ``DateApproved``
     * @dataProvider dataProviderPayment
     * @cover ::setDateApproved
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetDateApproved(Payment $payment, array $expected)
    {
        $payment->setDateApproved($expected['date_approved']);
        $this->assertSame($expected['date_approved'], $payment->getDateApproved());
    }

    /**
     * @testdox Have a getter ``getAuthorizationCode()`` to get ``AuthorizationCode``
     * @dataProvider dataProviderPayment
     * @cover ::getAuthorizationCode
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetAuthorizationCode(Payment $payment, array $expected)
    {
        $payment->setAuthorizationCode($expected['authorization_code']);
        $this->assertSame($expected['authorization_code'], $payment->getAuthorizationCode());
    }

    /**
     * @testdox Have a setter ``setAuthorizationCode()`` to set ``AuthorizationCode``
     * @dataProvider dataProviderPayment
     * @cover ::setAuthorizationCode
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetAuthorizationCode(Payment $payment, array $expected)
    {
        $payment->setAuthorizationCode($expected['authorization_code']);
        $this->assertSame($expected['authorization_code'], $payment->getAuthorizationCode());
    }

    /**
     * @testdox Have a getter ``getTransactionOrderId()`` to get ``TransactionOrderId``
     * @dataProvider dataProviderPayment
     * @cover ::getTransactionOrderId
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testGetTransactionOrderId(Payment $payment, array $expected)
    {
        $payment->setTransactionOrderId($expected['transaction_order_id']);
        $this->assertSame($expected['transaction_order_id'], $payment->getTransactionOrderId());
    }

    /**
     * @testdox Have a setter ``setTransactionOrderId()`` to set ``TransactionOrderId``
     * @dataProvider dataProviderPayment
     * @cover ::setTransactionOrderId
     * @small
     *
     * @param Payment $payment  Main Object
     * @param array   $expected Fixture data
     */
    public function testSetTransactionOrderId(Payment $payment, array $expected)
    {
        $payment->setTransactionOrderId($expected['transaction_order_id']);
        $this->assertSame($expected['transaction_order_id'], $payment->getTransactionOrderId());
    }
}
