<!DOCTYPE html>
<html lang="en" class="js">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Anjuman e Asharfia Bangladesh">

    <title>Anjuman-e-Ashrafia Bangladesh</title>
    
    <!-- vendors -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/fontawesome/css/all.min.css') }}">
    <!-- main styles-->
    <link rel="stylesheet" href="{{ asset('assets/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
</head>

<body>

    <!-- header -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="logo text-center">
                        <a href="{{ route('fr.home') }}">
                            <img src="{{ asset('assets/images/app_logo.png') }}" alt="">
                            <h2>{{ __('lang.logo_name') }}</h2>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- /header -->


    @if($user->mureed)
    <div class="box">
        <div class="box-header">
            <h5 class="box-title">{{ __('lang.user_profile') }}</h5>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="user-profile">
                        <img src="{{ $user->mureed ? $user->mureed->photo : "" }}" alt="no-image" style="width: 150px">
                        <h3>{{ $user->name }}</h3>
                        <p>
                            <i class="fas fa-phone-alt"></i>
                            <span>{{ $user->mureed->mobile }}</span>
                        </p>
                        <p>
                            <i class="fas fa-envelope"></i>
                            <span>{{ $user->mureed->email }}</span>
                        </p>
                        <p>
                            <i class="fas fa-globe"></i>
                            <span>{{ $user->mureed->website }}</span>
                        </p>
                    </div>
                </div>
                <div class="col-md-9 col-sm-9 col-md-9 col-xs-9">
                    <div class="user-profile">
                        <h5 class="profile-section-title">{{ __('lang.personal_information') }}</h5>
                        <table class="table profile-table">
                            <tr>
                                <th>{{ __('lang.name') }}</th>
                                <td>{{ $user->mureed->name }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('reg.father_name') }}</th>
                                <td>{{ $user->mureed->father_name }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('reg.family_head') }}</th>
                                <td>{{ $user->mureed->head_of_family }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('lang.gender') }}</th>
                                <td>{{ Str::ucfirst($user->mureed->gender) }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('reg.birthdate') }}</th>
                                <td>{{ user_formatted_date($user->mureed->birthdate) }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('reg.age') }}</th>
                                <td>{{ $user->mureed->age }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('reg.blood_group') }}</th>
                                <td>{{ $user->mureed->blood_group }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('reg.place') }}</th>
                                <td>{{ $user->mureed->place }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('reg.nid') }}</th>
                                <td>{{ $user->mureed->nid }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('reg.nationality') }}</th>
                                <td>{{ $user->mureed->nationality }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('reg.profession') }}</th>
                                <td>{{ $user->mureed->profession }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('reg.disciple') }}</th>
                                <td>{{ $user->mureed->disciple_of }}</td>
                            </tr>
                        </table>

                        <h5 class="profile-section-title">{{ __('lang.contact_address') }}</h5>
                        <table class="table profile-table">
                            <tr>
                                <th>{{ __('reg.division') }}</th>
                                <td>{{ $user->mureed->division->name }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('reg.district') }}</th>
                                <td>{{ $user->mureed->district->name }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('reg.upazila') }}</th>
                                <td>{{ $user->mureed->upazila ? $user->mureed->upazila->name : "-" }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('reg.home_address') }}</th>
                                <td>{{ $user->mureed->home_address }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('reg.mobile_no') }}</th>
                                <td>{{ user_formatted_date($user->mureed->mobile) }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('reg.telephone_home') }}</th>
                                <td>{{ $user->mureed->telephone_home }}</td>
                            </tr>                            
                            <tr>
                                <th>{{ __('reg.facebook_id') }}</th>
                                <td>{{ $user->mureed->fax }}</td>
                            </tr>
                        </table>

                        <h5 class="profile-section-title">{{ __('lang.office_address') }}</h5>
                        <table class="table profile-table">
                            <tr>
                                <th>{{ __('reg.office_address') }}</th>
                                <td>{{ $user->mureed->office_address }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('reg.telephone_office') }}</th>
                                <td>{{ $user->mureed->district->name }}</td>
                            </tr>
                        </table>

                        <h5 class="profile-section-title">{{ __('lang.emergency_contact') }}</h5>
                        <table>
                            <tr>
                                <th>{{ __('reg.emergency_contact') }}</th>
                                <td>{{ $user->mureed->emergency_contact }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('reg.emergency_telephone') }}</th>
                                <td>{{ $user->mureed->emergency_telephone }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif


    <!-- JavaScript (include all script here) -->
    <script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/fontawesome/js/all.min.js') }}"></script>
    <script>
        window.print()

        window.addEventListener('afterprint', (event) => {
            window.close()
        });
    </script>
    {{--  Ajax Submitter  --}}
</body>

</html>