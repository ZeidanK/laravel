
<div style="border: 1px solid #ead3d3; padding: 10px;">

    <h4 class="h6 text-end" style="direction: rtl; text-align: right;">استيراد ملف الضيوف</h4>

    {{-- عرض رسائل الفلاش --}}
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form wire:submit.prevent="importfile" method="post" enctype="multipart/form-data">
        @csrf
        <div class="input-group" style="max-width: 400px;">
            <input type="file" wire:model="file" class="form-control" />
            <button type="submit" class="btn btn-primary btn-sm rounded">استيراد الملف</button>
        </div>
        @error('file') <span class="text-danger">{{ $message }}</span> @enderror
    </form>

</div>


