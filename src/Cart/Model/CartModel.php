<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */

namespace NINACORE\Cart\Model;
use NINACORE\DatabaseCore\Eloquent\Factories\HasFactory;
use NINACORE\DatabaseCore\Eloquent\Model;

/**
 * @method static create(array $dataOrder)
 */
class CartModel extends Model
{
    use HasFactory;
    public $table = 'orders';
    protected $casts = [
        'info_user' => 'json',
        'order_detail' => 'json',
    ];
    protected $fillable = [
        'info_user',
        'id_user',
        'order_payment',
        'temp_price',
        'total_price',
        'code',
        'ship_price',
        'requirements',
        'notes',
        'numb',
        'order_detail',
    ];

}