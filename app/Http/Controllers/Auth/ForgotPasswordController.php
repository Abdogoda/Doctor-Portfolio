<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SendResetPasswordLinkEmail;
use App\Models\User;
use App\Notifications\ResetPasswordNotification;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller{

    public function __invoke(Request $request){
        $request->validate(['email' => 'required|email']);

        try {
            // Check if user exists
            $user = User::where('email', $request->email)->first();
            if (!$user) {
                toastr()->error('البريد الالكتروني غير موجود في السيستم');
                return redirect()->back();
            }

            // Generate token
            $token = Str::random(60);

            // Insert into password_resets table
            DB::table('password_reset_tokens')->where('email', $request->email)->delete();
            DB::table('password_reset_tokens')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now(),
            ]);

            // Send email with reset link
            $resetLink = url('/password/reset/' . $token);

            // Mail::to($request->email)->send(new SendResetPasswordLinkEmail($resetLink));
            $user->notify(new ResetPasswordNotification($resetLink));

            toastr()->success('تم ارسال رابط تعديل كلمة المرور الي البريد الإلكتروني الخاص بك, تتحق من بريدك وقم بتغيير كلمة المرور بكل سهولة.');
            return redirect()->back();
        } catch (Exception $e) {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
}