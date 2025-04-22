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

use NINACORE\NINAGateway\OnePay\Support\Signature;

trait RequestSignature
{
    protected function generateSignature(): string
    {
        $data = [];
        $signature = new Signature(
            $this->getVpcHashKey()
        );

        foreach ($this->getSignatureParameters() as $parameter) {
            $data[$parameter] = $this->getParameter($parameter);
        }

        return $signature->generate($data);
    }
    abstract protected function getSignatureParameters(): array;
}
