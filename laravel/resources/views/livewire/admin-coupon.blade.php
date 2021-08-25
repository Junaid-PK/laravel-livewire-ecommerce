<div>
    
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header justify-content-between">
                <h2>Coupons</h2>
                @if (session()->has('message'))
                    <div class="alert alert-dismissible fade show alert-success" role="alert">
                        {{ session('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div>
                    <button class="btn-pill btn btn-primary" id="toggleme" wire:click.prevent='toggleModal'> Add
                        New</button>
                </div>
            </div>
            
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Code</th>                     
                            <th scope="col">Value</th>
                            <th scope="col">Cart Value</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated at</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coupons as $item)
                        <tr>
                            <td scope="row">{{$item->id}}</td>
                            <td>{{$item->code}}</td>
                            @if ($item->type == 'fixed')
                            <td>${{$item->value}}</td>
                            @else
                            <td>%{{$item->value}}</td>
                            @endif
                            <td>{{$item->cart_value}}</td> 
                            <td>{{$item->created_at}}</td> 
                            <td>{{$item->Updated_at}}</td> 
                            <td class="text-right">
                                <div class=" dropdown show d-inline-block widget-dropdown">
                                    <a class="dropdown-toggle icon-burger-mini" href="" role="button"
                                        id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" data-display="static"></a>
                                    <ul class="dropdown-menu dropdown-menu-right"
                                        aria-labelledby="dropdown-recent-order1">
                                        <li class="dropdown-item">
                                            <a href="#"
                                                wire:click.prevent="editCoupon({{ $item }})">Edit</a>
                                        </li>
                                        <li class="dropdown-item">
                                            <a href="#" wire:click.prevent="deleteCoupon({{ $item->id }})"
                                                class="text-danger">Delete</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>    
                        @endforeach                        
                    </tbody>
                </table>
            </div>
        </div>

    </div>

{{-- Form Model --}}
    <div class="modal fade" id="couponModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    @if ($showEditModel)
                        <h5 class="modal-title" id="exampleModalFormTitle">Edit Coupon</h5>
                    @else
                        <h5 class="modal-title" id="exampleModalFormTitle">Add Coupon</h5>
                    @endif
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="{{$showEditModel ? 'updateCoupon' : 'addCoupon'}}">
                        <div class="form-group">
                            <label for="">Coupon Code</label>
                            <input type="text" class="form-control" id="" placeholder="Enter Coupon Code" wire:model.defer='state.code'>
                            @error('code')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Enter Value</label>
                            <input type="number" step="any" class="form-control"  placeholder="Enter Coupon Value" wire:model.defer='state.value'>
                            @error('value')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Enter Cart Value</label>
                            <input type="number" step="any" class="form-control"  placeholder="Enter Coupon Cart Value" wire:model.defer='state.cart_value'>
                            @error('cart_value')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Select Coupon Type</label>
                            <select name="" id="" wire:model.defer='state.type'>
                                <option value="fixed">Fixed</option>
                                <option value="percent">Percentage</option>
                            </select>
                            @error('type')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        @if ($showEditModel)
                            <button type="submit" class="btn btn-primary">Update Coupon</button>
                        @else
                            <button type="submit" class="btn btn-primary">Add Coupon</button>
                        @endif
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Coupon</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are You Sure You want to Delete this Coupon ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-pill" wire:click.prevent='delete'>Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>
