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
                    <button class="btn-pill btn btn-primary" id="toggleme" wire:click.prevent='toggleModal'> Add
                        New</button>
                </div>
            </div>
            <div class="pt-0 pb-5 card-body">
                <table class="table card-table table-responsive table-responsive-large" style="width:100%">



                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th class="d-none d-md-table-cell">Image</th>
                            <th class="d-none d-md-table-cell">Regular Price</th>
                            <th class="d-none d-md-table-cell">Sale Price</th>
                            <th class="d-none d-md-table-cell">SKU</th>
                            <th class="d-none d-md-table-cell">Quantity</th>
                            <th class="d-none d-md-table-cell">Category</th>
                            <th class="d-none d-md-table-cell">Created_at</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>
                                    <a class="text-dark" href=""> {{ $item->name }}</a>
                                </td>
                                <td class="d-none d-md-table-cell"><img
                                        src="{{ asset('assets/images/products') }}/{{ $item->image }}"
                                        style="width: 60px" alt=""></td>
                                <td class="d-none d-md-table-cell">${{ $item->regular_price }}</td>
                                <td class="d-none d-md-table-cell">${{ $item->sale_price }}</td>
                                <td class="d-none d-md-table-cell">{{ $item->SKU }}</td>
                                <td class="d-none d-md-table-cell">{{ $item->quantity }}</td>
                                <td class="d-none d-md-table-cell">{{ $item->category->name }}</td>
                                <td class="d-none d-md-table-cell">{{ $item->created_at }}</td>
                                <td>
                                    <span class="badge badge-success">{{ $item->stock_status }}</span>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown show d-inline-block widget-dropdown">
                                        <a class="dropdown-toggle icon-burger-mini" href="" role="button"
                                            id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false" data-display="static"></a>
                                        <ul class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdown-recent-order1">
                                            <li class="dropdown-item">
                                                <a href="#"
                                                    wire:click.prevent='editProduct({{ $item }})'>Edit</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="#" class="text-danger"
                                                    wire:click.prevent='deleteProduct({{ $item->id }})'>delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                    </tbody>
                    @endforeach
                </table>
                {{ $products->links() }}
            </div>
        </div>
    </div>

    {{-- Add new Product Modal --}}
    <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLarge"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    @if ($showEditModel)
                        <h5 class="modal-title" id="exampleModalFormTitle">Edit Product</h5>
                    @else
                        <h5 class="modal-title" id="exampleModalFormTitle">Add Product</h5>
                    @endif
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-default">

                                <div class="card-body">
                                    <form
                                        wire:submit.prevent="{{ $showEditModel ? 'updateProduct' : 'addProduct' }}">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Product Name</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                                placeholder="Enter Product Name" wire:model.defer='state.name'>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlPassword">Product Slug</label>
                                            <input type="text" class="form-control" id="exampleFormControlPassword"
                                                placeholder="Enter Product Slug" wire:model.defer='state.slug'>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Product Description (Short)</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput2"
                                                placeholder="Enter Product Name" wire:model.defer='state.shortDesc'>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Product Regular Price</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput3"
                                                placeholder="Enter Product Price" wire:model.defer='state.regularPrice'>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Product Sale Price (OPTIONAL)</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput4"
                                                placeholder="Enter Product Sale Price"
                                                wire:model.defer='state.salePrice'>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Product SKU</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput5"
                                                placeholder="Enter Product Sku" wire:model.defer='state.sku'>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Make Featured</label>
                                            <select class="form-control" id="exampleFormControlSelect12"
                                                wire:model.defer='state.featured'>
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Status</label>
                                            <select class="form-control" id="exampleFormControlSelect12"
                                                wire:model.defer='state.stock_status'>
                                                <option value="instock">In Stock</option>
                                                <option value="outofstock">Out Of Stock</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Product Quantity</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput7"
                                                placeholder="Enter Product Quantity" wire:model.defer='state.quantity'>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect12">Select Category</label>
                                            <select class="form-control" id="exampleFormControlSelect12"
                                                wire:model.defer='state.category'>
                                                @foreach ($categories as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Product Description</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                                wire:model.defer='state.desc'></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Choose Product Image</label>
                                            <input type="file" class="form-control-file" id="exampleFormControlFile1"
                                                wire:model.defer='image'>
                                            @if ($image)
                                                <img src="{{ $image->temporaryUrl() }}" alt="" width="120px">
                                            @endif
                                        </div>
                                        <div class="pt-5 mt-4 form-footer border-top">
                                            @if ($showEditModel)
                                                <button type="submit" class="btn btn-primary">Update Product</button>
                                            @else
                                                <button type="submit" class="btn btn-primary">Add Product</button>
                                            @endif
                                            <button type="submit" class="btn btn-secondary btn-default">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are You Sure You want to Delete this Product ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-pill"
                        wire:click.prevent='delete'>Delete</button>
                </div>
            </div>
        </div>
    </div>
        </div>
