<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */


namespace NINACORE\Cart\Contracts;

interface Buyable
{
    public function getBuyableIdentifier($options = null);
    public function getBuyableDescription($options = null);
    public function getBuyablePrice($options = null);
    public function getBuyableWeight($options = null);
}