@extends('layouts.admin')
@section('content')
<section class="content-header">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h3>Show Order Details</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('admin.orders.index')}}">Orders</a></li>
                <li class="breadcrumb-item active">Order Details</li>
            </ol>
        </div>
    </div>
</section>
<!-- Main content -->

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} Order
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            Order ID
                        </th>
                        <td>
                            {{ $order->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Total Amount
                        </th>
                        <td>
                            {{ $order->total_amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Payment Mode
                        </th>
                        <td>
                            {{ $order->total_amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Order Status
                        </th>
                        <td>

                            <span class="badge badge-info">{{ $order->status_message }}</span>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>


    </div>
</div>
<div class="card">
    <div class="card-header">
        Order Details
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Payment">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.payment.fields.id') }}
                        </th>
                        <th>
                            Order No
                        </th>
                        <th>
                            Product Category
                        </th>
                        <th>
                            Product Name
                        </th>

                        <th>
                            Quantity
                        </th>
                        <th>
                            Size
                        </th>
                        <th>
                            Customization
                        </th>
                        <th>
                            Product Amount
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($order->products as $product)
                    <tr>
                        <td></td>
                        <td>{{ $order->id ?? '' }}</td>
                        <td>
                            {{ $order->tracking_no ?? '' }}
                        </td>
                        <td>
                            {{ $product->category->name ?? '' }}
                        </td>
                        <td>
                            {{ $product->name ?? '' }}
                        </td>
                        <td>
                            {{ $product->pivot->quantity ?? '' }}
                        </td>
                        <td>
                            {{ App\Models\Product::SIZE_SELECT[$product->pivot->size] }}
                        </td>
                        <td>
                            @if(isset($product->pivot->customization))
                            @foreach(json_decode($product->pivot->customization) as $key=>$item)
                            <div class="form-text" id="emailHelp">{{ App\Models\Product::CUSTOM_SELECT[$key] }}:
                                {{ App\Models\Product::OPTION_SELECT[$item] }}</div>

                            @endforeach
                            @else
                            None
                            @endif
                        </td>
                        <td>
                            ${{ $product->pivot->price ?? '' }}
                        </td>
                    </tr>@endforeach
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>
    </div>
</div>



@endsection