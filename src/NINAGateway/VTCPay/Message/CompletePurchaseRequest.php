<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */

namespace NINACORE\NINAGateway\VTCPay\Message;
class CompletePurchaseRequest extends AbstractIncomingRequest
{
    /**
     * {@inheritdoc}
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    public function getData(): array
    {
        $this->validate('amount', 'reference_number', 'status', 'website_id');

        return parent::getData();
    }

    /**
     * {@inheritdoc}
     */
    protected function getIncomingParameters(): array
    {
        return $this->httpRequest->query->all();
    }

    protected function getSignatureParameters(): array
    {
        // TODO: Implement getSignatureParameters() method.
    }
}
