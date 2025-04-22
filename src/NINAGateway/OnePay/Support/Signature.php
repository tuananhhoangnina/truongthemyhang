<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */

namespace NINACORE\NINAGateway\OnePay\Support;
class Signature
{
    protected $hashKey;
    public function __construct(string $hashKey)
    {
        $this->hashKey = pack('H*', $hashKey);
    }
    public function generate(array $data): string
    {
        ksort($data);
        $dataSign = urldecode(http_build_query($data));
        return strtoupper(hash_hmac('SHA256', $dataSign, $this->hashKey));
    }
    public function validate(array $data, string $expect): bool
    {
        $actual = $this->generate($data);

        return 0 === strcasecmp($expect, $actual);
    }
}
