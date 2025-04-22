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
use NINACORE\Traits\TraitAttr;

class SlugModel extends Model
{
    use HasFactory,TraitAttr;
    public $timestamps = false;
    protected $guarded = [];
    protected $table = 'slug';
    public function getStatus($model) {
	    return $this->belongsTo($model,'id_parent','id')
            ->select('id')
            ->whereRaw("FIND_IN_SET(?, status)", ['hienthi']);
	}
}
