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

class PayQueryStatusResponse extends AbstractResponse
{
    public function getCode(): ?string
    {
        return $this->data['status'] ?? null;
    }
    public function getTransactionId(): ?string
    {
        return $this->data['data']['billId'] ?? null;
    }
    public function getTransactionReference(): ?string
    {
        return $this->data['data']['transid'] ?? null;
    }
}