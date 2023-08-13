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
            <li class="breadcrumb-item"><a href="{{route('vendor.dashboard')}}">Home</a></li>
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
         @can('category_show')

         <div class="col-12 col-sm-6 col-md-3">
                  <div class="card" style="border-radius: .25rem; box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);">
                    <div class="card-body p-3 d-flex align-items-center">
                      <div class="bg-info p-3 " style="text-align:center; border-radius: .25rem; font-size: 1.5rem; width:30%">
                      <i class="fas fa-list-alt " style="font-weight:900"></i>
                        
                      </div>
                      <div class="" style="padding: 5px 10px;">
                        <div class="text-value text-info">     {{$categories->count()}}        </div>
                        <div class="text-muted text-uppercase font-weight-bold small">Categories</div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
        @endcan
@can('product_show')

         <!-- /.col-->
         <div class="col-12 col-sm-6 col-md-3">
                  <div class="card" style="border-radius: .25rem; box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);">
                    <div class="card-body p-3 d-flex align-items-center">
                      <div class="bg-danger p-3 mfe-3" style="text-align:center; border-radius: .25rem; font-size: 1.5rem; width:30%">
                      <i class="fas fa-shopping-cart"></i>
                        
                      </div>
                      <div class="" style="padding: 5px 10px;">
                        <div class="text-value text-danger">      {{count($products)}}         </div>
                        <div class="text-muted text-uppercase font-weight-bold small">Products</div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
        @endcan
        @can('product_show')

         <!-- /.col-->
         <div class="col-12 col-sm-6 col-md-3">
                  <div class="card" style="border-radius: .25rem; box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);">
                    <div class="card-body p-3 d-flex align-items-center">
                      <div class="bg-warning p-3 mfe-3" style="text-align:center; border-radius: .25rem; font-size: 1.5rem; width:30%">
                      <i class="fas fa-plus"></i>
                        
                      </div>
                      <div class="" style="padding: 5px 10px;">
                        <div class="text-value text-warning">          {{count($products->where('status','1'))}}      </div>
                        <div class="text-muted text-uppercase font-weight-bold small">Visible Products</div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
                @endcan

                @can('product_show')

         <!-- /.col-->
         <div class="col-12 col-sm-6 col-md-3">
                  <div class="card" style="border-radius: .25rem; box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);">
                    <div class="card-body p-3 d-flex align-items-center">
                      <div class="bg-primary p-3 mfe-3" style="text-align:center; border-radius: .25rem; font-size: 1.5rem; width:30%">
                      <i class="fas fa-star"></i>
                        
                      </div>
                      <div class="" style="padding: 5px 10px;">
                        <div class="text-value text-primary">                {{$products->where('featured','1')->count()}}</div>
                        <div class="text-muted text-uppercase font-weight-bold small">Featured Products</div>
                      </div>
                    </div>
                  </div>
                </div>
                @endcan
                <!-- /.col-->



       <!-- /.row -->
       </div>

        <!-- /.row -->

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
