@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="token-statistics card card-token height-auto">
            <div class="card-innr">
                <div class="token-balance token-balance-with-icon">
                    <div class="token-balance-icon"><img src="images/logo-light-sm.png" alt="logo"></div>
                    <div class="token-balance-text">
                        <h6 class="card-sub-title">Tokens Balance</h6><span class="lead">120,000,000
                            <span>TWZ</span></span>
                    </div>
                </div>
                <div class="token-balance token-balance-s2">
                    <h6 class="card-sub-title">Your Contribution</h6>
                    <ul class="token-balance-list">
                        <li class="token-balance-sub"><span class="lead">2.646</span><span
                                class="sub">ETH</span></li>
                        <li class="token-balance-sub"><span class="lead">1.265</span><span
                                class="sub">BTC</span></li>
                        <li class="token-balance-sub"><span class="lead">6.506</span><span
                                class="sub">LTC</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div><!-- .col -->
    <div class="col-lg-8">
        <div class="token-information card card-full-height">
            <div class="row no-gutters height-100">
                <div class="col-md-6 text-center">
                    <div class="token-info"><img class="token-info-icon" src="images/logo-sm.png"
                            alt="logo-sm">
                        <div class="gaps-2x"></div>
                        <h1 class="token-info-head text-light">1 ETH = 1000 TWZ</h1>
                        <h5 class="token-info-sub">1 ETH = 254.05 USD</h5>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="token-info bdr-tl">
                        <div>
                            <ul class="token-info-list">
                                <li><span>Token Name:</span>TokenWiz</li>
                                <li><span>Ticket Symbol:</span>TWZ</li>
                            </ul> <a href="#" class="btn btn-primary"><em
                                    class="fas fa-download mr-3"></em>Download Whitepaper</a>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .card -->
    </div>
</div>
</div><!-- .row -->


@endsection
