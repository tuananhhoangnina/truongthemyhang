<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */

namespace NINACORE\NINAGateway\Payoo;
use NINACORE\NINAGateway\Payoo\Message\CompletePurchaseRequest;
use NINACORE\NINAGateway\Payoo\Message\PurchaseRequest;
use Omnipay\Common\AbstractGateway;

class Gateway extends AbstractGateway
{
    use Concerns\ParametersNormalize;
    public function getName()
    {
        return 'Payoo';
    }
    public function initialize(array $parameters = []): Gateway
    {
        return parent::initialize(
            $this->normalizeParameters($parameters)
        );
    }
    public function getDefaultParameters()
    {
        return [
           config('gateways.gateways.Payoo.options')
        ];
    }

    public function getShopDomain()
    {
        return $this->getParameter('shopDomain');
    }

    public function setShopDomain($shopDomain)
    {
        return $this->setParameter('shopDomain', $shopDomain);
    }

    public function getShopTitle()
    {
        return $this->getParameter('shopTitle');
    }

    public function setShopTitle($shopTitle)
    {
        return $this->setParameter('shopTitle', $shopTitle);
    }

    public function getShopId()
    {
        return $this->getParameter('shopId');
    }

    public function setShopId($shopId)
    {
        return $this->setParameter('shopId', $shopId);
    }

    public function getApiUsername()
    {
        return $this->getParameter('apiUsername');
    }

    public function setApiUsername($apiUsername)
    {
        return $this->setParameter('apiUsername', $apiUsername);
    }

    public function getSecretKey()
    {
        return $this->getParameter('secretKey');
    }

    public function setSecretKey($secretKey)
    {
        return $this->setParameter('secretKey', $secretKey);
    }

    public function purchase(array $options = [])
    {
        return $this->createRequest(PurchaseRequest::class, $options);
    }
    public function completePurchase(array $options = [])
    {
        return $this->createRequest(CompletePurchaseRequest::class, $options);
    }

}