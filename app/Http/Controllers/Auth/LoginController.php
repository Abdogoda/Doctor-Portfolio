<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller{

    //Login Handler Function
    public function __invoke(LoginRequest $request){
        $user = User::where('email', $request->email)->first();
        
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            toastr()->success('لقد قمت بتسجيل الدخول بنجاح');
            return redirect()->route('admin.dashboard');
        }
        
        toastr()->error('المعلومات المعطاه غير صحيحة');
        return redirect()->back();
    }

}