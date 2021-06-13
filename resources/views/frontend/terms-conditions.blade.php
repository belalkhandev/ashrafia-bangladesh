@extends('frontend.layouts.master')

@section('content')
    {{-- page title --}}
    @include('frontend.partials._page_title')

    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    @if($termcondition)
                        <img style="width:90%; height: 270px" src="{{ asset($termcondition->image) }}" alt="">
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section class="section-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p class="text-left" style="font-size: 20px;margin-bottom: 20px">
                        @if($termcondition)
                            {{ strip_tags($termcondition->long_description) }}
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
