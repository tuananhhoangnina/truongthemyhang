<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */


namespace NINACORE\NINAGateway\VNPay\Concerns;

trait Parameters
{
    public function getVnpVersion(): ?string
    {
        return $this->getParameter('vnp_Version');
    }
    public function setVnpVersion(?string $code)
    {
        return $this->setParameter('vnp_Version', $code);
    }
    public function getVnpTmnCode(): ?string
    {
        return $this->getParameter('vnp_TmnCode');
    }
    public function setVnpTmnCode(?string $code)
    {
        return $this->setParameter('vnp_TmnCode', $code);
    }
    public function getVnpHashSecret(): ?string
    {
        return $this->getParameter('vnp_HashSecret');
    }
    public function setVnpHashSecret(?string $secret)
    {
        return $this->setParameter('vnp_HashSecret', $secret);
    }
}