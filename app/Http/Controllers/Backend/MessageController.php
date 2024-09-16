<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Exception;
use Illuminate\Http\Request;

class MessageController extends Controller{
    public function index(){
        $messages = Message::orderBy('created_at', 'desc')->paginate(10);
        $messages_unreaded = Message::where('read', 0)->count();
        return view('backend.pages.messages.index', compact('messages', 'messages_unreaded'));
    }
    
    public function markAsRead(Message $message){
        $message = Message::find($message->id);
        if($message){
            try {
                $message->update(['read' => 1]);
                toastr()->success('تم تعيين الرسالة كمقروءة بنجاح');
                return redirect()->back();
            } catch (Exception $e) {
                toastr()->error($e->getMessage());
                return redirect()->back();
            }
        }else{
            toastr()->error('هذة الرسالة غير موجودة!');
            return redirect()->back();
        }
    }
    
    public function markAllAsRead(){
        try {
            Message::where('read', 0)->update(['read' => 1]);
            toastr()->success('تم تعيين الرسائل كمقروءة بنجاح');
            return redirect()->back();
        } catch (Exception $e) {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }

    public function destroy(Message $message){
        $message = Message::find($message->id);
        if($message){
            $message->delete();
            toastr()->success('تم حذف الرسالة بنجاح');
            return redirect()->back();
        }else{
            toastr()->error('هذة الرسالة غير موجودة!');
            return redirect()->back();
        }
    }
    
}