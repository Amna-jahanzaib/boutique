@extends('layouts.header-front')
@section('main-content')

        <div class="container">
        <section class="py-5 bg-light">
          <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
              <div class="col-lg-6">
                <h1 class="h2 text-uppercase mb-0">FAQs</h1>
              </div>
              <div class="col-lg-6 text-lg-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                    <li class="breadcrumb-item"><a class="text-dark" href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">FAQs</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </section>
            <div class="row py-5">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body p-0">
                        <div class="space-y-2 px-5 py-5">
    <h1 class="text-xl font-bold">1. Frequently Asked Questions</h1>
        
        <div class="faq-item">
            <p class="question">Q: What are your shipping options?</p>
            <p>A: We offer standard and express shipping options. Standard shipping usually takes 5-7 business days, while express shipping delivers within 2-3 business days.</p>
        </div>
        
        <div class="faq-item">
            <p class="question">Q: Can I return or exchange items?</p>
            <p>A: Yes, we have a 30-day return and exchange policy. Please review our <a href="returns.html">Returns & Exchanges</a> page for more details.</p>
        </div>
        
        <div class="faq-item">
            <p class="question">Q: How do I track my order?</p>
            <p>A: You will receive a tracking number via email once your order is shipped. You can use this number to track your order on our website or the courier's site.</p>
        </div>

</div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    


    @endsection
