@extends('layouts.admin')
@section('content')
<section class="content-header">
      <div class="row mb-2">
        <div class="col-sm-6">
        <h3>Edit Category Details</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.permissions.index')}}">Categories</a></li>
            <li class="breadcrumb-item active">Edit Category Details</li>
          </ol>
        </div>
      </div>
  </section>
  <!-- Main content -->

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} Categories
    </div>

    <div class="card-body">
        <form action="{{ route("vendor.categories.update", [$category->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="title">Name*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('category', isset($category) ? $category->name : '') }}" required>
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.permission.fields.title_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection