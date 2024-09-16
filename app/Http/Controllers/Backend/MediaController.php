<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMediaRequest;
use App\Http\Requests\UpdateMediaRequest;
use App\Models\Media;
use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller{

    public function index(){
        $media = Cache::remember('media', now()->addMinutes(60), function () {
            return Media::all();
        });
        return view('backend.pages.media.index', compact('media'));
    }

    public function create(){
        return view('backend.pages.media.create');
    }

    public function store(StoreMediaRequest $request){
        try {
            if($request->hasFile('image_before') && $request->hasFile('image_after')){
                $attributes = $request->validated();
                $attributes['status'] = $request->status == 'on' ? 1 : 0;
                
                // image before
                $file_before = $request->file('image_before');
                $filename_before = 'MEDIA.BEFORE.' . date('YmdHi') . '.' . uniqid() . '.' . $file_before->getClientOriginalExtension();
                $path_before = $file_before->storeAs('public/images/media', $filename_before);
                $attributes['image_before'] = str_replace('public/', '', $path_before);

                // image after 
                $file_after = $request->file('image_after');
                $filename_after = 'MEDIA.AFTER.' . date('YmdHi') . '.' . uniqid() . '.' . $file_after->getClientOriginalExtension();
                $path_after = $file_after->storeAs('public/images/media', $filename_after);
                $attributes['image_after'] = str_replace('public/', '', $path_after);

                Media::create($attributes);

                toastr()->success('تم إضافة الميديا بنجاح');
                return redirect()->back();
            }else{
                toastr()->error('هناك خطأ, يبدو أنك لم تقم برفع الصور أو ان الصور غير صالحة!');
                return redirect()->back();
            }
        } catch (Exception $e) {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }

    public function edit(String $id){
        $media =  Media::find($id);
        if($media){
            return view('backend.pages.media.edit', compact('media'));
        }else{
            toastr()->error('هذة الميديا غير موجودة!');
            return redirect()->back();
        }
    }

    public function update(String $id, UpdateMediaRequest $request){
        $media = Media::find($id);
        if($media){
            try {
                DB::beginTransaction();
                if((!$request->hasFile('image_before') && $media->image_before == null) || (!$request->hasFile('image_after') && $media->image_after == null)){
                    toastr()->error('يجب إضافة صور لهذة الميديا!');
                    return redirect()->back();
                }
                $media->update(['status' => $request->status == 'on' ? 1 : 0]);
                
                // image before
                if($request->hasFile('image_before')){
                    $existingImagePath = 'public/'. $media->image;
                    if (Storage::exists($existingImagePath)) {
                        Storage::delete($existingImagePath);
                    }
                    $file_before = $request->file('image_before');
                    $filename_before = 'MEDIA.BEFORE.' . date('YmdHi') . '.' . uniqid() . '.' . $file_before->getClientOriginalExtension();
                    $path_before = $file_before->storeAs('public/images/media', $filename_before);
                    $media->update(['status' => str_replace('public/', '', $path_before)]);
                }

                // image after
                if($request->hasFile('image_after')){
                    $existingImagePath = 'public/'. $media->image;
                    if (Storage::exists($existingImagePath)) {
                        Storage::delete($existingImagePath);
                    }
                    $file_after = $request->file('image_after');
                    $filename_after = 'MEDIA.AFTER.' . date('YmdHi') . '.' . uniqid() . '.' . $file_after->getClientOriginalExtension();
                    $path_after = $file_after->storeAs('public/images/media', $filename_after);
                    $media->update(['status' => str_replace('public/', '', $path_after)]);
                }

                DB::commit();
                toastr()->success('تم تعديل الميديا بنجاح');
                return redirect()->back();
            } catch (Exception $e) {
                DB::rollBack();
                toastr()->error($e->getMessage());
                return redirect()->back();
            }
        }else{
            toastr()->error('هذة الميديا غير موجودة!');
            return redirect()->back();
        }
    }

    public function destroy(String $id){
        $media =  Media::find($id);
        if($media){
            $existingImageBeforePath = 'public/'. $media->image_before;
            $existingImageAfterPath = 'public/'. $media->image_after;
            if (Storage::exists($existingImageBeforePath)) {
                Storage::delete($existingImageBeforePath);
            }
            if (Storage::exists($existingImageAfterPath)) {
                Storage::delete($existingImageAfterPath);
            }
            $media->delete();
            toastr()->success('تم حذف الميديا بنجاح');
            return redirect()->back();
        }else{
            toastr()->error('هذة الميديا غير موجودة!');
            return redirect()->back();
        }
    }

}