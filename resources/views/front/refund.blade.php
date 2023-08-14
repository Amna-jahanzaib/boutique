@extends('layouts.header-front')
@section('main-content')

<div class="container">
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                <div class="col-lg-6">
                    <h1 class="h2 text-uppercase mb-0">Returns & Refunds</h1>
                </div>
                <div class="col-lg-6 text-lg-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                            <li class="breadcrumb-item"><a class="text-dark" href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Returns & Refunds</li>
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
                        <p><strong>30-Day Return Policy:</strong></p>
                        <p>We accept returns within 30 days of the purchase date. To be eligible for a return, your item
                            must be unused and in the same condition that you received it. It must also be in the
                            original packaging.</p>
                        <p><strong>Refunds:</strong></p>
                        <p>Once your return is received and inspected, we will send you an email to notify you that we
                            have received your returned item. We will also notify you of the approval or rejection of
                            your refund. If approved, your refund will be processed, and a credit will automatically be
                            applied to your original method of payment.</p>
                        <p><strong>Exchanges:</strong></p>
                        <p>We offer exchanges for items of the same value. If you need to exchange an item, please
                            contact our customer support team.</p>
                        <p><strong>Contact Us:</strong></p>
                        <address><strong>Fashion Boutique, Inc.</strong><br> 123 Fashion Avenue<br> San Francisco, CA
                            94107<br><abbr title="Phone">Phone:</abbr> (123) 456-7890</address>
                        <address class="col-6"><strong>Email</strong><br>

                            <a href="mailto:#">info@fashionboutique.com</a>
                        </address>
                        <hr>
                        <blockquote>If you have any questions or need assistance, please don't hesitate to contact
                            us.<small>Use <code>email</code> Our customer support team is available to help you.</small>
                        </blockquote>

                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
</div>



@endsection