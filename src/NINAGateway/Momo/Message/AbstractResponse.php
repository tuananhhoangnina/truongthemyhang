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
use Omnipay\Common\Message\AbstractResponse as BaseAbstractResponse;

abstract class AbstractResponse extends BaseAbstractResponse
{
    use Concerns\ResponseProperties;
    public function isSuccessful(): bool
    {
        return '0' === $this->getCode();
    }
    public function isCancelled(): bool
    {
        return '49' === $this->getCode();
    }
    public function getMessage(): ?string
    {
        return $this->data['message'] ?? null;
    }
}