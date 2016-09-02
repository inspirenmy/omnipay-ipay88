<?php

namespace Omnipay\IPay88\Message;


use Omnipay\Tests\TestCase;

class PurchaseResponseTest extends TestCase
{
    public function testConstruct()
    {
        $response = new PurchaseResponse($this->getMockRequest(), [
            'MerchantCode' => '12345',
            'PaymentId' => '',
            'RefNo' => 'A00000001',
            'Amount' => number_format('1230.50'),
            'Currency' => 'MYR',
            'ProdDesc' => 'Marina Run 2016',
            'UserName' => 'Xu',
            'UserEmail' => 'xuding@spacebib.com',
            'UserContact' => '93804194',
            'Remark' => '',
            'Lang' => '',
            'Signature' => '84dNMbfgjLMS42IqSTPqQ99cUGA=',
            'ResponseURL' => 'https://www.example.com/return',
            'BackendURL' => 'https://www.example.com/backend',
        ]);

        $this->assertFalse($response->isSuccessful());
        $this->assertTrue($response->isTransparentRedirect());
        $this->assertNull($response->getTransactionReference());
        $this->assertTrue($response->isRedirect());
        $this->assertNull($response->getMessage());
        $this->assertSame('A00000001', $response->getTransactionId());
        $this->assertSame('https://www.mobile88.com/ePayment/entry.asp', $response->getRedirectUrl());
        $this->assertSame('POST', $response->getRedirectMethod());
        $this->assertNotEmpty($response->getRedirectResponse());
        $this->assertInstanceOf(\HttpResponse::class, $response->getRedirectResponse());
    }
}
