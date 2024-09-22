
<div>


<!-- Search Input Field -->
<div class="mb-4">
    <input type="text" wire:model="search" placeholder="ابحث عن ضيف..." class="border p-2 rounded w-full">
</div>

<!-- Sort Button -->

<!-- Checkbox for filtering guests who clicked the link -->
<div class="mb-4 border p-4 rounded">
    <h3 class="font-bold mb-2">تصفية الضيوف حسب النقر على الرابط</h3>
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

    <h3 class="font-bold mb-2 mt-4">تصفية الضيوف حسب تأكيد الحضور</h3>
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
<table class="table-auto w-full">
    <thead>
        <tr>
            <th class="px-4 py-2 cursor-pointer" wire:click="sortBy('first_name')">الاسم</th>
            <th class="px-4 py-2 cursor-pointer" wire:click="sortBy('last_name')">العائلة</th>
            <th class="px-4 py-2 cursor-pointer" wire:click="sortBy('phone_number')">رقم الهاتف</th>
            <th class="px-4 py-2 cursor-pointer" wire:click="sortBy('is_attending')">تأكيد الحضور</th>

            <th class="px-4 py-2 cursor-pointer" wire:click="sortBy('open_link')">نقر الرابط</th>
            <th class="px-4 py-2">التعديل</th>
        </tr>
    </thead>
    <tbody>
        @foreach($guests as $guest)
            @if(($filterClickedYes && $guest->open_link == 1) || ($filterClickedNo && $guest->open_link == 0)|| ($filterAttending && $guest->is_attending == 1) || ($filterNotAttending && $guest->is_attending == 0) || ($filterNoResponse && $guest->is_attending == null))
                <tr>
                    <td class="border px-4 py-2">{{ $guest->first_name }}</td>
                    <td class="border px-4 py-2">{{ $guest->last_name }}</td>
                    <td class="border px-4 py-2">{{ $guest->phone_number }}</td>
                    <td class="border px-4 py-2">
                        @if($guest->is_attending == 1)
                            حاضر
                        @elseif($guest->is_attending == 0)
                            غير حاضر
                        @else
                            لم يجب
                        @endif
                    </td>

                    <td class="border px-4 py-2">
                        @if($guest->open_link == 1)
                            قام بالنقر
                        @else
                            لم يقم بالنقر
                        @endif
                    </td>
                    <td class="border px-4 py-2">
                        <button wire:click="edit({{ $guest->id }})" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">تعديل</button>
                    </td>
                </tr>
            @endif
        @endforeach
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
