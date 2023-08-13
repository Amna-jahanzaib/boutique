@extends('layouts.admin')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="row mb-2">
        <div class="col-sm-6">
        <h3>Product Details</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('vendor.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Product Details</li>
          </ol>
        </div>
      </div>
  </section>
  <!-- Main content -->

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} Product
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ url()->previous() }}">
                Go Back
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <td>
                            {{ $product->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Name
                        </th>
                        <td>
                            {{ $product->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Category
                        </th>
                        <td>
                        <span class="label label-info">{{ $product->category->name }}</span>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Selling Price
                        </th>
                        <td>
                            {{ $product->selling_price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Orignal Price
                        </th>
                        <td>
                           {{$product->original_price}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Featured 
                        </th>
                        <td>
                           {{$product->featured?'Featured':'Not Featured'}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Trending
                        </th>
                        <td>
                           {{$product->trending?'Trending':'Not Trending'}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Status
                        </th>
                        <td>
                           {{$product->status?'Visible':'Hidden'}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Sizes
                        </th>
                        <td>
                        @foreach($product->size as $key => $i)
                                <span class="label label-primary">{{ App\Models\Product::SIZE_SELECT[$i] }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Image
                        </th>
                        <td>
                            @if($product->photo)
                            @foreach($product->images as $image)
                                <a href="{{ $image->getUrl() }}" target="_blank">
                                    <img src="{{ $image->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                                @endforeach
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ url()->previous() }}">
                    Go Back
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
