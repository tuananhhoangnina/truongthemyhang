<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */


namespace NINACORE\NINAGateway\Momo\Message\Concerns;
use NINACORE\NINAGateway\MoMo\Support\Arr;
use NINACORE\NINAGateway\MoMo\Support\Signature;
use Omnipay\Common\Exception\InvalidResponseException;
trait ResponseSignatureValidation
{
    protected function validateSignature(): void
    {
        $data = $this->getData();
        if (! isset($data['signature'])) {
            throw new InvalidResponseException(sprintf('Response from MoMo is invalid!'));
        }
        $dataSignature = [];
        $signature = new Signature(
            $this->getRequest()->getSecretKey()
        );
        foreach ($this->getSignatureParameters() as $pos => $parameter) {
            if (! is_string($pos)) {
                $pos = $parameter;
            }
            $dataSignature[$pos] = Arr::getValue($parameter, $data);
        }
        if (! $signature->validate($dataSignature, $data['signature'])) {
            throw new InvalidResponseException(sprintf('Data signature response from MoMo is invalid!'));
        }
    }
    abstract protected function getSignatureParameters(): array;
}