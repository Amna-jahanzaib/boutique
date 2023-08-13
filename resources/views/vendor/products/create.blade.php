@extends('layouts.admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h3>ADD Products</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('vendor.products.index')}}">Products</a></li>
                <li class="breadcrumb-item active">ADD Product</li>
            </ol>
        </div>
    </div>
</section>
<!-- Main content -->
<div class="card">
    <div class="card-header">
        Add New Product
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("vendor.products.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="roles">Category</label>
                <select class="form-control " name="category_id" id="category" required>
                    @foreach($categories as $id => $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('category'))
                <div class="invalid-feedback">
                    {{ $errors->first('category') }}
                </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.roles_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="name">Product Name</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                    id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                <div class="invalid-feedback">
                    {{ $errors->first('name') }}
                </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="des">Small Description</label>
                <input class="form-control {{ $errors->has('small_description') ? 'is-invalid' : '' }}" type="text"
                    name="small_description" id="email" value="{{ old('small_description') }}" required>
                @if($errors->has('small_description'))
                <div class="invalid-feedback">
                    {{ $errors->first('small_description') }}
                </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="description">Description</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description"
                    id="description" required></textarea>
                @if($errors->has('description'))
                <div class="invalid-feedback">
                    {{ $errors->first('description') }}
                </div>
                @endif
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label class="required" for="original_price">Orignal Price</label>
                <input class="form-control {{ $errors->has('original_price') ? 'is-invalid' : '' }}" type="number"
                    name="original_price" id="original_price" value="{{ old('original_price') }}" required>
                @if($errors->has('original_price'))
                <div class="invalid-feedback">
                    {{ $errors->first('original_price') }}
                </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="des">Selling Price</label>
                <input class="form-control {{ $errors->has('selling_price') ? 'is-invalid' : '' }}" type="number"
                    name="selling_price" id="email" value="{{ old('selling_price') }}" required>
                @if($errors->has('selling_price'))
                <div class="invalid-feedback">
                    {{ $errors->first('selling_price') }}
                </div>
                @endif
                <span class="help-block"> </span>
            </div>
            <div class="form-group">
                <label class="required" for="quantity">Quantity</label>
                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number"
                    name="quantity" id="email" value="{{ old('quantity') }}" required>
                @if($errors->has('quantity '))
                <div class="invalid-feedback">
                    {{ $errors->first('quantity') }}
                </div>
                @endif
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label class="required" for="size">Size</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('size') ? 'is-invalid' : '' }}" name="size[]" id="size" multiple required>
                <option value="0" >Small</option>
                <option value="1" >Medium</option>
                <option value="2" >Large</option>
                <option value="3" >Extra Large</option>

                </select>
                @if($errors->has('size'))
                    <div class="invalid-feedback">
                        {{ $errors->first('size') }}
                    </div>
                @endif
            </div>
 

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group has-placeholder">
                        <label>Trending <span class="text-danger">*</span></label>
                        <div class="form-check ">
                            <input class="form-check-input" type="radio" id="trending" name="trending" value="1"
                                required>
                            <label class="form-check-label" for="trending">Trending</label>
                        </div>
                        <div class="form-check ">
                            <input class="form-check-input" type="radio" id="trending" name="trending" value="0"
                                required>
                            <label class="form-check-label" for="trending">Not Trending</label>
                        </div>
                        @if($errors->has('trending'))
                        <div class="invalid-feedback">
                            {{ $errors->first('trending') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group has-placeholder">
                        <label>Featured <span class="text-danger">*</span></label>
                        <div class="form-check ">
                            <input class="form-check-input" type="radio" id="featured" name="featured" value="1"
                                required>
                            <label class="form-check-label" for="featured">Featured</label>
                        </div>
                        <div class="form-check ">
                            <input class="form-check-input" type="radio" id="featured" name="featured" value="0"
                                required>
                            <label class="form-check-label" for="featured">Not Featured</label>
                        </div>
                        @if($errors->has('featured'))
                        <div class="invalid-feedback">
                            {{ $errors->first('featured') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group has-placeholder">
                        <label>Status <span class="text-danger">*</span></label>
                        <div class="form-check ">
                            <input class="form-check-input" type="radio" id="status" name="status" value="1" required>
                            <label class="form-check-label" for="status">Visible</label>
                        </div>
                        <div class="form-check ">
                            <input class="form-check-input" type="radio" id="status" name="status" value="0" required>
                            <label class="form-check-label" for="featured">Hidden</label>
                        </div>
                        @if($errors->has('status'))
                        <div class="invalid-feedback">
                            {{ $errors->first('status') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="required" for="photo">{{ trans('cruds.user.fields.photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                </div>
                @if($errors->has('photo'))
                <div class="invalid-feedback">
                    {{ $errors->first('photo') }}
                </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.photo_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
Dropzone.options.photoDropzone = {
    url: '{{ route('vendor.products.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 5,
    addRemoveLinks: true,
    headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
        size: 2,
        width: 4096,
        height: 4096
    },
    success: function(file, response) {
        $('form').find('input[name="photo"]').remove()
        $('form').append('<input type="hidden" name="photo[]" multiple value="' + response.name + '">')
    },
    removedfile: function(file) {
        file.previewElement.remove()
        if (file.status !== 'error') {
            $('form').find('input[name="photo"]').remove()
            this.options.maxFiles = this.options.maxFiles + 1
        }
    },
    init: function() {
        @if(isset($product) && $product->photo)
        var file = {
            !!json_encode($product->photo) !!
        }
        this.options.addedfile.call(this, file)
        this.options.thumbnail.call(this, file, '{{ $product->photo->getUrl('thumb') }}')
        file.previewElement.classList.add('dz-complete')
        $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
        this.options.maxFiles = this.options.maxFiles - 1
        @endif
    },
    error: function(file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection