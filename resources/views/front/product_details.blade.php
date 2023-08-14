@extends('layouts.header-front')
@section('main-content')
      <!--  Modal -->
      @foreach($related_products as $item)
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

      <section class="py-5">
        <div class="container">
          <div class="row mb-5">
            <div class="col-lg-6">
              <!-- PRODUCT SLIDER-->
              <div class="row m-sm-0">
                <div class="col-sm-2 p-sm-0 order-2 order-sm-1 mt-2 mt-sm-0 px-xl-2">
                  <div class="swiper product-slider-thumbs">
                    <div class="swiper-wrapper">
                      @foreach($product->images as $image)
                      <div class="swiper-slide h-auto swiper-thumb-item mb-3"><img class="w-100" src="{{$image->getUrl('thumb')}}" alt="..."></div>
                      @endforeach
                    </div>
                  </div>
                </div>
                <div class="col-sm-10 order-1 order-sm-2">
                  <div class="swiper product-slider">
                    <div class="swiper-wrapper">
                    @foreach($product->images as $image)

                      <div class="swiper-slide h-auto"><a class="glightbox product-view" href="{{$image->getUrl()}}" data-gallery="gallery2" data-glightbox="Product item 1"><img class="img-fluid" src="{{$image->getUrl()}}" alt="..."></a></div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- PRODUCT DETAILS-->
            <div class="col-lg-6">
              <ul class="list-inline mb-2 text-sm">
                <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0 1"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0 2"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0 3"><i class="fas fa-star small text-warning"></i></li>
                <li class="list-inline-item m-0 4"><i class="fas fa-star small text-warning"></i></li>
              </ul>
              <h1>{{$product->name}}</h1>
              <p class="text-muted lead">${{$product->selling_price}}</p>
              <p class="text-sm mb-4">
              Disclaimer: Colour looks different as per lighting condition. We do our shoot in natural sunlight in a good spot since every one has access to natural light and can find a good spot themselves. We don’t use artificial light for our shoot and our insta videos of each outfit are unedited.


                
              </p>
              <form action="{{ route('add.to.cart',$product->id) }}" method="POST">
                @csrf
              <div class="row align-items-stretch mb-4">
                <div class="col-sm-5 pr-sm-0">
                  <div class="border d-flex align-items-center justify-content-between py-1 px-3 bg-white border-white"><span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
                  <div class="quantity">
                            <input class="form-control border-0 shadow-0 p-0" type="number" min="1" max="{{$product->quantity}}" value="1" name="quantity" >
                    </div>
                  </div>
                </div>
                <div class="col-sm-3 pl-sm-0"><button class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-3" type="submit">Add to cart</button></div>              
              

              </div>
              <a class="text-dark p-0 mb-4 d-inline-block" href="{{route('add.to.wishlist',$product->id)}}"><i class="far fa-heart me-2"></i>Add to wish list</a><br>
              <ul class="list-unstyled small d-inline-block">
                <li class="px-3 py-2 mb-1 bg-white"><strong class="text-uppercase">Short Description:</strong><span class="ms-2 text-muted">{{$product->small_description}}</span></li>
                @if(isset($product->customization))
                @foreach($product->customization as $id => $item)
                <li class="px-3 py-2 mb-1 bg-white text-muted">
                  <div class="row mb-3">
                    <label class="col-sm-6 col-form-label" for="inputEmail3"><strong class="text-uppercase text-dark">{{App\Models\Product::CUSTOM_SELECT[$item]}}:</strong></label>
                    <div class="col-sm-6">
                        <select name="{{$item}}" id="{{$item}}" class="form-control reset-anchor ms-2" required>
                        @if($item=='add_sleeve')
                        @foreach(App\Models\Product::ADD_SLEEEVE_SELECT  as $id => $val)
                        <option value="{{$id}}" > {{$val}}</option>
                        @endforeach
                        @endif

                        @if($item=='top_length')
                        @foreach(App\Models\Product::TOP_LENGTH_SELECT  as $id => $val)
                        <option value="{{$id}}" > {{$val}}</option>
                        @endforeach
                        @endif
                        
                        @if($item=='bottom_length')
                        @foreach(App\Models\Product::BOTTOM_LENGTH_SELECT  as $id => $val)
                        <option value="{{$id}}" > {{$val}}</option>
                        @endforeach
                        @endif
                        
                        @if($item=='add_dupatta')
                        @foreach(App\Models\Product::ADD_DUPATTA_SELECT  as $id => $val)
                        <option value="{{$id}}" > {{$val}} ${{(60 / 100) *$product->selling_price}}</option>
                        @endforeach
                        @endif
                        
                        @if($item=='add_trousers')
                        @foreach(App\Models\Product::ADD_TROUSERS_SELECT  as $id => $val)
                        <option value="{{$id}}" > {{$val}}</option>
                        @endforeach
                        @endif
                        
                        @if($item=='add_lining')
                        @foreach(App\Models\Product::ADD_LINING_SELECT  as $id => $val)
                        <option value="{{$id}}" > {{$val}}</option>
                        @endforeach
                        @endif
                        
                        @if($item=='saree_length')
                        @foreach(App\Models\Product::SAREE_LENGTH_SELECT  as $id => $val)
                        <option value="{{$id}}" > {{$val}}</option>
                        @endforeach
                        @endif
                        
                        @if($item=='choli_length')
                        @foreach(App\Models\Product::CHOLI_LENGTH_SELECT  as $id => $val)
                        <option value="{{$id}}" > {{$val}}</option>
                        @endforeach
                        @endif
                        
                        </select>
                      </div>
                    </div>  
                </li>
                @endforeach
                @endif

                <li class="px-3 py-2 mb-1 bg-white text-muted"><strong class="text-uppercase text-dark">Available Sizes:</strong><a class="reset-anchor ms-2" href="#!">
                  @foreach($product->size as $key => $i)
                  <input class="form-check-input" id="gridRadios1" type="radio" name="size" value="{{$key}}" checked>
                      <label class="form-check-label" for="gridRadios1">
                      {{ App\Models\Product::SIZE_SELECT[$i] }}
                        
                      </label>
                  @endforeach</a></li>
              </ul>
            </div>
          </form>
          </div>
          <!-- DETAILS TABS-->
          <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
            <li class="nav-item"><a class="nav-link text-uppercase active" id="description-tab" data-bs-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a></li>
            <li class="nav-item"><a class="nav-link text-uppercase" id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a></li>
          </ul>
          <div class="tab-content mb-5" id="myTabContent">
            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
              <div class="p-4 p-lg-5 bg-white">
                <h6 class="text-uppercase">Product description </h6>
                <p class="text-muted text-sm mb-0">{{$product->description}}</p>
              </div>
            </div>
            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
              <div class="p-4 p-lg-5 bg-white">
                <div class="row">
                  <div class="col-lg-8">
                  @foreach($product->reviews as $review)

                    <div class="d-flex mb-3">
                      <div class="flex-shrink-0"><img class="rounded-circle" src="{{asset('img/user.jpg')}}" alt="" width="50"/></div>
                      <div class="ms-3 flex-shrink-1">
                        <h6 class="mb-0 text-uppercase">{{$review->user->name}}</h6>
                        <p class="small text-muted mb-0 text-uppercase">{{$review->created_at}}</p>
                        <ul class="list-inline mb-1 text-xs">
                          @for($i=0;$i<$review->rating;$i++)
                          <li class="list-inline-item m-0"><i class="fas fa-star text-warning"></i></li>
                          @endfor
                        </ul>
                        <p class="text-sm mb-0 text-muted">{{$review->comments}}</p>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
          <!-- RELATED PRODUCTS-->
          <h2 class="h5 text-uppercase mb-4">Related products</h2>
          <div class="row">
            <!-- PRODUCT-->
            @foreach($related_products as $item)
            <div class="col-lg-3 col-sm-6">
              <div class="product text-center skel-loader">
                <div class="d-block mb-3 position-relative"><a class="d-block" href="{{route('product.details',$item->id)}}"><img class="img-fluid w-100" style="width: 259px; height:285px;" src="{{$item->photo->getUrl()}}" alt="..."></a>
                  <div class="product-overlay">
                  <form action="{{ route('add.to.cart',$item->id) }}" method="POST">
                      @csrf  
                      <input type="hidden" name="quantity" value="1"/>
                  
                    <ul class="mb-0 list-inline">
                      <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark" href="{{route('add.to.wishlist',$item->id)}}"><i class="far fa-heart"></i></a></li>
                      <li class="list-inline-item m-0 p-0"><button class="btn btn-sm btn-dark" type="submit">Add to cart</button></li>                      
                      <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark" href="#a{{$item->id}}" data-bs-toggle="modal"><i class="fas fa-expand"></i></a></li>
                    </ul>
                  </form>
                  </div>
                </div>
                <h6> <a class="reset-anchor" href="{{route('product.details',$item->id)}}">{{$item->name}}</a></h6>
                <p class="small text-muted">${{$item->selling_price}}</p>
              </div>
            </div>
            @endforeach
        </div>
      </section>
@endsection
