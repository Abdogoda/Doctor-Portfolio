<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateBackgroundRequest;
use App\Models\Background;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BackgroundController extends Controller{

    public function index(){
        return view("backend.pages.backgrounds.index");
    }

    public function update(UpdateBackgroundRequest $request, Background $background){
        if($request->hasFile('image')){
            if ($background->image) {
                $existingImagePath = 'public/'. $background->image;
                if (Storage::exists($existingImagePath)) {
                    Storage::delete($existingImagePath);
                }
            }

            $file = $request->file('image');
            $filename = 'BACKGROUND.' . date('YmdHi') . '.' . uniqid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/images/backgrounds', $filename);

            $background->update(['image' => str_replace('public/', '', $path)]);
            toastr()->success('تم تعديل الخلفية بنجاح');
            return redirect()->back();
        }else{
            toastr()->error('لا يمكن تغيير هذه الخلفية!');
            return redirect()->back();
        }
    }
}