<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */


namespace NINACORE\NINAGateway\Payoo\Message;
use Omnipay\Common\Exception\InvalidResponseException;
use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RequestInterface;
class CompletePurchaseResponse extends AbstractResponse
{
    const STATE_PAYMENT_RECEIVED = 'PAYMENT_RECEIVED';
    const STATE_PAYMENT_PROCESSING = 'PAYMENT_PROCESSING';

    const STATUS_SUCCESS = 1;
    const STATUS_FAIL = 0;
    const STATUS_CANCEL = -1;

    const RESPONSE_STATUS_SUCCESS = 1;
    const RESPONSE_STATUS_FAIL = 2;
    const RESPONSE_STATUS_CANCEL = 3;
    const RESPONSE_STATUS_PENDING = 4;

    private $responseStatus;
    private $message;

    public function __construct(RequestInterface $request, $data)
    {
        parent::__construct($request, $data);

        $this->checkStatus($data);
    }

    public function isPending()
    {
        return $this->responseStatus == self::RESPONSE_STATUS_PENDING;
    }

    public function isSuccessful()
    {
        return $this->responseStatus == self::RESPONSE_STATUS_SUCCESS;
    }

    public function isCancelled()
    {
        return $this->responseStatus == self::RESPONSE_STATUS_CANCEL;
    }

    public function getTransactionId()
    {
        if (!$this->isSuccessful()) {
            return null;
        }

        return isset($this->data['order_no']) ? $this->data['order_no'] : null;
    }

    public function getTransactionReference()
    {
        return null;
    }

    public function getMessage()
    {
        return $this->message;
    }

    private function checkStatus($data)
    {
        if (!isset($data['method'])) {
            throw new InvalidResponseException('method data is not set');
        }

        if (strtolower($data['method']) == strtolower('get')) {
            $this->handleGetResponse($data);
        }

        if (strtolower($data['method']) == strtolower('post')) {
            $this->handlePostResponse($data);
        }
    }

    private function handleGetResponse($data)
    {
        if (strtoupper($data['checksum']) != strtoupper($data['computed_checksum'])) {
            $this->message = 'The signatures do not match';
            $this->responseStatus = self::RESPONSE_STATUS_FAIL;
            return;
        }

        switch ($data['status']) {
            case self::STATUS_CANCEL:
                $this->responseStatus = self::RESPONSE_STATUS_CANCEL;
                $this->message = 'Payment is cancelled';
                break;
            case self::STATUS_FAIL:
                $this->responseStatus = self::RESPONSE_STATUS_FAIL;
                $this->message = 'Payment is failed';
                break;
            case self::STATUS_SUCCESS:
                $this->responseStatus = self::RESPONSE_STATUS_SUCCESS;
                $this->message = 'Payment is complete';
                break;
            default:
                throw new InvalidResponseException('invalid status code: ' . $data['status']);
                break;
        }

    }

    private function handlePostResponse($data)
    {

        if (strtoupper($data['signature']) != strtoupper($data['computed_checksum'])) {
            $this->message = 'The signatures do not match';
            $this->responseStatus = self::RESPONSE_STATUS_FAIL;
            return;
        }

        switch ($data['state']) {
            case self::STATE_PAYMENT_PROCESSING:
                $this->responseStatus = self::RESPONSE_STATUS_PENDING;
                $this->message = 'The payment is still in process and it doesn\'t have the final result';
                break;
            case self::STATE_PAYMENT_RECEIVED:
                $this->responseStatus = self::RESPONSE_STATUS_SUCCESS;
                $this->message = 'Partner order has been paid.';
                break;
            default:
                throw new InvalidResponseException('invalid state string: ' . $data['state']);
                break;
        }
    }
}