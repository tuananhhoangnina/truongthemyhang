<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */

namespace NINACORE\NINAGateway\OnePay\Message\International;

use NINACORE\NINAGateway\OnePay\Message\AbstractPurchaseRequest;

class PurchaseRequest extends AbstractPurchaseRequest
{
    protected $testEndpoint = 'https://mtf.onepay.vn/vpcpay/vpcpay.op';

    protected $productionEndpoint = 'https://onepay.vn/vpcpay/vpcpay.op';
}
