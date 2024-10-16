<div>
<form wire:submit.prevent="submit" style="max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; direction: rtl; text-align: right;">
    <div style="margin-bottom: 15px;">
        <input type="text" id="name" wire:model="name" required placeholder="الاسم" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
    </div>
    <div style="margin-bottom: 15px;">
        <input type="text" id="phone" wire:model="phone" required placeholder="رقم الهاتف" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
    </div>
    <div style="margin-bottom: 15px;">
        <input type="email" id="email" wire:model="email" required placeholder="البريد الإلكتروني" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
    </div>
    <div style="margin-bottom: 15px;">
        <textarea id="message" wire:model="message" required placeholder="الرسالة" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;"></textarea>
    </div>
    <button type="submit" style="width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 5px;">إرسال</button>
</form>
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
</div>
