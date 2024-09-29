{{-- <div style="border: 1px solid black; padding: 20px;">
    {{-- توقف عن محاولة التحكم. --}}
    {{-- <form wire:submit.prevent="register">
        <div>
            <label for="name">الاسم</label>
            <input type="text" id="name" wire:model="name">
            @error('name') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="email">البريد الإلكتروني</label>
            <input type="email" id="email" wire:model="email">
            @error('email') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="password">كلمة المرور</label>
            <input type="password" id="password" wire:model="password">
            @error('password') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="password_confirmation">تأكيد كلمة المرور</label>
            <input type="password" id="password_confirmation" wire:model="password_confirmation">
            @error('password_confirmation') <span class="error">{{ $message }}</span> @enderror
        </div>

        <button type="submit">تسجيل</button>
    </form>

    <div style="margin-top: 20px;">
        @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
    </div>
</div> --}}
@livewireStyles
@livewireScripts --}}
