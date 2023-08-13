@extends('layouts.header-front')
@section('main-content')
      <!--  Modal -->
      @foreach($items as $item)
<!--  Modal -->
      <div class="modal fade" id="a{{ $item->id}}" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content overflow-hidden border-0">
            <button class="btn-close p-4 position-absolute top-0 end-0 z-index-20 shadow-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-0">
              <div class="row align-items-stretch">
                <div class="col-lg-6 p-lg-0">
                  <a class="glightbox product-view d-block h-100 bg-cover bg-center" style="background: url({{ $item->photo->getUrl() }})" href="{{ $item->photo->getUrl() }}" data-gallery="gallery1" data-glightbox="{{ $item->name }}"></a><a class="glightbox d-none" href="img/product-5-alt-1.jpg" data-gallery="gallery1" data-glightbox="Red digital smartwatch"></a><a class="glightbox d-none" href="img/product-5-alt-2.jpg" data-gallery="gallery1" data-glightbox="Red digital smartwatch"></a></div>
                <div class="col-lg-6">
                  <div class="p-4 my-md-4">
                    <ul class="list-inline mb-2">
                      <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0 1"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0 2"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0 3"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0 4"><i class="fas fa-star small text-warning"></i></li>
                    </ul>
                    <h2 class="h4">{{$item->name}}</h2>
                    <p class="text-muted">${{$item->selling_price}}</p>
                    <p class="text-sm mb-4">{{$item->description}}</p>
                    <form action="{{ route('add.to.cart',$item->id) }}" method="POST">
                          @csrf
                    <div class="row align-items-stretch mb-4 gx-0">
                      <div class="col-sm-7">
                        <div class="border d-flex align-items-center justify-content-between py-1 px-3"><span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
                          <div class="quantity">
                            <input class="form-control border-0 shadow-0 p-0" type="number" value="1" min="1" max="{{$item->quantity}}" name="quantity" >
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-5"><button class="btn btn-dark btn-sm w-100 h-100 d-flex align-items-center justify-content-center px-0" type="submit">Add to cart</a></div>
                    </div><a class="btn btn-link text-dark text-decoration-none p-0" href="{{route('add.to.wishlist',$item->id)}}"><i class="far fa-heart me-2"></i>Add to wish list</a>
                    </form>
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
                <h1 class="h2 text-uppercase mb-0">Shop</h1>
              </div>
              <div class="col-lg-6 text-lg-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                    <li class="breadcrumb-item"><a class="text-dark" href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Shop</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </section>
        <section class="py-5">
          <div class="container p-0">
            <div class="row">
              <!-- SHOP SIDEBAR-->
              <div class="col-lg-3 order-2 order-lg-1">
                <h5 class="text-uppercase mb-4">Categories</h5>
                <div class="py-2 px-4 bg-dark text-white mb-3"><strong class="small text-uppercase fw-bold">Fashion &amp; Acc</strong></div>
                <ul class="list-unstyled small text-muted ps-lg-4 font-weight-normal">
                  @foreach($categories as $category)
                  <li class="mb-2"><a class="reset-anchor " href="{{route('products.category',$category->id)}}">{{$category->name}}</a></li>
                  @endforeach
                </ul>
              </div>
              <!-- SHOP LISTING-->
              <div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
                <div class="row mb-3 align-items-center">
                  <div class="col-lg-6 mb-2 mb-lg-0">
                    <p class="text-sm text-muted mb-0"> {{$total}}  Total Results </p>
                  </div>
                  <div class="col-lg-6">
                    <ul class="list-inline d-flex align-items-center justify-content-lg-end mb-0">
                    {{$items->links()}} 
                                      </ul>
                  </div>
                </div>
                <div class="row">
                  @foreach($items as $product)
                  <!-- PRODUCT-->
                  <div class="col-lg-4 col-sm-6">
                    <div class="product text-center">
                      <div class="mb-3 position-relative">
                        <div class="badge text-white {{$product->featured=='1'? 'bg-primary':''}}">{{$product->featured=='1'? 'Featured':''}}</div><a class="d-block" href="{{route('product.details',$product->id)}}"><img style="width: 400px; height:290px" class="img-fluid w-100" src="{{$product->photo->getUrl()}}" alt="..."></a>
                        <div class="product-overlay">
                        <form action="{{ route('add.to.cart',$product->id) }}" method="POST">
                      @csrf
                        <input type="hidden" name="quantity" value="1"/>
                          <ul class="mb-0 list-inline">
                            <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark" href="{{route('add.to.wishlist',$product->id)}}"><i class="far fa-heart"></i></a></li>
                            <li class="list-inline-item m-0 p-0"><button class="btn btn-sm btn-dark" type="submit">Add to cart</button></li>                      
                            <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark" href="#a{{$product->id}}" data-bs-toggle="modal"><i class="fas fa-expand"></i></a></li>
                          </ul>
                        </form>
                        </div>
                      </div>
                      <h6> <a class="reset-anchor" href="detail.html">{{$product->name}}</a></h6>
                      <p class="small text-muted">${{$product->selling_price}}</p>
                    </div>
                  </div>
                  @endforeach
                  <!-- PAGINATION-->
                  <div class="row"></div>
                <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-center justify-content-lg-end">
                  <div class="row pagination justify-content-center justify-content-lg-end">
                    <div class="col-md-12 page-item mx-1">
                      {{$items->links()}}
                    </div>
                  </div>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </section>
      </div>
@endsection
