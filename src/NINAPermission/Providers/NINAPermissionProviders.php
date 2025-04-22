<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */


namespace NINAPermission\Providers;

use NINACORE\Core\ServiceProvider;
use NINACORE\Core\Support\Facades\Auth;

class NINAPermissionProviders extends ServiceProvider
{
    protected $defer = true;
    public function boot(): void {
        if(request()->segment(1)=='admin'){
            if(Auth::guard('admin')->check() && !Auth::guard('admin')->user()->hasRole('Admin') && config('type.users.permission')){
                $permissions = Auth::guard('admin')->user()->roles()->first()->permissions()->pluck('name')->toArray();
                app()->make('view')->setCanFunction(function($action, $subject = null) use ($permissions) {
                    if(in_array($action,$permissions)) return true;
                    return false;
                });
            }
        }
    }
    public function register(): void {}
}