<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */

namespace NINACORE\NINAGateway\Momo;
use Omnipay\Common\AbstractGateway;
use NINACORE\NINAGateway\MoMo\Message\AllInOne\RefundRequest;
use NINACORE\NINAGateway\MoMo\Message\AllInOne\PurchaseRequest;
use NINACORE\NINAGateway\MoMo\Message\AllInOne\QueryRefundRequest;
use NINACORE\NINAGateway\MoMo\Message\AllInOne\NotificationRequest;
use NINACORE\NINAGateway\MoMo\Message\AllInOne\CompletePurchaseRequest;
use NINACORE\NINAGateway\MoMo\Message\AllInOne\QueryTransactionRequest;
class AllInOneGateway extends AbstractGateway
{
    use Concerns\Parameters;
    public function getName(): string
    {
        return 'MoMo AIO';
    }
    /**
     * {@inheritdoc}
     * @return \Omnipay\Common\Message\RequestInterface|CompletePurchaseRequest
     */
    public function completePurchase(array $options = []): CompletePurchaseRequest
    {
        return $this->createRequest(CompletePurchaseRequest::class, $options);
    }

    /**
     * Tạo request notification gửi từ MoMo.
     *
     * @param  array  $options
     * @return \Omnipay\Common\Message\RequestInterface|NotificationRequest
     */
    public function notification(array $options = []): NotificationRequest
    {
        return $this->createRequest(NotificationRequest::class, $options);
    }

    /**
     * {@inheritdoc}
     * @return \Omnipay\Common\Message\RequestInterface|PurchaseRequest
     */
    public function purchase(array $options = []): PurchaseRequest
    {
        return $this->createRequest(PurchaseRequest::class, $options);
    }

    /**
     * Tạo yêu cầu truy vấn thông tin giao dịch đến MoMo.
     *
     * @param  array  $options
     * @return \Omnipay\Common\Message\RequestInterface|QueryTransactionRequest
     */
    public function queryTransaction(array $options = []): QueryTransactionRequest
    {
        return $this->createRequest(QueryTransactionRequest::class, $options);
    }

    /**
     * {@inheritdoc}
     * @return \Omnipay\Common\Message\RequestInterface|RefundRequest
     */
    public function refund(array $options = []): RefundRequest
    {
        return $this->createRequest(RefundRequest::class, $options);
    }

    /**
     * Tạo yêu cầu truy vấn thông tin hoàn tiền đến MoMo.
     *
     * @return \Omnipay\Common\Message\RequestInterface|QueryRefundRequest
     */
    public function queryRefund(array $options = []): QueryRefundRequest
    {
        return $this->createRequest(QueryRefundRequest::class, $options);
    }
}
