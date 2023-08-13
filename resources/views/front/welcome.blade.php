@extends('layouts.header-front')
@section('main-content')
  @foreach($featured_products as $item)
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
                            <input class="form-control border-0 shadow-0 p-0" type="number" min="1" max="{{$item->quantity}}" value="1" name="quantity" >
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-5"><button type="submit" class="btn btn-dark btn-sm w-100 h-100 d-flex align-items-center justify-content-center px-0" >Add to cart</button></div>
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
      <!-- HERO SECTION-->
      <div class="container">
        <section class="hero pb-3 bg-cover bg-center d-flex align-items-center" style="background: url(img/Zeenat.jpg); background-position: center;background-size: 300px 100px;">
          <div class="container py-5">
            <div class="row px-4 px-lg-5">
              <div class="col-lg-6">
                <p class=" small text-uppercase mb-2 align-items-center" style="color:black">New Inspiration 2020</p>
                <h1 class="h2 text-uppercase mb-3 align-items-center " style="color:black">20% off on new season</h1><a class="btn btn-dark" href="shop.html">Browse collections</a>
              </div>
            </div>
          </div>
        </section>
        <!-- CATEGORIES SECTION-->
        <section class="pt-5">
          <header class="text-center">
            <p class="small text-muted small text-uppercase mb-1">Carefully created collections</p>
            <h2 class="h5 text-uppercase mb-4">Browse our categories</h2>
          </header>
          @if(count($categories)==4)
          <div class="row">
            <div class="col-md-4"><a class="category-item" href="{{route('products.category',$categories[0]->id)}}"><img class="img-fluid" src="{{ asset('img/cat-img-1.jpg') }}" alt=""/><strong class="category-item-title">{{$categories[0]->name}}</strong></a>
            </div>
            <div class="col-md-4"><a class="category-item mb-4" href="{{route('products.category',$categories[1]->id)}}"><img class="img-fluid" src="{{ asset('img/cat-img-2.jpg') }}" alt=""/><strong class="category-item-title">{{$categories[1]->name}}</strong></a>
            <a class="category-item" href="{{route('products.category',$categories[2]->id)}}"><img class="img-fluid" src="{{ asset('img/cat-img-3.jpg') }}" alt=""/><strong class="category-item-title">{{$categories[2]->name}}</strong></a>
            </div>
            <div class="col-md-4"><a class="category-item" href="{{route('products.category',$categories[3]->id)}}"><img class="img-fluid" style="height: 492px;" src="{{ asset('img/product-7.jpg') }}" alt=""/><strong class="category-item-title">{{$categories[3]->name}}</strong></a>
            </div>
          </div>
          @endif
        </section>
        <!-- TRENDING PRODUCTS-->
        <section class="py-5">
          <header>
            <p class="small text-muted small text-uppercase mb-1">Made the hard way</p>
            <h2 class="h5 text-uppercase mb-4">Top trending products</h2>
          </header>
          <div class="row">
            @foreach($featured_products as $product)
            <!-- PRODUCT-->
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="product text-center">
                <div class="position-relative mb-3">
                <div class="badge text-white {{$product->featured=='1'? 'bg-info':''}}">{{$product->featured=='1'? 'Featured':''}}</div><a class="d-block" href="{{route('product.details',$product->id)}}"><img style="width: 400px; height:290px" class="img-fluid w-100" src="{{ $product->photo->getUrl() }}" alt="..."></a>
                  <div class="product-overlay">
                  <form action="{{ route('add.to.cart',$product->id) }}" method="POST">
                      @csrf
                        <input type="hidden" name="quantity" value="1"/>
                      <ul class="mb-0 list-inline">
                        <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark" href="{{route('add.to.wishlist',$product->id)}}"><i class="far fa-heart"></i></a></li>
                        <li class="list-inline-item m-0 p-0"><button class="btn btn-sm btn-dark" type="submit">Add to cart</button></li>                      
                        <li class="list-inline-item me-0"><a class="btn btn-sm btn-outline-dark" href="#a{{$product->id}}" data-bs-toggle="modal"><i class="fas fa-expand"></i></a></li>
                    </ul>
                  </form>
                  </div>
                </div>
                <h6> <a class="reset-anchor" href="{{route('product.details',$product->id)}}">{{ $product->name }}</a></h6>
                <p class="small text-muted">${{ $product->selling_price }}</p>
              </div>
            </div>
            @endforeach
        </section>
        <!-- SERVICES-->
        <section class="py-5 bg-light">
          <div class="container">
            <div class="row text-center gy-3">
              <div class="col-lg-4">
                <div class="d-inline-block">
                  <div class="d-flex align-items-end">
                    <svg class="svg-icon svg-icon-big svg-icon-light">
                      <use xlink:href="#delivery-time-1"> </use>
                    </svg>
                    <div class="text-start ms-3">
                      <h6 class="text-uppercase mb-1">Free shipping</h6>
                      <p class="text-sm mb-0 text-muted">Free shipping worldwide</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="d-inline-block">
                  <div class="d-flex align-items-end">
                    <svg class="svg-icon svg-icon-big svg-icon-light">
                      <use xlink:href="#helpline-24h-1"> </use>
                    </svg>
                    <div class="text-start ms-3">
                      <h6 class="text-uppercase mb-1">24 x 7 service</h6>
                      <p class="text-sm mb-0 text-muted">Free shipping worldwide</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="d-inline-block">
                  <div class="d-flex align-items-end">
                    <svg class="svg-icon svg-icon-big svg-icon-light">
                      <use xlink:href="#label-tag-1"> </use>
                    </svg>
                    <div class="text-start ms-3">
                      <h6 class="text-uppercase mb-1">Festivaloffers</h6>
                      <p class="text-sm mb-0 text-muted">Free shipping worldwide</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- NEWSLETTER-->
        <section class="py-5">
          <div class="container p-0">
            <div class="row gy-3">
              <div class="col-lg-6">
                <h5 class="text-uppercase">Let's be friends!</h5>
                <p class="text-sm text-muted mb-0">Nisi nisi tempor consequat laboris nisi.</p>
              </div>
              <div class="col-lg-6">
                <form action="#">
                  <div class="input-group">
                    <input class="form-control form-control-lg" type="email" placeholder="Enter your email address" aria-describedby="button-addon2">
                    <button class="btn btn-dark" id="button-addon2" type="submit">Subscribe</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section>
      </div>
@endsection
