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

class PropertiesModel extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'properties';
    public function getListProperties(): \NINACORE\DatabaseCore\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\NINACORE\Models\PropertiesListModel::class,'id_list','id');
    }
}