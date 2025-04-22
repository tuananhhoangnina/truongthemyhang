<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */

namespace NINACORE\NINAGateway\OnePay;

use Omnipay\Common\AbstractGateway as BaseAbstractGateway;
abstract class AbstractGateway extends BaseAbstractGateway
{
    use Concerns\Parameters;
    use Concerns\ParametersNormalization;
    public function initialize(array $parameters = [])
    {
        return parent::initialize(
            $this->normalizeParameters($parameters)
        );
    }
    public function getDefaultParameters(): array
    {
        return [
            'vpc_Version' => 2,
        ];
    }
}
