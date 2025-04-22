<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */

namespace NINACORE\NINAGateway\VTCPay\Message;
use NINACORE\NINAGateway\VTCPay\Concerns\Parameters;
use NINACORE\NINAGateway\VTCPay\Concerns\ParametersNormalize;
use Omnipay\Common\Message\AbstractRequest as BaseAbstractRequest;

abstract class AbstractRequest extends BaseAbstractRequest
{
    use Parameters;
    use ParametersNormalize;
    use Concerns\RequestEndpoint;
    use Concerns\RequestSignature;
    /**
     * {@inheritdoc}
     */
    public function initialize(array $parameters = [])
    {
        return parent::initialize(
            $this->normalizeParameters($parameters)
        );
    }
}
