<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAboutRequest;
use App\Models\About;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller{

    public function index(){
        $education = About::where("type", "education")->first();
        $image = About::where("type", "image")->first();
        $features = About::where("type", "feature")->get();
        $paragraphs = About::where("type", "paragraph")->get();
        return view('backend.pages.about', compact('education', 'features', 'image', 'paragraphs'));
    }

    public function update(UpdateAboutRequest $request){
        DB::beginTransaction();
        try {
            // update education
            if($request->education){
                $education = About::where("type", "education")->first();
                $education->update(['text' => $request->education]);
            }
    
            // update profile
            if($request->hasFile('image_profile')){
                $image = About::where("type", "image")->first();
    
                if ($image->text) {
                    $existingImagePath = 'public/'. $image->text;
                    if (Storage::exists($existingImagePath)) {
                        Storage::delete($existingImagePath);
                    }
                }
                $file = $request->file('image_profile');
                $filename = 'PROFILE.' . date('YmdHi') . '.' . uniqid() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('public/images/profile', $filename);
    
                $image->update(['text' => str_replace('public/', '', $path)]);
            }

            // update paragraphs
            About::where("type", "paragraph")->delete();
            foreach ($request->paragraphs as $item) {
                About::create(["type" => 'paragraph', "text" => $item]);
            }

            // update features
            About::where("type", "feature")->delete();
            foreach ($request->features as $item) {
                About::create(["type" => 'feature', "text" => $item]);
            }
    
            toastr()->success('تم تعديل البيانات بنجاح');
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
}