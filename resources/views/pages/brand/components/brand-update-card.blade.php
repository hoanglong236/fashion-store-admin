<div class="card">
    <div class="card-header">
        <span class="card-title--medium">Update brand</span>
    </div>
    <form action="{{ route('catalog.brand.update.handler', $brand->id) }}" method="post" enctype="multipart/form-data"
        class="form-horizontal">
        @csrf
        @method('PUT')
        <div class="card-body card-block">
            <div class="form-group">
                <label for="brandName" class=" form-control-label">Brand name</label>
                <input id="brandName" type="text" name="name" value="{{ $brand->name }}" class="form-control"
                    required>
                @error('name')
                    <div class="alert alert-danger mt-1" role="alert">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="brandSlug" class="form-control-label">Brand slug</label>
                <input id="brandSlug" type="text" name="slug" value="{{ $brand->slug }}" class="form-control">
                @error('slug')
                    <div class="alert alert-danger mt-1" role="alert">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="brandLogo" class=" form-control-label">New brand logo?</label>
                <input id="brandLogo" type="file" name="logo" class="form-control-file">
                @error('logo')
                    <div class="alert alert-danger mt-1" role="alert">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            @include('shared.components.buttons.submit-button')
            @include('shared.components.buttons.reset-button')
        </div>
    </form>
</div>
