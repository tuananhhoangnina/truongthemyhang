<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 2.0 
 * Date 08-02-2025
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */


namespace NINAPermission\Middlewares;

use NINACORE\Core\Support\Facades\Auth;
use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

class PermissionAdmin implements IMiddleware{
    public function handle(Request $request): void {
        $isPermission = config('type.users.permission')??false;
        if($isPermission && !Auth::guard('admin')->user()->hasRole('Admin') && request()->path()!='admin' && !request()->ajax()){
            $onePage = ['seopage','setting','static','extensions'];
            $permissions = Auth::guard('admin')->user()->roles()->first()->permissions()->pluck('name')->toArray();
            $permissions = array_merge($permissions,['user.admin.tai-khoan.man','log.history.man']);
            $urlSegments = explode('/', preg_replace('/^admin\//', '', request()->path()));
            $com = $urlSegments[0] ?? '';
            $act = $urlSegments[1] ?? '';
            $type = $urlSegments[2] ?? '';
            if(in_array($com,$onePage) && $act=='save') $act = 'man';
            else {
                if($act=='save') $act = 'edit';
                if($act=='delete-all') $act = 'delete';
            }
            $permission = str_replace('-','.',$com).'.'.$type.'.'.$act;
            if(!in_array($permission,$permissions)) response()->redirect(url('index'));
        }
    }

}