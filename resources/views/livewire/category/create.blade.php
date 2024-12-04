<div>
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Category Form</h6>
            </div>
            <div class="card-body">
                <form wire:submit='createCategory'>
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input type="text" wire:model='category_name'
                            class="form-control @error('category_name') is-invalid @enderror" id="category_name"
                            placeholder="Enter category name" value="{{ old('category_name') }}">
                        @error('category_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>