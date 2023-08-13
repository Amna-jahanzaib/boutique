@extends('layouts.header-front')
@section('main-content')


      <div class="container">
        <!-- HERO SECTION-->
        <section class="py-5 bg-light">
          <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
              <div class="col-lg-6">
                <h1 class="h2 text-uppercase mb-0">Help & Support</h1>
              </div>
              <div class="col-lg-6 text-lg-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                    <li class="breadcrumb-item"><a class="text-dark" href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Help & Support</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </section>
        <section class="py-5">
          <div class="container">
        
          <div class="row">
            <div class="col-lg-4 mb-12 mb-lg-0">
            <div class="card mb-4" id="content-formatting">
              <div class="card-header">Content Formatting</div>
              <div class="card-body">
                <address><strong>Twitter, Inc.</strong><br> 123 Fashion Avenue,P<br> San Francisco, CA 94107<br><abbr title="Phone">Phone:</abbr> (123) 456-7890</address>
                <address class="col-6"><strong>Email</strong><br>
                
                <a href="mailto:#">info@fashionboutique.com</a></address>
                <hr>
                <blockquote>If you have any questions or need assistance, please don't hesitate to contact us.<small>Use <code>email</code> Our customer support team is available to help you.</small></blockquote>
              </div>        

            </div>
          


  </div>
            <div class="col-lg-8 mb-12 mb-lg-0">
            <div class="card mb-4" id="forms">
          <div class="card-header">Forms</div>
          <div class="card-body">
          @if (\Session::has('message'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('message') !!}</li>
        </ul>
    </div>
@endif
          <form class="contact100-form validate-form" method="post" role="form" action="{{ route("customer.message.store") }}">
                @csrf
            <h4 class="mb-5">Send us Enquiries</h4>
            <form>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="inputEmail3">First Name</label>
                <div class="col-sm-10">
                  <input class="form-control" name="first_name"  id="inputEmail3" type="text">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="inputEmail3">First Name</label>
                <div class="col-sm-10">
                  <input class="form-control" name="last_name"  id="inputEmail3" type="text">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="inputEmail3">First Name</label>
                <div class="col-sm-10">
                  <input class="form-control" name="email"  id="inputEmail3" type="email">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="inputPassword3">Phone Number</label>
                <div class="col-sm-10">
                  <input class="form-control" id="inputPassword3" type="text" name="phone" placeholder="Eg. +1 800 000000">
                </div>
              </div>
              <fieldset>
                <div class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">Message</legend>
                  <div class="col-sm-10">
                    <textarea class="form-control"  name="message"></textarea>
                  </div>
                </div>
              </fieldset>
              <button class="btn btn-primary align-center" type="submit">Send</button>
            </form>
          </div>
        </div>
            </div>
          </div>

          </div>
        </section>
      </div>
@endsection
