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
trait RequestSignature
{
    protected function generateSignature(): string
    {
        $data = [];
        $signature = new Signature(
            $this->getSecretKey()
        );
        $parameters = $this->getParameters();

        foreach ($this->getSignatureParameters() as $pos => $parameter) {
            if (! is_string($pos)) {
                $pos = $parameter;
            }

            $data[$pos] = Arr::getValue($parameter, $parameters);
        }

        return $signature->generate($data);
    }
    abstract protected function getSignatureParameters(): array;
}