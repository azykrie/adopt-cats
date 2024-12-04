<div>
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <a href="{{route('category.create')}}" class="btn btn-primary">Create</a>
                    </div>
                    <form class="form-inline">
                        <div class="input-group input-group-sm">
                            <input wire:model.live='search' type="text" class="form-control" placeholder="Search"
                                aria-label="Search" aria-describedby="basic-addon2">
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Category Name</th>
                                <th style="width: 20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$item->category_name}}</td>
                                <td>
                                    <a href="{{route('category.edit', $item->id)}}" class="btn btn-warning btn-sm">Edit</a>
                                    <button wire:click="deleteCategory({{$item->id}})"
                                        wire:confirm="Are you sure you want to delete this user?"
                                        class="btn btn-danger btn-sm">Hapus</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$category->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
