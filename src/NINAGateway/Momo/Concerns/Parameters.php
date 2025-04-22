<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */


namespace NINACORE\NINAGateway\Momo\Concerns;

trait Parameters
{
    public function getAccessKey(): ?string
    {
        return $this->getParameter('accessKey');
    }
    public function setAccessKey(?string $key)
    {
        return $this->setParameter('accessKey', $key);
    }
    public function getSecretKey(): ?string
    {
        return $this->getParameter('secretKey');
    }
    public function setSecretKey(?string $key)
    {
        return $this->setParameter('secretKey', $key);
    }
    public function getPartnerCode(): ?string
    {
        return $this->getParameter('partnerCode');
    }
    public function setPartnerCode(?string $code)
    {
        return $this->setParameter('partnerCode', $code);
    }
    public function getPublicKey(): ?string
    {
        return $this->getParameter('publicKey');
    }
    public function setPublicKey(?string $key)
    {
        return $this->setParameter('publicKey', $key);
    }
}