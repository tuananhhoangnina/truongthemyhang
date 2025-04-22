<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */


namespace NINACORE\NINAGateway\Momo\Message\AllInOne;
use Symfony\Component\HttpFoundation\ParameterBag;
use NINACORE\NINAGateway\MoMo\Message\AbstractIncomingRequest as BaseAbstractIncomingRequest;
abstract class AbstractIncomingRequest extends BaseAbstractIncomingRequest
{
    public function sendData($data): IncomingResponse
    {
        return $this->response = new IncomingResponse($this, $data);
    }
    protected function getIncomingParameters(): array
    {
        $data = [];
        $params = [
            'partnerCode', 'accessKey', 'requestId', 'amount', 'orderId', 'orderInfo', 'orderType', 'transId',
            'message', 'localMessage', 'responseTime', 'errorCode', 'extraData', 'signature', 'payType',
        ];
        $bag = $this->getIncomingParametersBag();

        foreach ($params as $param) {
            $data[$param] = $bag->get($param);
        }

        return $data;
    }
    abstract protected function getIncomingParametersBag(): ParameterBag;
}