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
use NINACORE\DatabaseCore\Eloquent\Authenticate;
use NINAPermission\Traits\HasPermission;

class UserModel extends Authenticate
{
    use HasFactory,HasPermission;
    public $timestamps = false;
    protected $guard = "admin";
    protected $table = 'user';
    protected $guarded = [];
    protected $hidden = [
        'password'
    ];
    protected $casts = [
        'password' => 'hashed'
    ];
    protected string $username = 'email';
    protected string $password = 'password';
}