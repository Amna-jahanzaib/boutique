@extends('layouts.admin')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dashboard</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Home</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
         <!-- /.col-->
         @can('payment_access')

         <div class="col-12 col-sm-6 col-md-3">
                  <div class="card" style="border-radius: .25rem; box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);">
                    <div class="card-body p-3 d-flex align-items-center">
                      <div class="bg-info p-3 " style="text-align:center; border-radius: .25rem; font-size: 1.5rem; width:30%">
                      <i class="fas fa-money" style="font-weight:900"></i>
                        
                      </div>
                      <div class="" style="padding: 5px 10px;">
                        <div class="text-value text-info">     ${{$payments->sum('amount')}}        </div>
                        <div class="text-muted text-uppercase font-weight-bold small">Sales</div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
        @endcan
@can('order_access')

         <!-- /.col-->
         <div class="col-12 col-sm-6 col-md-3">
                  <div class="card" style="border-radius: .25rem; box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);">
                    <div class="card-body p-3 d-flex align-items-center">
                      <div class="bg-danger p-3 mfe-3" style="text-align:center; border-radius: .25rem; font-size: 1.5rem; width:30%">
                      <i class="fas fa-shopping-cart"></i>
                        
                      </div>
                      <div class="" style="padding: 5px 10px;">
                        <div class="text-value text-danger">      {{count($payments)}}         </div>
                        <div class="text-muted text-uppercase font-weight-bold small">Orders</div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
        @endcan
        @can('user_show')

         <!-- /.col-->
         <div class="col-12 col-sm-6 col-md-3">
                  <div class="card" style="border-radius: .25rem; box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);">
                    <div class="card-body p-3 d-flex align-items-center">
                      <div class="bg-warning p-3 mfe-3" style="text-align:center; border-radius: .25rem; font-size: 1.5rem; width:30%">
                      <i class="fas fa-plus"></i>
                        
                      </div>
                      <div class="" style="padding: 5px 10px;">
                        <div class="text-value text-warning">          {{count($products)}}      </div>
                        <div class="text-muted text-uppercase font-weight-bold small">Products</div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
                @endcan

                @can('user_create')

         <!-- /.col-->
         <div class="col-12 col-sm-6 col-md-3">
                  <div class="card" style="border-radius: .25rem; box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);">
                    <div class="card-body p-3 d-flex align-items-center">
                      <div class="bg-primary p-3 mfe-3" style="text-align:center; border-radius: .25rem; font-size: 1.5rem; width:30%">
                      <i class="fas fa-user"></i>
                        
                      </div>
                      <div class="" style="padding: 5px 10px;">
                        <div class="text-value text-primary">                {{$customers->count()}}</div>
                        <div class="text-muted text-uppercase font-weight-bold small">Users</div>
                      </div>
                    </div>
                  </div>
                </div>
                @endcan
                <!-- /.col-->


       <!-- /.row -->
       </div>

       @can('order_show')

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-8">
                      <!-- TABLE: LATEST Appointments -->
            <div class="card">
              <div class="card-header ">
                <h5 class="card-title">New Orders</h5>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                <table class=" table table-bordered table-hover datatable">
                    <thead>
                    <tr>
                    <th>Order ID  </th>
                    <th>Tracking ID  </th>
                    <th> Total Amount</th>
                      <th> Order Status </th>
                      <th> Order Date</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($orders->count() > 0)

                    @foreach($orders as $order)

                    <tr>
                    <td></td>
                      <td>
                      <a class="users-list-name" href="{{ route('admin.orders.show', $order->id) }}">{{ $order->tracking_no ?? '' }} </a>
                      </td>
                      <td>${{$order->total_amount}}</td>
                      <td>
                      {{ $order->status_message ?? '' }}

                      </td>
                      <td>
                      {{ $order->created_at->format('d M Y') ?? '' }}

                      </td>
                      <td>
                      <p class="users-list-date">

<a href="{{ route('admin.orders.show', $order->id) }}" class="btn  btn-outline-primary btn-xs" >View</a>
</p>

                      </td>
                    </tr>
                    @endforeach
                    @endif

                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="{{route('admin.orders.index')}}" class="btn btn-sm btn-primary float-right">View All Orders</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
@endcan

@can('user_show')

          <!-- Right col -->
          <div class="col-md-4">
                      <!-- Doctor LIST -->
                      <div class="card">
              <div class="card-header">
                <h5 class="card-title">Users</h5>

              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
@foreach ($customers->slice(0, 5) as $customer)

<ul class="products-list product-list-in-card list-group">

    <li class="list-group-item" style="">

      <div class="" style="display: inline-block; margin:0px; margin-right:5px; float:left;">
      @if($customer->photo)
          <a href="{{ $customer->photo->getUrl() }}" target="_blank">
          <img src="{{ $customer->photo->getUrl('thumb') }}" width="50px" height="50px" alt=" Image" class="img-circle " style="height: 50px;
    width: 50px;">
          </a>
          @else
          <a href="#" target="_blank">
          <img src="{{asset('img/user.jpg')}}" width="50px" height="50px" alt=" Image" class="img-circle " style="height: 50px;
    width: 50px;">
          </a>
      @endif
      </div>
      <div class="product-info">
                      <a href="{{route('admin.users.show', $customer->id)}}" class="product-title">{{$customer->name}}
                        </a>
                      <span class="product-description">
                      {{$customer->email}}
                      </span>
                    </div>
    </li>
    </ul>
                @endforeach




              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="{{route('admin.users.index')}}" class="uppercase">View All Users</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->

          </div>
          @endcan
          <!-- /.col -->

    </section>
    <!-- /.content -->
    @section('scripts')
<script>
$(document).ready(function() {
    $('.datatable').DataTable( {
      "pageLength": 4,
      buttons: {
        buttons: [
            {  enabled: false }
        ]
    }
    } );
} );
</script>
@endsection
@endsection
