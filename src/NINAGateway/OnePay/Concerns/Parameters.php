<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */

namespace NINACORE\NINAGateway\OnePay\Concerns;
trait Parameters
{
    public function getVpcMerchant(): ?string
    {
        return $this->getParameter('vpc_Merchant');
    }
    public function setVpcMerchant(?string $merchant)
    {
        return $this->setParameter('vpc_Merchant', $merchant);
    }
    public function getVpcAccessCode(): ?string
    {
        return $this->getParameter('vpc_AccessCode');
    }

    public function setVpcAccessCode(?string $code)
    {
        return $this->setParameter('vpc_AccessCode', $code);
    }
    public function getVpcHashKey(): ?string
    {
        return $this->getParameter('vpc_HashKey');
    }
    public function setVpcHashKey(?string $key)
    {
        return $this->setParameter('vpc_HashKey', $key);
    }
    public function getVpcUser(): ?string
    {
        return $this->getParameter('vpc_User');
    }
    public function setVpcUser(?string $user)
    {
        return $this->setParameter('vpc_User', $user);
    }
    public function getVpcPassword(): ?string
    {
        return $this->getParameter('vpc_Password');
    }
    public function setVpcPassword(?string $password)
    {
        return $this->setParameter('vpc_Password', $password);
    }
    public function getVpcVersion(): ?string
    {
        return $this->getParameter('vpc_Version');
    }
    public function setVpcVersion(?string $version)
    {
        return $this->setParameter('vpc_Version', $version);
    }
}
