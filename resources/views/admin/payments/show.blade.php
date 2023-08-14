@extends('layouts.admin')
@section('content')



<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="row p-5">
      
              <div class="col-md-6">
                            <img src="{{asset('img/sitelogo.png')}}">
                        </div>

                        <div class="col-md-6 text-right">
                            <p class="font-weight-bold mb-1">Invoice #{{$payment->id}}</p>
                            <p class="text-muted">Due to: {{$payment->created_at->format('d/M/Y')}}</p>
                        </div>
                    </div>

                    <hr class="my-5">

                    <div class="row pb-5 p-5">
                        <div class="col-md-6">
                            <p class="font-weight-bold mb-4">Client Information</p>
                            <p class="mb-1">{{ $payment->user->name ?? '' }}, {{ $payment->user->customer->phone ?? '' }}</p>
                            <p>Address: {{ $payment->user->customer->address ?? '' }}</p>
                            <p class="mb-1">{{ $payment->user->customer->city ?? '' }}, {{ $payment->user->customer->country ?? '' }}</p>
                            <p class="mb-1">Email: {{ $payment->user->email ?? '' }}</p>
                        </div>

                        <div class="col-md-6 text-right">
                            <p class="font-weight-bold mb-4">Payment Details</p>
                            <p class="mb-1"><span class="text-muted">Payment ID: </span> PAYMENT_{{ $payment->id ?? '' }}</p>
                            <p class="mb-1"><span class="text-muted">Bookind ID: </span> {{ $payment->order->tracking_no ?? '' }}</p>
                            <p class="mb-1"><span class="text-muted">Payment Type: </span> {{ $payment->type ?? '' }}</p>
                            <p class="mb-1"><span class="text-muted">Name: </span> {{ $payment->user->name ?? '' }}</p>
                        </div>
                    </div>

                    <div class="row p-5">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th class="border-0 text-uppercase small font-weight-bold">#
                        </th>
                        
                        
                        <th class="border-0 text-uppercase small font-weight-bold">
                        Product Category
                        </th>
                        <th class="border-0 text-uppercase small font-weight-bold">
                        Product Name
                        </th>
                        <th class="border-0 text-uppercase small font-weight-bold">
                        Quantity
                        </th>
                        <th class="border-0 text-uppercase small font-weight-bold">
                        Size
                        </th>
                        <th class="border-0 text-uppercase small font-weight-bold">
                        Customization
                        </th>
                        <th class="border-0 text-uppercase small font-weight-bold">
                        Product Amount
                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($payment->order->products as $product)
                                    <tr>
                                        <td>1</td>
                                       
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
                     <div class="form-text" id="emailHelp">{{ App\Models\Product::CUSTOM_SELECT[$key] }}: {{ App\Models\Product::OPTION_SELECT[$item] }}</div>
                    
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
                        </div>
                    </div>

                    <div class="d-flex flex-row-reverse bg-dark text-white p-4">
                        <div class="py-3 px-5 text-right">
                            <div class="mb-2">Grand Total</div>
                            <div class="h2 font-weight-light">$ {{ $payment->amount ?? '' }}</div>
                        </div>

                        <div class="py-3 px-5 text-right">
                            <div class="mb-2">Discount</div>
                            <div class="h2 font-weight-light">0%</div>
                        </div>

                        <div class="py-3 px-5 text-right">
                            <div class="mb-2">Sub - Total amount</div>
                            <div class="h2 font-weight-light">$ {{ $payment->amount ?? '' }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

</div>


  @endsection
