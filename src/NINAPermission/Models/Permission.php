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

class Permission extends Model
{
    protected $fillable = [
        'name',
    ];
    public function users()
    {
        return $this->belongsToMany(UserModel::class,'user_has_permissions');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_has_permissions');
    }

    public function scopeAssignRole($role)
    {
        return $this->roles()->attach($role);
    }
}