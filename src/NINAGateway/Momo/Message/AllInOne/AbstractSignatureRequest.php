<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */


namespace NINACORE\NINAGateway\Momo\Message\AllInOne;
use NINACORE\NINAGateway\MoMo\Message\AbstractSignatureRequest as BaseAbstractSignatureRequest;

abstract class AbstractSignatureRequest extends BaseAbstractSignatureRequest
{
    protected $responseClass;
    public function getOrderId(): ?string
    {
        return $this->getParameter('orderId');
    }
    public function setOrderId(?string $id)
    {
        return $this->setParameter('orderId', $id);
    }
    public function getRequestId(): ?string
    {
        return $this->getParameter('requestId');
    }
    public function setRequestId(?string $id)
    {
        return $this->setParameter('requestId', $id);
    }
    public function sendData($data)
    {
        $response = $this->httpClient->request('POST', $this->getEndpoint().'/gw_payment/transactionProcessor', [
            'Content-Type' => 'application/json; charset=UTF-8',
        ], json_encode($data));
        $responseClass = $this->responseClass;
        $responseData = $response->getBody()->getContents();

        return $this->response = new $responseClass($this, json_decode($responseData, true) ?? []);
    }
}