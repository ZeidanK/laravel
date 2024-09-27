<div>
<form wire:submit.prevent="submit" style="max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; direction: rtl; text-align: right;">
    <div style="margin-bottom: 15px;">
        <label for="name" style="display: block; margin-bottom: 5px; font-weight: bold; color: #333;">الاسم:</label>
        <input type="text" id="name" wire:model="name" required placeholder="أدخل اسمك" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
    </div>
    <div style="margin-bottom: 15px;">
        <label for="phone" style="display: block; margin-bottom: 5px; font-weight: bold; color: #333;">رقم الهاتف:</label>
        <input type="text" id="phone" wire:model="phone" required placeholder="أدخل رقم هاتفك" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
    </div>
    <div style="margin-bottom: 15px;">
        <label for="email" style="display: block; margin-bottom: 5px; font-weight: bold; color: #333;">البريد الإلكتروني:</label>
        <input type="email" id="email" wire:model="email" required placeholder="أدخل بريدك الإلكتروني" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
    </div>
    <div style="margin-bottom: 15px;">
        <label for="message" style="display: block; margin-bottom: 5px; font-weight: bold; color: #333;">الرسالة:</label>
        <textarea id="message" wire:model="message" required placeholder="أدخل رسالتك" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;"></textarea>
    </div>
    <button type="submit" style="width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 5px;">إرسال</button>
</form>
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
</div>
