<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller{
    public function __invoke(Request $request){
        $request->validate([
            'password' => 'required|confirmed|min:6|string',
            'token' => 'required|string'
        ]);

        // Check if token is valid
        $reset = DB::table('password_reset_tokens')
            ->where('token', $request->token)
            ->first();

        if (!$reset || Carbon::parse($reset->created_at)->addMinutes(60)->isPast()) {
            toastr()->error('الحقول المضافة غير صحيحة, أو انتهت صلاحية الرابط');
            return redirect()->back();
        }

        // Reset the password
        $user = User::where('email', $reset->email)->first();
        $user->update(['password' => Hash::make($request->password)]);

        // Delete the reset token
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        toastr()->success('تم تغيير كلمة المرور الخاصة بك بنجاح, يمكنك تسجيل الدخول الان بكلمة المرور الجديدة');
        return redirect()->route('login');
    }
}