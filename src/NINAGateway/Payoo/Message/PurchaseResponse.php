<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */


namespace NINACORE\NINAGateway\Payoo\Message;
use Omnipay\Common\Message\AbstractResponse;
class PurchaseResponse extends AbstractResponse
{
    private $endPointProduction = 'https://www.payoo.vn/v2/paynow/';
    private $endPointSandbox = 'https://newsandbox.payoo.com.vn/v2/paynow/';

    public function isSuccessful()
    {
        return false;
    }

    public function isPending()
    {
        return true;
    }

    public function isRedirect()
    {
        return true;
    }

    public function isTransparentRedirect()
    {
        return true;
    }

    public function getRedirectMethod()
    {
        return 'POST';
    }

    public function getRedirectUrl()
    {
        if ($this->request->getTestMode()) {
            return $this->endPointSandbox;
        }

        return $this->endPointProduction;
    }

    public function getRedirectData()
    {
        return $this->data;
    }

}