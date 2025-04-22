<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */

namespace NINACORE\NINAGateway\OnePay\Message\Concerns;
use Omnipay\Common\Exception\InvalidResponseException;
use NINACORE\NINAGateway\OnePay\Support\Signature;

trait ResponseSignatureValidation
{
    protected function validateSignature(): void
    {
        $data = $this->getData();

        if (! isset($data['vpc_SecureHash'])) {
            throw new InvalidResponseException('Response from OnePay is invalid!');
        }
        $dataSignature = array_filter($data, function ($parameter) {
            return 0 === strpos($parameter, 'vpc_') && 'vpc_SecureHash' !== $parameter;
        }, ARRAY_FILTER_USE_KEY);
        $signature = new Signature(
            $this->getRequest()->getVpcHashKey()
        );

        if (! $signature->validate($dataSignature, $data['vpc_SecureHash'])) {
            throw new InvalidResponseException(sprintf('Data signature response from OnePay is invalid!'));
        }
    }
}
