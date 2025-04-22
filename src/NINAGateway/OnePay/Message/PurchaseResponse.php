<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */

namespace NINACORE\NINAGateway\OnePay\Message;

use Omnipay\Common\Message\RedirectResponseInterface;
use Omnipay\Common\Message\RequestInterface;
class PurchaseResponse extends Response implements RedirectResponseInterface
{
    private $redirectUrl;
    public function __construct(RequestInterface $request, $data, $redirectUrl)
    {
        parent::__construct($request, $data);
        $this->redirectUrl = $redirectUrl;
    }
    public function isSuccessful(): bool
    {
        return false;
    }
    public function getRedirectUrl(): string
    {
        return $this->redirectUrl;
    }
    public function isRedirect(): bool
    {
        return true;
    }
}
