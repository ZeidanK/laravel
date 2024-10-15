<div style="border: 1px solid #ccc; padding: 20px; direction: rtl;">
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <div style="flex: 1; margin-right: 10px;">
            <livewire:import-guests-file :event="$event"/>
        </div>
        @if($isAdmin)
            <div style="flex: 1; border: 1px solid #ccc; padding: 10px; direction: rtl; text-align: right;">
                <button wire:click="toggleAdminMenu" style="background-color: #007BFF; color: white; padding: 10px 20px; border: none; cursor: pointer; border-radius: 10px;">إدارة</button>
                @if($showAdminMenu)
                    <div style="margin-top: 10px;">
                        <select wire:model="selectedUser" style="margin-bottom: 10px; padding: 5px;">
                            <option value="">اختر مستخدم</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <select wire:model="selectedEvent" style="margin-bottom: 10px; padding: 5px;">
                            <option value="">اختر حدث</option>
                            @foreach($events as $event)
                                <option value="{{ $event->id }}">{{ $event->id }}</option>
                            @endforeach
                        </select>
                        <button wire:click="updateEvent" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; cursor: pointer; border-radius: 10px;">تحديث الحدث</button>
                    </div>
                @endif
            </div>
        @endif
    </div>

    @if(1)
        <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 20px; direction: rtl; text-align: right;">
            <h1 style="font-size: 18px;">إضافة ضيف جديد</h1>
            <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                <input type="text" wire:model="newGuest.first_name" placeholder="الاسم الأول" style="text-align: right; width: 32%; border: 1px solid #ccc; padding: 5px;">
                <input type="text" wire:model="newGuest.last_name" placeholder="اسم العائلة" style="text-align: right; width: 32%; border: 1px solid #ccc; padding: 5px;">
                <input type="text" wire:model="newGuest.phone_number" placeholder="رقم الهاتف" style="text-align: right; width: 32%; border: 1px solid #ccc; padding: 5px;">
            </div>
            <button wire:click="saveNewGuest" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; cursor: pointer; border-radius: 10px; float: left;">حفظ</button>
            @if($errors->any())
                <div style="color: red;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    @endif

    <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 20px;">
        <input type="text" wire:model="search" placeholder="بحث..." style="width: 100%; padding: 10px;">
        {{-- <div style="margin-top: 10px;">
            <strong>Is Admin:</strong> {{ $isAdmin ? 'Yes' : 'No' }}
            <string>event:</string> {{ $event->id }}
        </div> --}}
    </div>

    <table style="width: 100%; border-collapse: collapse; border: 1px solid #ccc;">
        <thead>
            <tr>
                <th style="border: 1px solid #ccc; text-align: center; vertical-align: middle;">#</th>
                <th wire:click="sortBy('first_name')" style="border: 1px solid #ccc; text-align: center; vertical-align: middle; cursor: pointer;">الاسم الأول</th>
                <th wire:click="sortBy('last_name')" style="border: 1px solid #ccc; text-align: center; vertical-align: middle; cursor: pointer;">اسم العائلة</th>
                <th wire:click="sortBy('phone_number')" style="border: 1px solid #ccc; text-align: center; vertical-align: middle; cursor: pointer;">رقم الهاتف</th>
                <th style="border: 1px solid #ccc; text-align: center; vertical-align: middle;">الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($guests as $index => $guest)
            <tr>
                <td style="font-size: 18px; border: 1px solid #ccc; text-align: center; vertical-align: middle; {{ $guest->has_error ? 'background-color: red;' : '' }}">{{ $index + 1 }}</td>
                <td style="font-size: 18px; border: 1px solid #ccc; text-align: center; vertical-align: middle; {{ $guest->has_error ? 'background-color: red;' : '' }}">{{ $guest->first_name }}</td>
                <td style="font-size: 18px; border: 1px solid #ccc; text-align: center; vertical-align: middle; {{ $guest->has_error ? 'background-color: red;' : '' }}">{{ $guest->last_name }}</td>
                <td style="font-size: 18px; border: 1px solid #ccc; text-align: center; vertical-align: middle; {{ $guest->has_error ? 'background-color: red;' : '' }}">{{ $guest->phone_number }}</td>
                <td style="border: 1px solid #ccc; text-align: center; vertical-align: middle;">
                    <button wire:click="editGuest({{ $guest->id }})" style="background-color: #008CBA; color: white; padding: 5px 10px; border: none; cursor: pointer; border-radius: 5px;">تعديل</button>
                    <button wire:click="deleteGuest({{ $guest->id }})" style="background-color: #f44336; color: white; padding: 5px 10px; border: none; cursor: pointer; border-radius: 5px;">حذف</button>
                </td>
            </tr>
            @if($isEditing && $editingGuest->id == $guest->id)
                <tr>
                    <td colspan="5" style="border: 1px solid #ccc; text-align: center; vertical-align: middle;">
                        <div style="border: 1px solid #ccc; padding: 10px; margin-top: 10px;">
                            <h3 style="font-size: 16px; text-align: right;">تعديل الضيف</h3>
                            <input type="text" wire:model="editingGuest.first_name" placeholder="الاسم الأول" style="margin-bottom: 10px;">
                            <input type="text" wire:model="editingGuest.last_name" placeholder="اسم العائلة" style="margin-bottom: 10px;">
                            <input type="text" wire:model="editingGuest.phone_number" placeholder="رقم الهاتف" style="margin-bottom: 10px;">
                            <button wire:click="saveGuest" style="background-color: #81C784; color: white; padding: 10px 20px; border: none; cursor: pointer; border-radius: 10px;">حفظ</button>
                            <button wire:click="cancelEdit" style="background-color: #E57373; color: white; padding: 10px 20px; border: none; cursor: pointer; border-radius: 10px;">إلغاء</button>
                            @if($errors->any())
                                <div style="color: red;">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </td>
                </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>
