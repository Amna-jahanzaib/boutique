@extends('layouts.admin')
@section('content')
<section class="content-header">
      <div class="row mb-2">
        <div class="col-sm-6">
        <h3>Edit Product Details</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('vendor.products.index')}}">Products</a></li>
            <li class="breadcrumb-item active">Edit Product Details</li>
          </ol>
        </div>
      </div>
  </section>
  <!-- Main content -->

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} Product
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("vendor.products.update", [$product->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="roles">Category</label>
                <select class="form-control " name="category_id" id="category" required>
                    @foreach($categories as $id => $category)
                    <option value="{{ $category->id }} " {{  $product->category->id==$category->id ? 'selected' : '' }}>{{ $category->name }}</option>
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
                    id="name" value="{{ old('name', $product->name) }}" required>
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
                    name="small_description" id="small_description" value="{{ old('small_description',$product->small_description) }}" required>
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
                    id="description" required>{{$product->description}}</textarea>
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
                    name="original_price" id="original_price" value="{{ old('original_price', $product->original_price) }}" required>
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
                    name="selling_price" id="email" value="{{ old('selling_price',$product->selling_price) }}" required>
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
                    name="quantity" id="email" value="{{ old('quantity', $product->quantity) }}" required>
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
    
                @foreach(App\Models\Product::SIZE_SELECT as $id => $item)
                        <option value="{{ $id }}" {{ in_array($id, $product->size) ? 'selected' : '' }}>{{ $item }}</option>
                    @endforeach
                </select>
                @if($errors->has('roles'))
                    <div class="invalid-feedback">
                        {{ $errors->first('roles') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.roles_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="customizations">Customization</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('customization') ? 'is-invalid' : '' }}" name="customization[]" id="customization" multiple required>
                @foreach(App\Models\Product::CUSTOM_SELECT as $id => $item)
                <option value="{{ $id }}" {{ isset($product->customization)? in_array($id, $product->customization) ? 'selected' : '' :'' }}>{{ $item }}</option>
                    @endforeach
                
                </select>
                @if($errors->has('customization'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customization') }}
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group has-placeholder">
                        <label>Trending <span class="text-danger">*</span></label>
                        <div class="form-check ">
                            <input class="form-check-input" type="radio" id="trending" name="trending" value="1" {{ $product->trending=='1'? 'checked' : '' }} 
                                required>
                            <label class="form-check-label" for="trending">Trending</label>
                        </div>
                        <div class="form-check ">
                            <input class="form-check-input" type="radio" id="trending" name="trending" value="0" {{ $product->trending=='0'? 'checked' : '' }}
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
                            <input class="form-check-input" type="radio" id="featured" name="featured" value="1" {{ $product->featured=='1'? 'checked' : '' }} 
                                required>
                            <label class="form-check-label" for="featured">Featured</label>
                        </div>
                        <div class="form-check ">
                            <input class="form-check-input" type="radio" id="featured" name="featured" value="0" {{ $product->featured=='0'? 'checked' : '' }}
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
                            <input class="form-check-input" type="radio" id="status" name="status" value="1" {{ $product->status==1? 'checked' : '' }}  required>
                            <label class="form-check-label" for="status">Visible</label>
                        </div>
                        <div class="form-check ">
                            <input class="form-check-input" type="radio" id="status" name="status" value="0" {{ $product->status=='0'? 'checked' : '' }} required>
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
    success: function (file, response) {
        console.log(response)

        $('form').find('input[value="' + response.name + '"]').remove()    
      $('form').append('<input type="hidden" name="photo[]" multiple id="'+ response.original_name +'" value="' + response.name + '">')
    },
    removedfile: function (file,response) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        console.log(response)
        $('form').find('input[id="' + file.name + '"]').remove()    
        $('form').find('input[value="' + file.file_name + '"]').remove()    
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {

        @if(isset($product) && $product->photo)
        @foreach($product->images as $item)
      var file = {!! json_encode($item) !!}
      this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, '{{ $item->getUrl('thumb') }}')
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photo[]" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
        @endforeach
      @endif
    },
    error: function (file, response) {
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
