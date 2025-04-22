<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */


namespace NINACORE\Facade;
use NINACORE\Core\Support\Facades\Facade;

/**
 * @method static \NINACORE\Cart\Cart instance(?string $instance)
 * @method static string currentInstance()
 * @method static \Illuminate\Support\Collection content()
 * @method static \Illuminate\Support\Collection search(Closure $search)
 * @method static \NINACORE\Cart\CartItem get(string $rowId)
 * @method static \NINACORE\Cart\CartItem addCartItem(\NINACORE\Cart\CartItem $item, bool $keepDiscount, bool $keepTax, bool $dispatchEvent)
 * @method static \NINACORE\Cart\CartItem add(array $data)
 * @method static \NINACORE\Cart\CartItem update(string $rowId, mixed $qty)
 * @method static string weight(int $decimals, string $decimalPoint, string $thousandSeperator)
 * @method static string initial(int $decimals, string $decimalPoint, string $thousandSeperator)
 * @method static string discount(int $decimals, string $decimalPoint, string $thousandSeperator)
 * @method static string subtotal(int $decimals, string $decimalPoint, string $thousandSeperator)
 * @method static string tax(int $decimals, string $decimalPoint, string $thousandSeperator)
 * @method static string total(int $decimals, string $decimalPoint, string $thousandSeperator)
 * @method static string priceTotal(int $decimals, string $decimalPoint, string $thousandSeperator)
 * @method static float priceTotalFloat()
 * @method static float initialFloat()
 * @method static float discountFloat()
 * @method static float subtotalFloat()
 * @method static float taxFloat()
 * @method static float weightFloat()
 * @method static void setDiscount(string $rowId, float|int $discount)
 * @method static void setTax(string $rowId, float|int $taxRate)
 * @method static void setGlobalDiscount( float|int $discount)
 * @method static void setGlobalTax( float|int $taxRate)
 * @method static void associate(string $rowId, mixed $model)
 * @method static void remove(string $rowId)
 * @method static void store(mixed $identifier)
 * @method static void restore(mixed $identifier)
 * @method static void erase(mixed $identifier)
 * @method static bool merge(mixed $identifier, bool $keepDiscount, bool $keepTax, bool $dispatchAdd)
 * @method static void destroy()
 * @method static count()
 */
class Cart extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'cart';
    }
}