<!-- resources/views/livewire/guest-table-display.blade.php -->

<div>
    {{-- Do your work, then step back. --}}
</div>

<!-- Search Input Field -->
<div class="mb-4">
    <input type="text" wire:model="search" placeholder="ابحث عن ضيف..." class="border p-2 rounded w-full">
</div>

<!-- Sort Button -->
<div class="mb-4">
    <button wire:click="sortTable" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">ترتيب</button>
</div>
<!-- Checkbox for filtering guests who clicked the link -->
<div class="mb-4">
    <label class="inline-flex items-center">
        <input type="checkbox" wire:model="filterClickedYes" class="form-checkbox" checked>
        <span class="ml-2">نعم</span>
    </label>
    <label class="inline-flex items-center ml-4">
        <input type="checkbox" wire:model="filterClickedNo" class="form-checkbox" checked>
        <span class="ml-2">لا</span>
    </label>
</div>
<table class="table-auto w-full">
    <thead>
        <tr>
            <th class="px-4 py-2">الاسم</th>
            <th class="px-4 py-2">العائلة</th>
            <th class="px-4 py-2">رقم الهاتف</th>
            <th class="px-4 py-2">تأكيد الحضور</th>
            <th class="px-4 py-2">الحذف</th>
            <th class="px-4 py-2">نقر الرابط</th>
            <th class="px-4 py-2">التعديل</th>
        </tr>
    </thead>
    <tbody>
        @foreach($guests as $guest)
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
                    <button wire:click="delete({{ $guest->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">حذف</button>
                </td>
                <td class="border px-4 py-2">
                    @if($guest->open_link == 1)
                        قام بالنقر
                    @else
                        لم يقم بالنقر
                    @endif
                </td>
            </tr>
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
