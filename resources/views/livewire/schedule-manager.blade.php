<div>
    <div class="d-flex align-items-center justify-content-between flex-wrap mb-4">
      <h4 class="page-title">جدول المواعيد</h4>
    </div>
    @if (session()->has('message'))
        <div class="alert alert-success" onclick="return this.remove()">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="store">
        <div class="row">
            <div class="form-group col-md-4 mb-3">
                <label for="days">الأيام</label>
                <input type="text" id="days" wire:model="days" class="form-control">
                @error('days') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
    
            <div class="form-group col-md-4 mb-3">
                <label for="start">وقت البدء</label>
                <input type="time" id="start" wire:model="start" class="form-control">
                @error('start') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
    
            <div class="form-group col-md-4 mb-3">
                <label for="end">وقت الإنتهاء</label>
                <input type="time" id="end" wire:model="end" class="form-control">
                @error('end') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
    
            <div class="form-group col-12 mb-3">
                <label>مفتوح (في حالة عدم الإختيار سيعتبر الميعاد مغلقاً)</label>
                <input type="checkbox" wire:model="status">
            </div>
        </div>

        <button type="submit" class="btn btn-primary mb-3">
            {{ $isEditing ? 'تعديل الميعاد' : 'إنشاء ميعاد جديد' }}
        </button>
    </form>

    <hr>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th>الأيام</th>
                    <th>وقت البدء</th>
                    <th>وقت الإنتهاء</th>
                    <th>الحالة</th>
                    <th>العمليات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($schedules as $schedule)
                    <tr class="text-center">
                        <td>{{ $schedule->days }}</td>
                        <td>{{ App\Helpers\TimeHelper::formatTimeWithArabic($schedule->start) }}</td>
                        <td>{{ App\Helpers\TimeHelper::formatTimeWithArabic($schedule->end) }}</td>
                        <td>
                            @if ($schedule->status)
                                <span class="badge bg-success">مفتوح</span>
                            @else
                                <span class="badge bg-danger">مغلق</span>
                            @endif
                        </td>
                        <td>
                            <button wire:click="edit({{ $schedule->id }})" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
                            <button wire:click="delete({{ $schedule->id }})" class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد من أنك تريد حذف هذا الميعاد؟')"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
