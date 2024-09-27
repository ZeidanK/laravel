
<div>


<!-- Search Input Field -->


<!-- Sort Button -->

<!-- Checkbox for filtering guests who clicked the link -->
<div class="mb-4 border p-4 rounded" style="text-align: center;">
    <div class="flex justify-between">
        <div class="w-1/2 pr-2">
            <h3 class="font-bold mb-2" style="text-align: right;">تصفية الضيوف حسب النقر على الرابط</h3>
            <div>
                <label class="inline-flex items-center">
                    <input type="checkbox" wire:model="filterClickedYes" class="form-checkbox">
                    <span class="ml-2">نعم</span>
                </label>
                <label class="inline-flex items-center ml-4">
                    <input type="checkbox" wire:model="filterClickedNo" class="form-checkbox">
                    <span class="ml-2">لا</span>
                </label>
            </div>
        </div>
        <div class="w-1/2 pl-2">
            <h3 class="font-bold mb-2">تصفية الضيوف حسب تأكيد الحضور</h3>
            <div>
                <label class="inline-flex items-center">
                    <input type="checkbox" wire:model="filterAttending" class="form-checkbox">
                    <span class="ml-2">حاضر</span>
                </label>
                <label class="inline-flex items-center ml-4">
                    <input type="checkbox" wire:model="filterNotAttending" class="form-checkbox">
                    <span class="ml-2">غير حاضر</span>
                </label>
                <label class="inline-flex items-center ml-4">
                    <input type="checkbox" wire:model="filterNoResponse" class="form-checkbox">
                    <span class="ml-2">لم يجب</span>
                </label>
            </div>
        </div>
        <div class="w-1/3 pl-2">
            <div class="flex space-x-2">
                <button wire:click="downloadFullExcel" class="bg-blue-300 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded mb-2">تحميل الملف الكامل</button>
                <button wire:click="downloadFilteredExcel" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded mb-2">تحميل الملف المصفى</button>
            </div> </div>
    </div>
<div class="mb-4" style="direction: rtl;">
    <input type="text" wire:model="search" placeholder="ابحث عن ضيف..." class="border p-2 rounded w-full">
</div>
</div>
<table class="table-auto w-full text-center" style="direction: rtl;">
    <thead>
        <tr>
            <th class="px-4 py-2 text-lg">الرقم</th>
            <th class="px-4 py-2 cursor-pointer text-lg" wire:click="sortBy('first_name')">الاسم</th>
            <th class="px-4 py-2 cursor-pointer text-lg" wire:click="sortBy('last_name')">العائلة</th>
            <th class="px-4 py-2 cursor-pointer text-lg" wire:click="sortBy('phone_number')">رقم الهاتف</th>
            <th class="px-4 py-2 cursor-pointer text-lg" wire:click="sortBy('is_attending')">تأكيد الحضور</th>
            <th class="px-4 py-2 cursor-pointer text-lg" wire:click="sortBy('open_link')">نقر الرابط</th>
            <th class="px-4 py-2 text-lg">التعديل</th>
        </tr>
    </thead>
    <tbody>
        @if($guests!==null)
        @foreach($guests as $index => $guest)
            @if(($filterClickedYes && $guest->open_link == 1) || ($filterClickedNo && $guest->open_link == 0)|| ($filterAttending && $guest->is_attending == 1) || ($filterNotAttending && $guest->is_attending == 0) || ($filterNoResponse && $guest->is_attending == null))
                <tr>
                    <td class="border px-4 py-2 text-lg">{{ $index + 1 }}</td>
                    <td class="border px-4 py-2 text-lg">{{ $guest->first_name }}</td>
                    <td class="border px-4 py-2 text-lg">{{ $guest->last_name }}</td>
                    <td class="border px-4 py-2 text-lg">{{ $guest->phone_number }}</td>
                    <td class="border px-4 py-2 text-lg {{ $guest->is_attending == 1 ? 'bg-green-100' : ($guest->is_attending == 0 ? 'bg-red-100' : '') }}">
                        @if(is_null($guest->is_attending))
                            لم يجب
                        @elseif($guest->is_attending == 1)
                            حاضر
                        @elseif($guest->is_attending == 0)
                            غير حاضر
                        @else
                            لم يجب
                        @endif
                    </td>
                    <td class="border px-4 py-2 text-lg {{ $guest->open_link == 1 ? 'bg-green-100' : 'bg-red-100' }}">
                        @if($guest->open_link == 1)
                            قام بالنقر
                        @else
                            لم يقم بالنقر
                        @endif
                    </td>
                    <td class="border px-4 py-2 text-lg">
                        <button wire:click="edit({{ $guest->id }})" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">تعديل</button>
                    </td>
                </tr>
            @endif
        @endforeach
        @endif
    </tbody>
</table>
<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('guestUpdated', guests => {
            // Update the guests data in the component
            @this.set('guests', guests);
        });
    });
</script>
</div>
