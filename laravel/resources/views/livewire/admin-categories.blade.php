<div class="row">
    <div class="col-lg-12">
        <!-- Recent Order Table -->
        <div class="card card-table-border-none" id="recent-orders">
            <div class="card-header justify-content-between">
                <h2>Recent Orders</h2>
                @if (session()->has('message'))
                    <div class="alert alert-dismissible fade show alert-success" role="alert">
                        {{ session('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div>
                    <button class="btn-pill btn btn-primary" id="toggleme" wire:click.prevent='toggleModel'> Add
                        New</button>
                </div>
            </div>
            <div class="pt-0 pb-5 card-body">
                <table class="table card-table table-responsive table-responsive-large" style="width: 100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Category Slug</th>
                            <th class="d-none d-md-table-cell">Created At</th>
                            <th class="d-none d-md-table-cell">Updated At</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>
                                    <a class="text-dark" href=""> {{ $item->name }}</a>
                                </td>
                                <td>
                                    <a class="text-dark" href=""> {{ $item->slug }}</a>
                                </td>
                                <td class="d-none d-md-table-cell">{{ $item->created_at }}</td>
                                <td class="d-none d-md-table-cell">{{ $item->updated_at }}</td>
                                <td class="text-right">
                                    <div class=" dropdown show d-inline-block widget-dropdown">
                                        <a class="dropdown-toggle icon-burger-mini" href="" role="button"
                                            id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false" data-display="static"></a>
                                        <ul class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdown-recent-order1">
                                            <li class="dropdown-item">
                                                <a href="#"
                                                    wire:click.prevent="editCategory({{ $item }})">Edit</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="#" wire:click.prevent="deleteCategory({{$item->id}})" class="text-danger">Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
    
    {{-- Form Model --}}
    <div class="modal fade" id="exampleModalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    @if ($showEditModel)
                    <h5 class="modal-title" id="exampleModalFormTitle">Edit Category</h5>
                    @else
                    <h5 class="modal-title" id="exampleModalFormTitle">Add Category</h5>
                    @endif
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="{{ $showEditModel ? 'updateCategory' : 'addCategory' }}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Enter Category" wire:model.defer='state.name'>
                            
                            @error('c_name')<div class="alert alert-danger">
                                {{ $message }}
                                </div>
                                @enderror
                                
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Category Slug</label>
                                <input type="text" class="form-control" id="exampleInputPassword1"
                                placeholder="Enter CategorySlug" wire:model.defer='state.slug'>
                                @error('c_slug')<div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        @if($showEditModel)
                        <button type="submit" class="btn btn-primary">Update Category</button>
                        @else
                        <button type="submit" class="btn btn-primary">Add Category</button>
                        @endif
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    
    
    <div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are You Sure You want to Delete this Category ?
                </div>
                <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary btn-pill" wire:click.prevent='delete'>Delete</button>
        </div>
        </div>
    </div>
</div>
</div>