@extends('layouts.base')

@section('base.content')
    
    <main class="main-content pt-50 pb-50">
        <div class="page-section-area mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-section">
                            <h2>Important Links</h2>
                        </div>
                        <div class="page-content">
                            <ul>
                                <li class="mb-15">
                                    <a href="https://youtube.com/c/IZHARCHANNEL" class="btn btn-outline-danger">
                                        <i class="fab fa-youtube"></i>
                                        Youtube Channel
                                    </a>
                                </li>
                                <li class="mb-15">
                                    <a href="https://www.facebook.com/izharchannel/" class="btn btn-outline-primary">
                                        <i class="fab fa-facebook"></i>
                                        Facebook Page
                                    </a>
                                </li>
                                <li class="mb-15">
                                    <a href="https://www.facebook.com/groups/huzoorquaidemillat/" class="btn btn-outline-primary">
                                        <i class="fab fa-facebook"></i>
                                        Facebook Group
                                    </a>
                                </li>
                            </ul>
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
                            <h2>Books</h2>
                        </div>
                        <div class="page-content">
                            <ul>
                                <li>
                                    <img src="{{ asset('files/book.png') }}" alt="" style="width: 180px; margin-bottom: 15px"> <br>
                                    <a href="{{ asset('files/shajraye-ashrafia.pdf') }}" download class="btn btn-youtube btn-primary">
                                        <i class="fas fa-download"></i> 
                                        শাজরায়ে ক্বাদেরীয়া চিশতীয়া আশরাফীয়া
                                    </a>
                                </li>
                            </ul>
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
                            <h2>Madrasha</h2>
                        </div>
                        <div class="page-content">
                            <h4>Al Jamiyatul Ashrafia Izharul Uloom.</h4>
                            <p>Sharkar Market,Ashuliya,Dhaka</p>
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
                            <h2>Ashrafi Helpline</h2>
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
                            <h2>Donate Us</h2>
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
                            Pubali Bank Ltd.
                        </p>
                        <p>
                            <i class="fas fa-map-marker-alt"></i>
                            Magbazar Branch.
                            Dhaka-1000. Bangladesh.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="page-section-area mt-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="img-book">
                            <img src="{{ asset('files/first.png') }}" alt=""><br>
                            <img src="{{ asset('files/second.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <p>
            বায়‘আত আরবী শব্দ। এর অর্থ- অঙ্গীকারবদ্ধ হওয়া, অনুগত হওয়া, ক্রয়-বিক্রয় করা প্রভৃতি।
সত্যিকার পীর ও মুরশিদেরবায়‘আত আরবী শব্দ। এর অর্থ- অঙ্গীকারবদ্ধ হওয়া, অনুগত হওয়া, ক্রয়-বিক্রয় করা প্রভৃতি। সত্যিকার পীর ও মুরশিদের নিকট বায়‘আত গ্রহণ করার অর্থ হলো- পীর ও মুরশিদের নিকট আল্লাহ্ তা‘আলাকে পাওয়ার সাধনায় অঙ্গীকারবদ্ধ হওয়া, কুরআন-সুন্নাহ্ মোতাবেক জীবন পরিচালনার ক্ষেত্রে তাঁর অনুগত হওয়া এবং আত্মবিলীনের জন্য তাঁর নিকট বিক্রি হয়ে যাওয়া (অর্থাৎ বিনাশর্তে পীরের সকল আদেশ মাথা পেতে নেয়া)।
 আল্লাহ্ তা‘আলার পথে সাধনার জন্য খাঁটি পীর ও মুরশিদের নিকট বায়‘আতের গুরুত্ব অপরিসীম। মানুষের হিদায়াতের জন্য আল্লাহ্ তা‘আলা যুগে যুগে নবী-রাসূলগণকে পৃথিবীতে প্রেরণ করেন। তাঁরা মানুষদেরকে আল্লাহ্’র 
রাস্তায় অবিচল থাকার জন্য বায়‘আত গ্রহণ করেন। যেমন, পবিত্র কুরআনে আল্লাহ্ তা‘আলা ইরশাদ করেন:
 দলীল- ১: নিকট বায়‘আত গ্রহণ করার অর্থ হলো- পীর ও মুরশিদের নিকট আল্লাহ্ তা‘আলাকে
পাওয়ার সাধনায় অঙ্গীকারবদ্ধ হওয়া, কুরআন-সুন্নাহ্ মোতাবেক জীবন পরিচালনার ক্ষেত্রে তাঁর অনুগত হওয়া এবং 
আত্মবিলীনের জন্য তাঁর নিকট বিক্রি হয়ে যাওয়া (অর্থাৎ বিনাশর্তে পীরের সকল আদেশ মাথা পেতে নেয়া)।
 আল্লাহ্ তা‘আলার পথে সাধনার জন্য খাঁটি পীর ও মুরশিদের নিকট বায়‘আতের গুরুত্ব অপরিসীম। মানুষের 
হিদায়াতের জন্য আল্লাহ্ তা‘আলা যুগে যুগে নবী-রাসূলগণকে পৃথিবীতে প্রেরণ করেন। তাঁরা মানুষদেরকে আল্লাহ্’র 
রাস্তায় অবিচল থাকার জন্য বায়‘আত গ্রহণ করেন। যেমন, পবিত্র কুরআনে আল্লাহ্ তা‘আলা ইরশাদ করেন:

        </p>
    
    </main>


@endsection()
