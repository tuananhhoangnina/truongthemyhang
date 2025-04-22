<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */


namespace NINACORE\Models;
use NINACORE\DatabaseCore\Eloquent\Factories\HasFactory;
use NINACORE\DatabaseCore\Eloquent\Model;
use NINACORE\Models\CityModel;
class OrdersModel extends Model
{
    use HasFactory;
    use \NINACORE\DatabaseCore\Relations\HasJsonRelationships;
    public $timestamps = false;
    protected $guarded = [];
    protected $table = 'orders';
    protected $casts = ['info_user' => 'json','order_detail'=>'json'];
    
    public function getStatus(): \NINACORE\DatabaseCore\Eloquent\Relations\BelongsTo {
        return $this->belongsTo('NINACORE\Models\OrderStatusModel', 'order_status');
    }
    public function getPayment(): \NINACORE\DatabaseCore\Eloquent\Relations\BelongsTo {
        return $this->belongsTo('NINACORE\Models\NewsModel', 'order_payment');
    }
    public function getMember() {
        //return $this->belongsTo('\NINACORE\Models\Member', 'id_user');
    }
    public function city()
    {
        return $this->belongsTo(CityModel::class, 'info_user->city');
    }
}