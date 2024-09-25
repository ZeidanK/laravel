{{-- The Master doesn't talk, he acts. --}}
<div class="container mt-5">
    <div class="row ">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-header">
                    <h4>Import Guest File</h4>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="importFile" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group">

                            <input type="file" name="import_file"  class="form-control"  />
                            <button type="submit" class="btn btn-primary">Import File</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


