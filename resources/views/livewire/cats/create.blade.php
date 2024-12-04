<div>
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Cat Form</h6>
            </div>
            <div class="card-body">
                <form wire:submit='createCats'>
                    <div class="form-group">
                        <label for="cat_name">Cat Name</label>
                        <input type="text" wire:model='cat_name'
                            class="form-control @error('cat_name') is-invalid @enderror" id="cat_name"
                            placeholder="Enter cat name" value="{{ old('cat_name') }}">
                        @error('cat_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="about">About Cat</label>
                        <input type="text" wire:model='about' class="form-control @error('about') is-invalid @enderror"
                            id="about" placeholder="Enter about cat" value="{{ old('about') }}">
                        @error('about')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category Cat</label>
                        <select wire:model="category_id" class="form-control @error('category_id') is-invalid @enderror"
                            id="category_id">
                            <option value="">Select a category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="cat_image">Cat Image</label>
                        <input type="file" wire:model='cat_image'
                            class="form-control @error('cat_image') is-invalid @enderror" id="cat_image"
                            accept="image/*">
                        @error('cat_image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        @if ($cat_image && $cat_image instanceof \Illuminate\Http\UploadedFile)
                        <img src="{{ $cat_image->temporaryUrl() }}" alt="Cat Preview" class="mt-2"
                            style="max-width: 200px;">
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>