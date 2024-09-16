<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller{

    public function index(){
        return view('backend.pages.profile');
    }

    public function update(UpdateProfileRequest $request){
        $user = User::find(auth()->user()->id);
        if($user){
            $user->update($request->validated());
            toastr()->success('لقد قمت بعتديل حسابك الشخصي بنجاح');
            return redirect()->back();
        }
        toastr()->error('ليس لديك الصلاحية للقيام بهذا الإجراء');
        return redirect()->back();
    }
    
    public function changePassword(ChangePasswordRequest $request){
        $user = User::find(auth()->user()->id);
        if($user){
            if(Hash::check($request->current_password, $user->password)){
                $user->update(["password" => Hash::make($request->current_password)]);
                toastr()->success('لقد قمت بتغير كلمة المرور بنجاح');
                return redirect()->back();
            }else{
                toastr()->error('كلمة المرور الحالية غير صحيحة');
                return redirect()->back();
            }
        }
        toastr()->error('ليس لديك الصلاحية للقيام بهذا الإجراء');
        return redirect()->back();
    }

}