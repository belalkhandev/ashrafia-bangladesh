@extends('layouts.master')

@section('content')

    <div class="page-section-area mb-50">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="page-section">
                        <h2>{{ __('lang.important_links') }}</h2>
                    </div>
                    <div class="page-content">
                        <ul>
                            <li class="mb-15">
                                <a href="https://youtube.com/c/IZHARCHANNEL" class="btn btn-outline-danger">
                                    <i class="fab fa-youtube"></i>
                                    <span class="ml-10">{{ __('lang.youtube_cannel') }}</span>
                                </a>
                            </li>
                            <li class="mb-15">
                                <a href="https://www.facebook.com/izharchannel/" class="btn btn-outline-primary">
                                    <i class="fab fa-facebook-square"></i>
                                    <span class="ml-10">{{ __('lang.facebook') }} {{ __('lang.page') }}</span>
                                </a>
                            </li>
                            <li class="mb-15">
                                <a href="https://www.facebook.com/groups/huzoorquaidemillat/" class="btn btn-outline-primary">
                                    <i class="fab fa-facebook-square"></i>
                                    <span class="ml-10">{{ __('lang.facebook') }} {{ __('lang.group') }}</span>
                                </a>
                            </li>
                            <li class="mb-15">
                                <a href="{{ asset('files/importance-of-bayat.pdf') }}" target="_blank" class="btn btn-outline-success">
                                    <i class="fas fa-book-reader"></i>
                                    <span class="ml-10">{{ __('lang.importance_bayat') }}</span>
                                </a>
                            </li>
                            <li class="mb-15">
                                <a href="{{ asset('files/biography-of-huzoor-quied-e-millat.pdf') }}" target="_blank" class="btn btn-outline-success">
                                    <i class="fas fa-book-reader"></i>
                                    <span class="ml-10">{{ __('lang.huzoor_bio') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="page-section-area mb-30">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="page-section">
                                        <h2>{{ __('lang.books') }}</h2>
                                    </div>
                                    <div class="page-content">
                                        <ul>
                                            <li>
                                                <a href="{{ asset('files/shajraye-ashrafia.pdf') }}" download class="btn btn-youtube btn-primary">
                                                    <i class="fas fa-book-reader"></i> 
                                                    শাজরায়ে ক্বাদেরীয়া চিশতীয়া আশরাফীয়া
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="page-section-area mb-30">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="page-section">
                                        <h2>{{ __('lang.madrasha') }}</h2>
                                    </div>
                                    <div class="page-content">
                                        <h4>{{ __('lang.madrasha_name') }}</h4>
                                        <p>{{ __('lang.madrasha_address') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="page-section-area">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="page-section">
                                        <h2>{{ __('lang.central_khankah') }}</h2>
                                    </div>
                                    <div class="page-content">
                                        <p>{{ __('lang.central_khankah_address') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    

    <div class="page-section-area mb-50">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-section">
                        <h2>{{ __('lang.ashrafi_helpline') }}</h2>
                    </div>
                    <div class="helpline-cards">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="helpline-card">
                                    <h4>Md.Masudur Rahman Ashrafi</h4>
                                    <p>Executive Vice President of Central Committee  of Anjuman-e-Ashrafia Bangladesh. </p>
                                    <p>
                                        <i class="fas fa-phone"></i>
                                        +8801711536586
                                    </p>
                                    <p>
                                        <i class="fas fa-envelope"></i>
                                        masudur.rahman@smaengineering.net
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="helpline-card">
                                    <h4>Advocate Mahbubul Alam Chowdhury Ashrafi.</h4>
                                    <p>(General  Secretary of Central Committee of Anjuman-e-Ashrafia Bangladesh)</p>
                                    <p>
                                        <i class="fas fa-phone"></i>
                                        +8801713001751
                                    </p>
                                    <p>
                                        <i class="fab fa-whatsapp"></i>
                                        +8801842001751
                                    </p>
                                    <p>
                                        <i class="fas fa-envelope"></i>
                                        mahbub.ashrafe@gmail.com 
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="helpline-card">
                                    <h4>Dr.Syed Golam Gous Ashrafi</h4>
                                    <p>
                                        <i class="fas fa-phone"></i>
                                        +8801785857116
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="helpline-card">
                                    <h4>Mawlana Mohammad Afnanur Rahman Ashrafi</h4>
                                    <p>
                                        <i class="fas fa-phone"></i>
                                        +8801972877821
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-section">
                        <h2>{{ __('lang.donate') }}</h2>
                    </div>
                </div>
                <div class="donation-card">
                    <h4>Anjuman-e-Ashrafia Bangladesh.</h4>
                    <p>
                        <strong>CD A/C N0:</strong>
                        2775- 9010-21510
                    </p>
                    <p>
                        <i class="fas fa-university"></i>
                        {{ __('lang.bank') }}
                    </p>
                    <p>
                        <i class="fas fa-map-marker-alt"></i>
                        {{ __('lang.bank_address') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section-area mt-50">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <embed src="{{ asset('files/Afnan.pdf') }}" style="width: 100%;height: 100vh" />
                </div>
            </div>
        </div>
    </div>

@endsection
