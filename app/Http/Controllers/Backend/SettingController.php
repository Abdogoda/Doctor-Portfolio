<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Social;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller{
    public function index(){
        return view('backend.pages.settings');
    }

    public function update_settings(Request $request){
        DB::beginTransaction();
        try {
            $settings = Setting::first();
            if($settings){
                $attributes = [
                    "name" => $request->name,
                    "description" => $request->description,
                    "address" => $request->address,
                    "location" => $request->location,
                    "email" => $request->email,
                    "phone" => $request->phone,
                    "phone2" => $request->phone2,
                ];

                if($request->hasFile('logo')){
                    $attributes['logo'] = $this->handleUploadLogos($settings->logo, $request, "logo");
                }

                if($request->hasFile('large_logo')){
                    $attributes['large_logo'] = $this->handleUploadLogos($settings->large_logo, $request, "large_logo");
                }

                $settings->update($attributes);
                DB::commit();
            }else{
                $settings = Setting::create($request->all());
            }
            toastr()->success('تم حفظ إعدادات الموقع بنجاح');
            return redirect()->back();
            
        } catch (Exception $e) {
            DB::rollBack();
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }

    public function update_social(Request $request){
        DB::beginTransaction();
        try {
            $socials = Social::first();
            if($socials){
                $attributes = [
                    'whatsapp' => $request->whatsapp,
                    'facebook' => $request->facebook,
                    'twitter' => $request->twitter,
                    'youtube' => $request->youtube,
                    'instagram' => $request->instagram,
                    'tiktok' => $request->tiktok,
                    'linkedin' => $request->linkedin
                ];

                $socials->update($attributes);
                DB::commit();
            }else{
                $socials = Social::create($request->all());
            }
            toastr()->success('تم حفظ إعدادات التواصل بنجاح');
            return redirect()->back();
            
        } catch (Exception $e) {
            DB::rollBack();
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }

    private function handleUploadLogos($db_attribute, Request $request, string $request_attribute): string{
            if ($db_attribute) {
                $existingImagePath = 'public/'. $db_attribute;
                if (Storage::exists($existingImagePath)) {
                    Storage::delete($existingImagePath);
                }
            }

            $file = $request->file($request_attribute);
            $filename = 'LOGO.' . date('YmdHi') . '.' . uniqid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/images/logo', $filename);

            return str_replace('public/', '', $path);
    }
}