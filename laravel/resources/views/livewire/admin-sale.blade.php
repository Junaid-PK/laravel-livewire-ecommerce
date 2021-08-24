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
            <form wire:submit.prevent='updateSale' class="form form-horizontal">
                <h1>Manage Sale</h1>
                <br>
                <br>
                <br>
                <br>
                <div class="form-group">
                    <label for="">Sale</label>
                    <div class="selectbox">
                        <select class="sel_category form-control" wire:model='status'>

                                <option value="0">In Active</option>
                                <option value="1">Active</option>

                        </select>
                    </div>
                </div>
                <br>
                <br>
                <div class="form-group">
                    <label for="">Sale Date</label>
                    <input type="text" class="col-md-3" id="sale-date" placeholder="YYYY/MM/DD H:M:S" wire:model='sale_date'>
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
    <script>
        $(function(){
            $('#sale-date').datetimepicker({
                format: 'Y-MM-DD h:m:s'
            }).on('dp.change',function(e){
                var data = $("#sale-dat").val();
                @this.set('sale_date',data);
            });
        });
    </script>
@endpush