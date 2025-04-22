<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */


namespace NINACORE\NINAGateway\Momo\Message;

class PayRefundRequest extends AbstractHashRequest
{
    public function initialize(array $parameters = [])
    {
        parent::initialize($parameters);
        $this->setParameter('version', 2);

        return $this;
    }
    public function sendData($data)
    {
        $response = $this->httpClient->request('POST', $this->getEndpoint().'/pay/refund', [
            'Content-Type' => 'application/json; charset=utf-8',
        ], json_encode($data));
        $responseData = $response->getBody()->getContents();

        return $this->response = new PayRefundResponse($this, json_decode($responseData, true) ?? []);
    }
    public function getRequestId(): ?string
    {
        return $this->getParameter('requestId');
    }
    public function setRequestId(?string $id)
    {
        return $this->setParameter('requestId', $id);
    }
    public function getPartnerRefId(): ?string
    {
        return $this->getParameter('partnerRefId');
    }
    public function setPartnerRefId(?string $id)
    {
        return $this->setParameter('partnerRefId', $id);
    }
    public function getMomoTransId(): ?string
    {
        return $this->getParameter('momoTransId');
    }
    public function setMomoTransId(?string $id)
    {
        return $this->setParameter('momoTransId', $id);
    }
    public function getStoreId(): ?string
    {
        return $this->getParameter('storeId');
    }
    public function setStoreId(?string $id)
    {
        return $this->setParameter('storeId', $id);
    }
    protected function getHashParameters(): array
    {
        $parameters = [
            'partnerCode', 'partnerRefId', 'momoTransId', 'amount',
        ];

        if ($this->getParameter('storeId')) {
            $parameters[] = 'storeId';
        }

        if ($this->getParameter('description')) {
            $parameters[] = 'description';
        }

        return $parameters;
    }
}