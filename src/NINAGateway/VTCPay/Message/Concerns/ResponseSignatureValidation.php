<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */

namespace NINACORE\NINAGateway\VTCPay\Message\Concerns;

use NINACORE\NINAGateway\VTCPay\Support\Signature;
use Omnipay\Common\Exception\InvalidResponseException;
trait ResponseSignatureValidation
{
    /**
     * Kiểm tra tính hợp lệ của dữ liệu do VTCPay phản hồi.
     *
     * @throws InvalidResponseException
     */
    protected function validateSignature(): void
    {
        $data = $dataSignature = $this->getData();

        if (! isset($data['signature'])) {
            throw new InvalidResponseException(sprintf('Response from VTCPay is invalid!'));
        }

        $signature = new Signature(
            $this->getRequest()->getSecurityCode()
        );

        unset($dataSignature['signature']);

        if (! $signature->validate($dataSignature, $data['signature'])) {
            throw new InvalidResponseException(sprintf('Data signature response from VTCPay is invalid!'));
        }
    }
}
