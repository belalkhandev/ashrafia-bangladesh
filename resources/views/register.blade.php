@extends('layouts.master')

@section('content')

    <div class="box">
        <div class="box-header">
            <h5 class="box-title">{{ __('reg.new_register') }}</h5>
        </div>
        {!! Form::open(['route' => 'fr.register.store', 'method' => 'POST']) !!}
        <div class="box-body">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">{{ __('lang.name') }}</label>
                        <input type="text" name="name" placeholder="{{ __('lang.name') }}" class="form-control">
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">{{ __('reg.father_name') }}</label>
                        <input type="text" name="father_name" placeholder="{{ __('reg.father_name') }}" class="form-control">
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">{{ __('reg.family_head') }}</label>
                        <input type="text" name="head_of_family" placeholder="{{ __('reg.family_head') }}" class="form-control">
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">{{ __('lang.gender') }}</label>
                        <div class="select-wrapper">
                        {!! Form::select('gender', getGenderType(), null, ['placeholder' => __('lang.select_gender'), 'class' => 'form-control']) !!}
                        </div>
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">{{ __('reg.birthdate') }}</label>
                        <input type="text" name="birthdate" placeholder="YYYY-MM-DD" class="form-control datepicker" autocomplete="off">
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">{{ __('reg.blood_group') }}</label>
                        <div class="select-wrapper">
                        {!! Form::select('blood_group', getBloodGroups(), null, ['placeholder' => __('reg.blood_group'), 'class' => 'form-control']) !!}
                        </div>
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">{{ __('reg.place') }}</label>
                        <input type="text" name="place" placeholder="{{ __('reg.place') }}" class="form-control">
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">{{ __('reg.nid') }}</label>
                        <input type="text" name="nid" placeholder="{{ __('reg.nid') }}" class="form-control">
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">{{ __('reg.nationality') }}</label>
                        <input type="text" name="nationality" placeholder="{{ __('reg.nationality') }}" class="form-control">
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">{{ __('reg.division') }}</label>
                        <div class="select-wrapper">
                        {!! Form::select('division_id', formSelectOptions($divisions), null, ['placeholder' => __('reg.select_division'), 'class' => 'form-control', 'id' => 'division']) !!}
                        </div>
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">{{ __('reg.district') }}</label>
                        <div class="select-wrapper">
                        {!! Form::select('district_id', [], null, ['placeholder' => __('reg.district'), 'class' => 'form-control', 'id' => 'district']) !!}
                        </div>
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">{{ __('reg.upazila') }}</label>
                        <div class="select-wrapper">
                        {!! Form::select('upazila_id', [], null, ['placeholder' => __('reg.select_upazila'), 'class' => 'form-control', 'id' => 'upazila']) !!}
                        </div>
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">{{ __('reg.home_address') }}</label>
                        <input type="text" name="home_address" placeholder="{{ __('reg.home_address') }}" class="form-control">
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">{{ __('reg.mobile_no') }}</label>
                        <input type="text" name="mobile" placeholder="{{ __('reg.mobile_no') }}" class="form-control">
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">{{ __('reg.telephone_home') }}</label>
                        <input type="text" name="telephone_home" placeholder="{{ __('reg.telephone_home') }}" class="form-control">
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">{{ __('reg.profession') }}</label>
                        <input type="text" name="profession" placeholder="{{ __('reg.profession') }}" class="form-control">
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">{{ __('reg.office_address') }}</label>
                        <input type="text" name="office_address" placeholder="{{ __('reg.office_address') }}" class="form-control">
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">{{ __('reg.telephone_office') }}</label>
                        <input type="text" name="telephone_office" placeholder="{{ __('reg.telephone_office') }}" class="form-control">
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">{{ __('reg.facebook_id') }}</label>
                        <input type="text" name="fax" placeholder="{{ __('reg.facebook_id') }}" class="form-control">
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">{{ __('reg.emergency_contact') }}</label>
                        <input type="text" name="emergency_contact" placeholder="{{ __('reg.emergency_contact') }}" class="form-control">
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">{{ __('reg.emergency_telephone') }}</label>
                        <input type="text" name="emergency_telephone" placeholder="{{ __('reg.emergency_telephone') }}" class="form-control">
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">{{ __('reg.email') }} </label>
                        <input type="text" name="email" placeholder="{{ __('reg.email') }}" class="form-control">
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">{{ __('reg.website') }}</label>
                        <input type="text" name="website" placeholder="{{ __('reg.website') }}" class="form-control">
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">{{ __('reg.disciple') }} </label>
                        <input type="text" name="disciple_of" placeholder="{{ __('reg.disciple') }}" class="form-control">
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label>{{ __('reg.photo_upload') }}</label>
                        <div class="relative">
                            <input type="file" class="input-file" name="photo" id="file-01">
                        </div>
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>

            <h2 class="form-section-title">{{ __('reg.account_security') }}</h2>
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label>{{ __('reg.password') }}</label>
                        <input type="password" name="password" class="form-control" placeholder="{{ __('reg.password') }}">
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label>{{ __('reg.confirm_password') }}</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="{{ __('reg.confirm_password') }}">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button class="btn btn-primary" type="submit" onclick="formSubmit(this, event)">{{ __('reg.register_now') }}</button>
        </div>
        {!! Form::close() !!}
    </div>

    <template id="selectOption">
        <option value=""></option>
    </template>
@endsection


@push('footer-scripts')
<script>
    (function($){
        "use-strict"

        jQuery(document).ready(function() {
            // division change
            $(document).on('change', '#division', function () {
                let division_id = $(this).val();

                if (division_id) {
                    let _token = $('input[name="_token"]').val();
                    const method = 'POST';

                    $.ajax("{{ route('get.district') }}", {
                        method: method,
                        data: {
                            division_id: division_id,
                            _token:_token
                        },
                        beforeSend: function (xhr) {
                            $('#district').html('<option value="">Loading......</option>');
                            $('#upazila').html('<option value="">Select Upazila</option>');
                        },
                        success: function (res, status, xhr) {
                            if (res.status) {
                                let districts = res.data;
                                const selectElement = document.getElementById('district');
                                const optionTemplate = document.getElementById('selectOption');
                                $('#district').html('<option vaule="">Select District</option>');

                                for (const district of districts) {
                                    const optionEl = document.importNode(optionTemplate.content, true);
                                    optionEl.querySelector('option').textContent = district.name;
                                    optionEl.querySelector('option').value = district.id;
                                    selectElement.append(optionEl);
                                }
                            }
                        },
                        errors: function (jqXhr, textStatus, errorMessage) {
                            console.log(textStatus);
                        }
                    });
                } else {
                    $('#upazila').html('<option value="">Select Upazila</option>');
                    $('#district').html('<option value="">Select District</option>');
                }
            });

            $(document).on('change', '#district', function () {
                let district_id = $(this).val();

                if (district_id) {
                    let _token = $('input[name="_token"]').val();
                    const method = 'POST';

                    $.ajax("{{ route('get.upazila') }}", {
                        method: method,
                        data: {
                            district_id: district_id,
                            _token:_token
                        },
                        beforeSend: function (xhr) {
                            $('#upazila').html('<option value="">Loading......</option>');
                        },
                        success: function (res, status, xhr) {
                            if (res.status) {
                                let upazilas = res.data;
                                const selectElement = document.getElementById('upazila');
                                const optionTemplate = document.getElementById('selectOption');
                                $('#upazila').html('<option value="">Select Upazila</option>');

                                for (const upazila of upazilas) {
                                    const optionEl = document.importNode(optionTemplate.content, true);
                                    optionEl.querySelector('option').textContent = upazila.name;
                                    optionEl.querySelector('option').value = upazila.id;
                                    selectElement.append(optionEl);
                                }
                            }
                        },
                        errors: function (jqXhr, textStatus, errorMessage) {
                            console.log(textStatus);
                        }
                    });
                } else {
                    $('#district').html('<option value="">Select Upazila</option>');
                }
            });
        });

    }(jQuery))
</script>
@endpush
