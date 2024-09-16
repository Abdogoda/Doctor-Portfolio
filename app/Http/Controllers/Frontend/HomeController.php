<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SendMessageRequest;
use App\Models\Media;
use App\Models\Message;
use App\Models\Service;
use App\Models\User;
use App\Notifications\NewMessageNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class HomeController extends Controller{

    public function index(){
        $special_media = Cache::remember('special_media', now()->addMinutes(60), function () {
            return Media::where('status', 1)->first();
        });
        return view('frontend.pages.index', compact('special_media'));
    }

    public function services(){
        return view('frontend.pages.services');
    }

    public function media(){
        $media = Cache::remember('media', now()->addMinutes(60), function () {
            return Media::all();
        });
        return view('frontend.pages.media', compact('media'));
    }

    public function contact(){
        return view('frontend.pages.contact');
    }

    public function sadaka(){
        return view('frontend.pages.sadaka');
    }

    public function sendMessage(SendMessageRequest $request){
        try {
            DB::beginTransaction();
            $new_message = Message::create($request->validated());

            $user = User::first();
            if($user){
                $appointmentDetails = [
                    'name' => $new_message->name,
                    'phone' => $new_message->phone,
                    'email' => $new_message->email,
                    'time' => Carbon::now()->translatedFormat('l j F Y H:i:s'),
                    'message' => $new_message->message,
                    'service' => $new_message->service ? $new_message->service->name : 'غير محدد'
                ];
            
                $user->notify(new NewMessageNotification($appointmentDetails));
            }

            DB::commit();
            toastr()->success('تم إرسال طلبك بنجاح');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
}