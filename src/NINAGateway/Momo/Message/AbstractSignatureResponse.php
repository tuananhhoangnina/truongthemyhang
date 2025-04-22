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

use Omnipay\Common\Message\RequestInterface;
abstract class AbstractSignatureResponse extends AbstractResponse
{
    use Concerns\ResponseSignatureValidation;
    public function __construct(RequestInterface $request, $data)
    {
        parent::__construct($request, $data);
        if ('0' === $this->getCode()) {
            $this->validateSignature();
        }
    }
}