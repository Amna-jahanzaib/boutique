@extends('layouts.header-front')
@section('main-content')
      <div class="container">
        <!-- HERO SECTION-->
        <section class="py-5 bg-light">
          <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
              <div class="col-lg-6">
                <h1 class="h2 text-uppercase mb-0">Customer Details</h1>
              </div>
              <div class="col-lg-6 text-lg-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                    <li class="breadcrumb-item"><a class="text-dark" href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Details</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </section>
        <section class="py-5">
          <h2 class="h5 text-uppercase mb-4">Order Details</h2>
          <div class="row">
            <div class="col-lg-8 mb-4 mb-lg-0">
              <!-- CART TABLE-->
              <div class="table-responsive mb-4">
                <table class="table text-nowrap">
                  <thead class="bg-light">
                    <tr>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Order ID</strong></th>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Total</strong></th>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Status</strong></th>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Order Date </strong></th>
                      <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Actions</strong></th>
                    </tr>
                  </thead>
                  <tbody class="border-0">
                    @php $total=0; @endphp
                    @foreach(Auth::user()->orders as $order)
                    <tr>
                      <th class="ps-0 py-3 border-light" scope="row">
                      {{$order->tracking_no}}
                      </th>
                      <td class="p-3 align-middle border-light">
                        <p class="mb-0 small">${{$order->total_amount}}</p>
                      </td>
                      <td class="p-3 align-middle border-light">
                      {{$order->status_message}}
                      </td>
                      <td class="p-3 align-middle border-light">
                        <p class="mb-0 small">{{date('d-m-Y', strtotime($order->created_at))}}</p>
                      </td>
                      <td class="p-3 align-middle border-light">
                        @if($order->status_message=='Order Placed')
                      <a href="{{route('order.payment',$order->id)}}" class="btn btn-primary">Pay</a>
                      @endif
                      @if($order->status_message=='Paid')
                      <a href="{{route('payment.reciept',$order->payment->id)}}" class="btn btn-default">View Reciept</a>

                      @endif
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- CART NAV-->
              <div class="bg-light px-4 py-3">
                <div class="row align-items-center text-center">
                  <div class="col-md-6 mb-3 mb-md-0 text-md-start"><a class="btn btn-link p-0 text-dark btn-sm" href="{{route('shop')}}"><i class="fas fa-long-arrow-alt-left me-2"> </i>Continue shopping</a></div>
                  <div class="col-md-6 text-md-end"></div>
                </div>
              </div>
            </div>
            <!-- ORDER TOTAL-->
            <div class="col-lg-4">
              <div class="card border-0 rounded-0 p-lg-4 bg-light">
                <div class="card-body">
                  <h5 class="text-uppercase mb-4">Customer Details</h5>
                  <ul class="list-unstyled mb-0">
                    <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">Name</strong><span class="text-muted small">{{Auth::user()->name}} </span></li>
                    <li class="border-bottom my-2"></li>
                    <li class="d-flex align-items-center justify-content-between mb-4"><strong class="text-uppercase small font-weight-bold">Email</strong><span>{{Auth::user()->email}}</span></li>
                    <li class="border-bottom my-2"></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
@endsection
