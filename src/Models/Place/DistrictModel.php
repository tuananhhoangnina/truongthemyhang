<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */


namespace NINACORE\Models\Place;
use NINACORE\DatabaseCore\Eloquent\Factories\HasFactory;
use NINACORE\DatabaseCore\Eloquent\Model;

class DistrictModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];
    protected $table = 'district';
    public function getWard(): \NINACORE\DatabaseCore\Eloquent\Relations\HasMany
    {
        return $this->hasMany('NINACORE\Models\Place\WardModel','id_district');
    }
    public function getCity(): \NINACORE\DatabaseCore\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('NINACORE\Models\Place\CityModel', 'id_city');
    }
}