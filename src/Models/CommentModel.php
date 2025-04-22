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

class CommentModel extends Model
{
    use HasFactory,TraitAttr;
    protected $guarded = [];
    protected $table = 'comment';

    public function replies(): \NINACORE\DatabaseCore\Eloquent\Relations\hasMany
    {
        return $this->hasMany(CommentModel::class, 'id_parent', 'id');
    }

    public function getReplies(): \NINACORE\DatabaseCore\Eloquent\Relations\hasMany
    {
        return $this->hasMany(CommentModel::class, 'id_parent', 'id')->where("id_parent", '<>', 0)->whereRaw("FIND_IN_SET(?,status)", ['hienthi']);
    }

}