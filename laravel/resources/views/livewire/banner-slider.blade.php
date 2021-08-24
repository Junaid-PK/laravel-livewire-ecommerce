<div class="row">
    <div class="col-lg-12">
        <!-- Recent Order Table -->
        <div class="card card-table-border-none" id="recent-orders">
            <div class="card-header justify-content-between">
                <h2>Home Page Banners</h2>
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
                <table class="table card-table table-responsive table-responsive-large" style="width: 100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Banner Image</th>
                            <th>Banner Title</th>
                            <th>Banner Subtitle</th>
                            <th>Banner Price</th>
                            <th class="d-none d-md-table-cell">Created At</th>
                            <th class="d-none d-md-table-cell">Updated At</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banners as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>
                                    <a class="text-dark" href=""> <img
                                            src="{{ asset('assets/images/banners') }}/{{ $item->image }}" width="60px"
                                            alt=""></a>
                                </td>
                                <td class="d-none d-md-table-cell">{{ $item->title }}</td>
                                <td class="d-none d-md-table-cell">{{ $item->subtitle }}</td>
                                <td class="d-none d-md-table-cell">{{ $item->price }}</td>
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
                                                    wire:click.prevent="editBanner({{ $item }})">Edit</a>
                                            </li>
                                            <li class="dropdown-item">
                                                <a href="#" wire:click.prevent="deleteBanner({{ $item->id }})"
                                                    class="text-danger">Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    {{-- {{ $categories->links() }} --}}
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="bannerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    @if ($showEditModel)
                        <h5 class="modal-title" id="exampleModalFormTitle">Edit Banner</h5>
                    @else
                        <h5 class="modal-title" id="exampleModalFormTitle">Add Banner</h5>
                    @endif
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="{{$showEditModel ? 'updateBanner' : 'addBanner'}}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Banner Title</label>
                            <input type="text" class="form-control" placeholder="Enter Title"
                                wire:model.defer='state.title'>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Banner Subtitle</label>
                            <input type="text" class="form-control" id="exampleInputPassword1"
                                placeholder="Enter Banner Sub-Title" wire:model.defer='state.subtitle'>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Enter Price</label>
                            <input type="text" class="form-control" id="exampleInputPassword1"
                                placeholder="Enter Banner Sub-Title" wire:model.defer='state.price'>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Choose Banner Image</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1"
                                wire:model.defer='image'>
                            @if ($image)
                                <img src="{{ $image->temporaryUrl() }}" alt="" width="120px">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect12">Select Status</label>
                            <select class="form-control" id="exampleFormControlSelect12"
                                wire:model.defer='state.banner_status'>
                                <option value="instock">In Stock</option>
                                <option value="outofstock">Out Of Stock</option>
                            </select>
                        </div>
                        @if ($showEditModel)
                            <button type="submit" class="btn btn-primary">Update Banner</button>
                        @else
                            <button type="submit" class="btn btn-primary">Add Banner</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Delete Banner</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are You Sure You want to Delete this Banner ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-pill" wire:click.prevent='delete'>Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>
