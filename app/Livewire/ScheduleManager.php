<?php

namespace App\Livewire;

use App\Models\Schedule;
use Livewire\Component;

class ScheduleManager extends Component{

    public $schedules, $days, $start, $end, $status, $scheduleId;
    public $isEditing = false;

    public function mount(){
        $this->schedules = Schedule::all();
    }

    public function store(){
        $this->validate([
            'days' => 'required|string',
        ]);

        if($this->scheduleId){
            Schedule::find($this->scheduleId)->update([
                'days' => $this->days,
                'start' => $this->start,
                'end' => $this->end,
                'status' => $this->status,
            ]);
        }else{
            Schedule::create([
                'days' => $this->days,
                'start' => $this->start,
                'end' => $this->end,
                'status' => $this->status ,
            ]);
        }

        $this->resetFields();
        $this->schedules = Schedule::all();
        session()->flash('message', $this->scheduleId ? 'تم تعديل الميعاد بنجاح.' : 'تم إنشاء الميعاد بنجاح.');
    }

    public function edit($id){
        $schedule = Schedule::findOrFail($id);
        $this->scheduleId = $schedule->id;
        $this->days = $schedule->days;
        $this->start = $schedule->start;
        $this->end = $schedule->end;
        $this->status = $schedule->status;
        $this->isEditing = true;
    }

    public function delete($id){
        Schedule::findOrFail($id)->delete();
        $this->schedules = Schedule::all();
        session()->flash('message', 'تم حذف الميعاد بنجاح.');
    }

    private function resetFields(){
        $this->days = '';
        $this->start = '';
        $this->end = '';
        $this->status = false;
        $this->scheduleId = null;
        $this->isEditing = false;
    }
    public function render(){
        return view('livewire.schedule-manager');
    }
}