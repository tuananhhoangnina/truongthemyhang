<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */


namespace NINACORE\NINAGateway\Omnipay;

use Omnipay\Common\Exception\RuntimeException;
use Omnipay\Common\Http\ClientInterface;
use Symfony\Component\HttpFoundation\Request as HttpRequest;

class GatewayFactory extends \Omnipay\Common\GatewayFactory
{
    public function create($class, ClientInterface $httpClient = null, HttpRequest $httpRequest = null)
    {
        $class = \NINACORE\NINAGateway\Omnipay\Helper::getGatewayClassName($class);
        if (!class_exists($class)) {
            throw new RuntimeException("Class '$class' not found");
        }
        return new $class($httpClient, $httpRequest);
    }
}