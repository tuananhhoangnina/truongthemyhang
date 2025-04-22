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

use NINACORE\NINAGateway\OnePay\Message\AbstractQueryTransactionRequest;
class QueryTransactionRequest extends AbstractQueryTransactionRequest
{
    protected $testEndpoint = 'https://mtf.onepay.vn/vpcpay/Vpcdps.op';

    protected $productionEndpoint = 'https://onepay.vn/vpcpay/Vpcdps.op';
}
