@extends('layouts.header-front')
@section('main-content')
<div class="container">
    <!-- HERO SECTION-->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                <div class="col-lg-6">
                    <h1 class="h2 text-uppercase mb-0">Checkout</h1>
                </div>
                <div class="col-lg-6 text-lg-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                            <li class="breadcrumb-item"><a class="text-dark" href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-dark" href="{{route('cart')}}">Cart</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>


    <section class="py-5">
        <!-- BILLING ADDRESS-->
        <h2 class="h5 text-uppercase mb-4">Billing details</h2>
        <div class="row">
            <div class="col-lg-8">
                <form method="POST" action="{{ route('order.store') }}">
                    @csrf
                    <div class="row gy-3">
                        <div class="col-lg-6">
                            <label class="form-label text-sm text-uppercase" for="firstName">First name </label>
                            <input class="form-control form-control-lg" type="text" name="first_name"
                                placeholder="Enter your first name">
                            @if($errors->has('first_name'))
                            <div style="color:red">
                                {{ $errors->first('first_name') }}
                            </div>
                            @endif
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label text-sm text-uppercase" for="lastName">Last name </label>
                            <input class="form-control form-control-lg" type="text" name="last_name"
                                placeholder="Enter your last name">
                            @if($errors->has('last_name'))
                            <div style="color:red">
                                {{ $errors->first('last_name') }}
                            </div>
                            @endif
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label text-sm text-uppercase" for="email">Email address </label>
                            <input class="form-control form-control-lg" type="email" name="email"
                                placeholder="e.g. Jason@example.com">
                            @if($errors->has('email'))
                            <div style="color:red">
                                {{ $errors->first('email') }}
                            </div>
                            @endif
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label text-sm text-uppercase" for="phone">Phone number </label>
                            <input class="form-control form-control-lg" type="tel" name="phone"
                                placeholder="e.g. +02 245354745">
                                @if($errors->has('phone'))
                            <div style="color:red">
                                {{ $errors->first('phone') }}
                            </div>
                            @endif
                        </div>
                        <div class="col-lg-6 form-group">
                            <label class="form-label text-sm text-uppercase" for="country">Country</label>
                            <select class="country" name="country" id="country"
                                data-customclass="form-control form-control-lg rounded-0">
                                <option value>Choose your country</option>
                            </select>
                            @if($errors->has('country'))
                            <div style="color:red">
                                {{ $errors->first('country') }}
                            </div>
                            @endif
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label text-sm text-uppercase" for="city">Town/City </label>
                            <input class="form-control form-control-lg" type="text" name="city">
                            @if($errors->has('city'))
                            <div style="color:red">
                                {{ $errors->first('city') }}
                            </div>
                            @endif
                        </div>
                        <div class="col-lg-12">
                            <label class="form-label text-sm text-uppercase" for="address">Address</label>
                            <input class="form-control form-control-lg" type="text" name="address"
                                placeholder="House number and street name">
                                @if($errors->has('address'))
                            <div style="color:red">
                                {{ $errors->first('address') }}
                            </div>
                            @endif
                        </div>

                        <div class="col-lg-12 form-group">
                            <button class="btn btn-dark" type="submit">Place order</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- ORDER SUMMARY-->
            <div class="col-lg-4">
                <div class="card border-0 rounded-0 p-lg-4 bg-light">
                    <div class="card-body">
                        <h5 class="text-uppercase mb-4">Your order</h5>
                        <ul class="list-unstyled mb-0">
                            @php $total=0; @endphp
                            @foreach(Auth::user()->cart as $cart_item)
                            @php $flag=0; @endphp
                            @if(isset($cart_item->customization))
                            @php  $arr=json_decode($cart_item->customization, TRUE)@endphp

                            @if(in_array('dupatta',$arr))
                            @php  $flag=60;@endphp
                            @endif
                            @endif

                            <li class="d-flex align-items-center justify-content-between"><strong
                                    class="small fw-bold">{{$cart_item->product->name}}</strong><span
                                    class="text-muted small">${{$cart_item->product->selling_price*$cart_item->quantity+($flag / 100) *$cart_item->product->selling_price}}</span></li>
                            <li class="border-bottom my-2"></li>
                            @php $total+=$cart_item->product->selling_price*$cart_item->quantity+($flag / 100) *$cart_item->product->selling_price; @endphp

                            @endforeach
                            <li class="d-flex align-items-center justify-content-between"><strong
                                    class="text-uppercase small fw-bold">Total</strong><span>${{$total}}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection