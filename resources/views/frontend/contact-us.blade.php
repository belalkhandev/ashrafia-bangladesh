@extends('frontend.layouts.master')

@section('content')
    {{-- page title --}}
    @include('frontend.partials._page_title')

    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <img style="width:90%; height: 270px" src="https://www.poornima.org/wp-content/uploads/2019/11/PGC-Blog-Banner-1366x546-1.jpg" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="section-content">
        <div class="container contact-form">

                {!! Form::open(['route' => 'frontend.contact-us.store', 'method' => 'POST']) !!}
                <h3>Contact Us</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Your Name *" value="" required />
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Your Email *" value="" required />
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" class="form-control" placeholder="Your Phone Number *" value="" required />
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea name="message" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;" required></textarea>
                            <span class="text-danger">{{ $errors->first('message') }}</span>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="btnSubmit" onclick="submit_form(this, event)" class="btnContact" value="Send Message" />
                        </div>
                    </div>

                </div>
            {!! Form::close() !!}
        </div>
    </section>

@endsection
@push('header-styles')
    <style>
        .contact-form{
            background: #fff;
            margin-top: -5%;
            width: 70%;
        }
        .contact-form .form-control{
            border-radius:1rem;
        }
        .contact-image{
            text-align: center;
        }
        .contact-image img{
            border-radius: 6rem;
            width: 11%;
            margin-top: -3%;
            transform: rotate(29deg);
        }
        .contact-form form{
            padding: 14%;
        }
        .contact-form form .row{
            margin-bottom: -7%;
        }
        .contact-form h3{
            margin-bottom: 8%;
            margin-top: -10%;
            text-align: center;
            color: #0062cc;
        }
        .contact-form .btnContact {
            width: 50%;
            border: none;
            border-radius: 1rem;
            padding: 1.5%;
            background: #dc3545;
            font-weight: 600;
            color: #fff;
            cursor: pointer;
        }
        .btnContactSubmit
        {
            width: 50%;
            border-radius: 1rem;
            padding: 1.5%;
            color: #fff;
            background-color: #0062cc;
            border: none;
            cursor: pointer;
        }
    </style>
@endpush
