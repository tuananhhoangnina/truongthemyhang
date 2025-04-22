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
use Omnipay\Common\Message\RedirectResponseInterface;
class PurchaseResponse extends AbstractSignatureResponse implements RedirectResponseInterface
{
    public function isSuccessful(): bool
    {
        return false;
    }
    public function isRedirect(): bool
    {
        return isset($this->data['payUrl']);
    }
    public function getRedirectUrl(): string
    {
        return $this->data['payUrl'];
    }
    protected function getSignatureParameters(): array
    {
        return [
            'requestId', 'orderId', 'message', 'localMessage', 'payUrl', 'errorCode', 'requestType',
        ];
    }
}