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

class Signature
{
    protected $secretKey;
    public function __construct(string $secretKey)
    {
        $this->secretKey = $secretKey;
    }
    public function generate(array $data): string
    {
        $data = urldecode(http_build_query($data));
        return hash_hmac('sha256', $data, $this->secretKey);
    }
    public function validate(array $data, string $expect): bool
    {
        $actual = $this->generate($data);

        return 0 === strcasecmp($expect, $actual);
    }
}