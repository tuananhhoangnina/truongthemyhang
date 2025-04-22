<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */


namespace NINACORE\Cart;
trait CanBeBought
{
    public function getBuyableIdentifier($options = null)
    {
        return method_exists($this, 'getKey') ? $this->getKey() : $this->id;
    }
    public function getBuyableDescription($options = null)
    {
        if (($name = $this->getAttribute('name'))) {
            return $name;
        }
        if (($title = $this->getAttribute('title'))) {
            return $title;
        }
        if (($description = $this->getAttribute('description'))) {
            return $description;
        }
    }
    public function getBuyablePrice($options = null)
    {
        if (($price = $this->getAttribute('price'))) {
            return $price;
        }
    }
    public function getBuyableWeight($options = null)
    {
        if (($weight = $this->getAttribute('weight'))) {
            return $weight;
        }

        return 0;
    }
}