<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */


namespace NINACORE\NINAGateway\Momo\Support;

class Arr
{
    public static function getValue($element, array $arr, $default = null)
    {
        while (false !== ($pos = strpos($element, '.'))) {
            $sub = substr($element, 0, $pos);
            $element = substr($element, $pos + 1);

            if (isset($arr[$sub]) && is_array($arr[$sub])) {
                $arr = $arr[$sub];
            } else {
                break;
            }
        }
        if (false === strpos($element, '.')) {
            return $arr[$element] ?? $default;
        }
        return $default;
    }
}