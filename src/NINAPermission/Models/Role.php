<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */


namespace NINAPermission\Models;
use NINACORE\DatabaseCore\Eloquent\Model;
use NINACORE\Models\UserModel;

/**
 * @method static create(array $data)
 */
class Role extends Model
{
    protected $fillable = [
        'name',
        'numb',
        'status'
    ];
    public function users(): \NINACORE\DatabaseCore\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(UserModel::class,'user_has_roles');
    }

    public function permissions(): \NINACORE\DatabaseCore\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Permission::class,'role_has_permissions');
    }
}