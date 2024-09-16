<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller{
    
    public function index(){
        return view('backend.pages.services.index');
    }
    
    public function create(){
        return view('backend.pages.services.create');
    }
    
    public function store(StoreServiceRequest $request){
        try {
            if($request->hasFile('image')){
                $file = $request->file('image');
                $filename = 'SERVICE.' . date('YmdHi') . '.' . uniqid() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('public/images/services', $filename);
    
                
                $attributes = $request->validated();
                $attributes['image'] = str_replace('public/', '', $path);
                Service::create($attributes);

                toastr()->success('تم إضافة الخدمة بنجاح');
                return redirect()->back();
            }else{
                toastr()->error('هناك خطأ, يبدو أنك لم تقم برفع الصورة أو ان الصورة غير صالحة!');
                return redirect()->back();
            }
        } catch (Exception $e) {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
    public function edit(Service $service){
        $service = Service::find($service->id);
        if($service){
            return view('backend.pages.services.edit', compact('service'));
        }else{
            toastr()->error('هذة الخدمة غير موجودة!');
            return redirect()->back();
        }
    }
    
    public function update(Service $service, UpdateServiceRequest $request){
        $service = Service::find($service->id);
        if($service){
            try {
                $attributes = $request->validated();
                if($request->hasFile('image')){
                    if ($service->image) {
                        $existingImagePath = 'public/'. $service->image;
                        if (Storage::exists($existingImagePath)) {
                            Storage::delete($existingImagePath);
                        }
                    }

                    $file = $request->file('image');
                    $filename = 'SERVICE.' . date('YmdHi') . '.' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $path = $file->storeAs('public/images/services', $filename);
    
                    $attributes['image'] = str_replace('public/', '', $path);
                }
                $service->update($attributes);
                toastr()->success('تم تعديل الخدمة بنجاح');
                return redirect()->back();
            } catch (Exception $e) {
                toastr()->error($e->getMessage());
                return redirect()->back();
            }
        }else{
            toastr()->error('هذة الخدمة غير موجودة!');
            return redirect()->back();
        }
    }

    public function destroy(Service $service){
        $service = Service::find($service->id);
        if($service){
            if ($service->image) {
                $existingImagePath = 'public/'. $service->image;
                if (Storage::exists($existingImagePath)) {
                    Storage::delete($existingImagePath);
                }
            }
            $service->delete();
            toastr()->success('تم حذف الخدمة بنجاح');
            return redirect()->back();
        }else{
            toastr()->error('هذة الخدمة غير موجودة!');
            return redirect()->back();
        }
    }
    
}