<div>
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            @if (session()->has('message'))
                <div class="alert alert-dismissible fade show alert-success" role="alert">
                    {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <form wire:submit.prevent='updateCategory' class="form form-horizontal">
                <h1>Manage Home Categories</h1>
                <br>
                <br>
                <br>
                <br>
                <div class="form-group">
                    <label for="">Choose Categories</label>
                    <div class="selectbox" wire:ignore>
                        <select name="categories[]" class="sel_category form-control" multiple="multiple" wire:model='selected_category'>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <br>
                <div class="form-group">
                    <label for="">No of Products</label>
                    <input type="text" class="col-md-3"  wire:model='noofproducts'>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
        <div class="col-lg-3"></div>
    </div>
</div>
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.sel_category').select2();
            $('.sel_category').on('change', function(e) {
                var data = $('.sel_category').select2('val');
                @this.set('selected_category', data);
            });
        });
    </script>
@endpush
