@extends('layouts.header-front')
@section('main-content')
<div class="container">
    <!-- HERO SECTION-->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                <div class="col-lg-6">
                    <h1 class="h2 text-uppercase mb-0">Payment Details</h1>
                </div>
                <div class="col-lg-6 text-lg-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                            <li class="breadcrumb-item"><a class="text-dark" href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Payment Details</li>
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
                @foreach($errors as $error)
                @endforeach
                    <table class="table text-nowrap">
                    <form role="form" action="{{ route('process.payment',$order->id) }}" method="post" class="require-validation"
                    data-cc-on-file="false"
                     data-stripe-publishable-key="{{ env('STRIPE_SECRET_KEY') }}"
                                                    id="payment-form">
                       @csrf

                                    <div class='form-row'>
                                        <div class='col-xs-12 col-md-12 form-group required'>
                                            <label class='control-label'>Name on Card</label> <input
                                                class='form-control' size='4' type='text' name="name">
                                                @if($errors->has('name'))
                <div class="has-error alert-danger">
                    {{ $errors->first('name') }}
                </div>
                @endif                       
                                        </div>
                                    </div>
                                    <div class='form-row'>
                                        <div class='col-xs-12  col-md-12 form-group card required'>
                                            <label class='control-label'>Card Number</label> <input autocomplete='off'
                                                class='form-control card-number' size='20' type='text' name="card_number">
                                                @if($errors->has('card_number'))
                <div class="has-error alert-danger">
                    {{ $errors->first('card_number') }}
                </div>
                @endif                       
                                        </div>
                                    </div>
                                    <div class='form-row row'>
                                        <div class='col-xs-4  col-md-4 col-lg-4 form-group cvc required'>
                                            <label class='control-label'>CVC</label> <input autocomplete='off'
                                                class='form-control card-cvc' placeholder='ex. 311' size='4'
                                                type='text' name='cvc'>
                                                @if($errors->has('cvc'))
                <div class="has-error alert-danger">
                    {{ $errors->first('cvc') }}
                </div>
                @endif                       
                                        </div>
                                        <div class='col-xs-4 col-md-4 col-lg-4 form-group expiration required'>
                                            <label class='control-label'>Expiration</label> <input
                                                class='form-control card-expiry-month' placeholder='MM' size='2'
                                                type='text' name="expiry">
                                                @if($errors->has('expirydate'))
                <div class="has-error alert-danger">
                    {{ $errors->first('expirydate') }}
                </div>
                @endif                                        </div>
                                        <div class='col-xs-4 col-md-4 col-lg-2 form-group expiration required mb-2'>
                                            <label class='control-label'> Year</label> <input
                                                class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                                type='text' name="year">
                                                @if($errors->has('year'))
                <div class="has-error alert-danger">
                    {{ $errors->first('year') }}
                </div>
                @endif                       
        </div>
                                    </div><input type="hidden" value="{{Carbon\Carbon::parse(now())->format('mY')}}" name="now"/>
                                    <div class='form-row'>
                                        <div class='col-md-12'>
                                            <div class='form-control total btn btn-info'>
                                                Total: <span class='amount'>${{$order->total_amount}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='form-row'>
                                        <div class='col-md-12 form-group'>
                                            <button class='form-control btn btn-primary submit-button' type='submit'
                                                style="margin-top: 10px;">Pay »</button>
                                        </div>
                                    </div>
                                    <div class='form-row'>
                                        <div class='col-md-12 error form-group hide'>
                                            <div class='alert-danger alert'>
                                                Please correct the errors and try
                                                again.</div>
                                        </div>
                                    </div>
                                </form>

                    </table>
                </div>
                <!-- CART NAV-->
                <div class="bg-light px-4 py-3">
                    <div class="row align-items-center text-center">
                        <div class="col-md-6 mb-3 mb-md-0 text-md-start"><a class="btn btn-link p-0 text-dark btn-sm"
                                href="{{route('shop')}}"><i class="fas fa-long-arrow-alt-left me-2"> </i>Continue
                                shopping</a></div>
                       
                    </div>
                </div>
            </div>
            <!-- ORDER TOTAL-->
            <div class="col-lg-4">
                <div class="card border-0 rounded-0 p-lg-4 bg-light">
                    <div class="card-body">
                        <h5 class="text-uppercase mb-4">Order total</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="d-flex align-items-center justify-content-between"><strong
                                    class="text-uppercase small font-weight-bold">Order No</strong><span
                                    class="text-muted small">{{$order->tracking_no}}</span></li>
                            <li class="border-bottom my-2"></li>
                            <li class="d-flex align-items-center justify-content-between mb-4"><strong
                                    class="text-uppercase small font-weight-bold">Total</strong><span>${{$order->total_amount}}</span>
                            </li>
                            <li class="borde-bottom my-2"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  
<script type="text/javascript">
$(function() {
    const whitelist = ['http://127.0.0.1:8000', 'http://developer2.com']
const corsOptions = {
origin: (origin, callback) => {
    if (whitelist.indexOf(origin) !== -1) {
      callback(null, true)
    } else {
      callback(new Error())
    }
  }
}

   
    var $form         = $(".require-validation");
    $('form.require-validation').bind('submit', function(e) {
        var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;

        $errorMessage.addClass('hidden');
  
        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
          var $input = $(el);
          if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hidden');
            e.preventDefault();
          }
        });
   
        if (!$form.data('cc-on-file')) {
          e.preventDefault();
          Stripe.setPublishableKey($form.data('stripe-publishable-key'));
          Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val(),
           
          }, stripeResponseHandler);
        }
  
  });
  
  function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hidden')
                .find('.alert')
                .text(response.error.message);
        } else {
            /* token contains id, last4, and card type */
            var token = response['id'];
               
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
   
});
</script>
@endsection
