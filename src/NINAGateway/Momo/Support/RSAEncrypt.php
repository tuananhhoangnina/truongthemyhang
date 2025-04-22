<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */


namespace NINACORE\NINAGateway\Momo\Support;

class RSAEncrypt
{
    protected $publicKey;
    public function __construct(string $publicKey)
    {
        $this->publicKey = $publicKey;
    }
    public function encrypt(array $data): string
    {
        $data = json_encode($data);
        openssl_public_encrypt($data, $dataEncrypted, $this->publicKey, OPENSSL_PKCS1_PADDING);
        return base64_encode($dataEncrypted);
    }
}