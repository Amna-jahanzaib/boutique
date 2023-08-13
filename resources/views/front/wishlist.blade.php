@extends('layouts.header-front')
@section('main-content')

@foreach(Auth::user()->wishlist as $item)
<!--  Modal -->
      <div class="modal fade" id="a{{ $item->product->id}}" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content overflow-hidden border-0">
            <button class="btn-close p-4 position-absolute top-0 end-0 z-index-20 shadow-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-0">
              <div class="row align-items-stretch">
                <div class="col-lg-6 p-lg-0">
                  <a class="glightbox product-view d-block h-100 bg-cover bg-center" style="background: url({{ $item->product->photo->getUrl() }})" href="{{ $item->product->photo->getUrl() }}" data-gallery="gallery1" data-glightbox="{{ $item->name }}"></a><a class="glightbox d-none" href="img/product-5-alt-1.jpg" data-gallery="gallery1" data-glightbox="Red digital smartwatch"></a><a class="glightbox d-none" href="img/product-5-alt-2.jpg" data-gallery="gallery1" data-glightbox="Red digital smartwatch"></a></div>
                <div class="col-lg-6">
                  <div class="p-4 my-md-4">
                    <ul class="list-inline mb-2">
                      <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0 1"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0 2"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0 3"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0 4"><i class="fas fa-star small text-warning"></i></li>
                    </ul>
                    <h2 class="h4">{{$item->product->name}}</h2>
                    <p class="text-muted">${{$item->product->selling_price}}</p>
                    <p class="text-sm mb-4">{{$item->product->description}}</p>
                    <div class="row align-items-stretch mb-4 gx-0">
                      <div class="col-sm-7">
                        <div class="border d-flex align-items-center justify-content-between py-1 px-3"><span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
                          <div class="quantity">
                            <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                            <input class="form-control border-0 shadow-0 p-0" type="text" value="1" name="quantity">
                            <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-5"><a class="btn btn-dark btn-sm w-100 h-100 d-flex align-items-center justify-content-center px-0" href="{{route('add.to.cart',$item->product->id)}}">Add to cart</a></div>
                    </div><a class="btn btn-link text-dark text-decoration-none p-0" href="{{route('add.to.wishlist',$item->product->id)}}"><i class="far fa-heart me-2"></i>Add to wish list</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach

      <div class="container">
        <!-- HERO SECTION-->
        <section class="py-5 bg-light">
          <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
              <div class="col-lg-6">
                <h1 class="h2 text-uppercase mb-0">Wishlist</h1>
              </div>
              <div class="col-lg-6 text-lg-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                    <li class="breadcrumb-item"><a class="text-dark" href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </section>
        <section class="py-5">
          <h2 class="h5 text-uppercase mb-4">Your wishlist</h2>
          <div class="row">
            <div class="col-lg-12 mb-12 mb-lg-0">
              <!-- CART TABLE-->
              <div class="table-responsive mb-4">
              <div class="row">
            <!-- PRODUCT-->
            @foreach(Auth::user()->wishlist as $item)
            <div class="col-lg-3 col-sm-6">
              <div class="product text-center skel-loader">
                <div class="d-block mb-3 position-relative"><a class="d-block" href="{{route('product.details',$item->product->id)}}"><img class="img-fluid w-100" style="width: 259px; height:285px;" src="{{$item->product->photo->getUrl()}}" alt="..."></a>
                  <div class="product-overlay">
                    <ul class="mb-0 list-inline">
                      <li class="list-inline-item m-0 p-0">
                      <a class="btn btn-sm btn-outline-dark" >
                        
                        <form action="{{ route('delete.wishlist.item',$item->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" style="background:none; border:none;"><i class="far fa-trash-alt "></i></button>
                                    </form>
                      </a>  </li>
                      <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="{{route('add.to.cart',$item->product->id)}}">Add to cart</a></li>
                      <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark" href="#a{{$item->product->id}}" data-bs-toggle="modal"><i class="fas fa-expand"></i></a></li>
                    </ul>
                  </div>
                </div>
                <h6> <a class="reset-anchor" href="{{route('product.details',$item->product->id)}}">{{$item->product->name}}</a></h6>
                <p class="small text-muted">${{$item->product->selling_price}}</p>
              </div>
            </div>
            @endforeach
        </div>

                  
              </div>
              <!-- CART NAV-->
              <div class="bg-light px-4 py-3">
                <div class="row align-items-center text-center">
                  <div class="col-md-6 mb-3 mb-md-0 text-md-start"><a class="btn btn-link p-0 text-dark btn-sm" href="{{route('shop')}}"><i class="fas fa-long-arrow-alt-left me-2"> </i>Continue shopping</a></div>
                </div>
              </div>
            </div>
            <!-- ORDER TOTAL-->
            
          </div>
        </section>
      </div>
@endsection
