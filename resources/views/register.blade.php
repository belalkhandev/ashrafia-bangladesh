@extends('layouts.master')

@section('content')
<div class="content-area card">
    <div class="card-innr card-innr-fix2">
        <div class="card-head">
            <h6 class="card-title">Registraion</h6>
        </div>
        <div class="gaps-1x"></div><!-- .gaps -->
        {!! Form::open(['route' => 'fr.register.store', 'method' => 'POST']) !!} 
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="input-item">
                    <label for="" class="input-item-label">Name</label>
                    <input type="text" name="name" placeholder="Name" class="input-bordered">
                    <span class="text-danger"></span>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="input-item">
                    <label for="" class="input-item-label">Father/Husband's Name</label>
                    <input type="text" name="father_name" placeholder="Father or Husband name" class="input-bordered">
                    <span class="text-danger"></span>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="input-item">
                    <label for="" class="input-item-label">Head of family</label>
                    <input type="text" name="head_of_family" placeholder="Head of family" class="input-bordered">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="input-item">
                    <label for="" class="input-item-label">Gender</label>
                    <div class="select-wrapper">
                        {!! Form::select('gender', getGenderType(), null, ['placeholder' => 'Select gender', 'class' => 'input-bordered']) !!}
                    </div>
                    <span class="text-danger"></span>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="input-item">
                    <label for="" class="input-item-label">Birthdate</label>
                    <input type="text" name="birthdate" placeholder="dd/mm/yyyy" class="input-bordered date-picker">
                    <span class="text-danger"></span>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="input-item">
                    <label for="" class="input-item-label">Blood Group</label>
                    <div class="select-wrapper">
                        {!! Form::select('blood_group', getBloodGroups(), null, ['placeholder' => 'Select blood group', 'class' => 'input-bordered']) !!}
                    </div>
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="input-item">
                    <label for="" class="input-item-label">Place</label>
                    <input type="text" name="place" placeholder="place" class="input-bordered">
                    <span class="text-danger"></span>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="input-item">
                    <label for="" class="input-item-label">NID</label>
                    <input type="text" name="NID" placeholder="NID" class="input-bordered">
                    <span class="text-danger"></span>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="input-item">
                    <label for="" class="input-item-label">Nationality</label>
                    <input type="text" name="nationality" placeholder="Nationality" class="input-bordered">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="input-item">
                    <label for="" class="input-item-label">Division</label>
                    <div class="select-wrapper">
                        {!! Form::select('division_id', formSelectOptions($divisions), null, ['placeholder' => 'Select Division', 'class' => 'input-bordered', 'id' => 'division']) !!}
                    </div>
                    <span class="text-danger"></span>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">                
                <div class="input-item">
                    <label for="" class="input-item-label">District</label>
                    <div class="select-wrapper">
                        {!! Form::select('district_id', [], null, ['placeholder' => 'Select District', 'class' => 'input-bordered', 'id' => 'district']) !!}
                    </div>
                    <span class="text-danger"></span>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">                
                <div class="input-item">
                    <label for="" class="input-item-label">Upazila</label>
                    <div class="select-wrapper">
                        {!! Form::select('upazila_id', [], null, ['placeholder' => 'Select upazila', 'class' => 'input-bordered', 'id' => 'upazila']) !!}
                    </div>
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="input-item">
                    <label for="" class="input-item-label">Home Address</label>
                    <input type="text" name="home_address" placeholder="Home address" class="input-bordered">
                    <span class="text-danger"></span>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="input-item">
                    <label for="" class="input-item-label">Mobile No</label>
                    <input type="text" name="mobile" placeholder="Mobile No" class="input-bordered">
                    <span class="text-danger"></span>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="input-item">
                    <label for="" class="input-item-label">Telephone (Home)</label>
                    <input type="text" name="telephone_home" placeholder="telephone home" class="input-bordered">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="input-item">
                    <label for="" class="input-item-label">Profession</label>
                    <input type="text" name="profession" placeholder="Profession" class="input-bordered">
                    <span class="text-danger"></span>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="input-item">
                    <label for="" class="input-item-label">Office address</label>
                    <input type="text" name="office_address" placeholder="Office address" class="input-bordered">
                    <span class="text-danger"></span>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="input-item">
                    <label for="" class="input-item-label">Telephone(Office)</label>
                    <input type="text" name="telephone_office" placeholder="Telephone Office" class="input-bordered">
                    <span class="text-danger"></span>
                </div> 
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="input-item">
                    <label for="" class="input-item-label">Fax</label>
                    <input type="text" name="fax" placeholder="Fax" class="input-bordered">
                    <span class="text-danger"></span>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="input-item">
                    <label for="" class="input-item-label">Emergency Contact</label>
                    <input type="text" name="emergency_contact" placeholder="Emergency Contact" class="input-bordered">
                    <span class="text-danger"></span>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="input-item">
                    <label for="" class="input-item-label">Contact number</label>
                    <input type="text" name="contact_number" placeholder="Contact number" class="input-bordered">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="input-item">
                    <label for="" class="input-item-label">Email address </label>
                    <input type="text" name="email" placeholder="Email address" class="input-bordered">
                    <span class="text-danger"></span>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="input-item">
                    <label for="" class="input-item-label">Website</label>
                    <input type="text" name="website" placeholder="Website" class="input-bordered">
                    <span class="text-danger"></span>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="input-item">
                    <label for="" class="input-item-label">Disciple/Mureed of </label>
                    <input type="text" name="disciple_of" placeholder="Disciple/Mureed of" class="input-bordered">
                    <span class="text-danger"></span>
                </div>           
            </div>            
        </div>

        <div class="row">            
            <div class="col-md-4 col-sm-6">
                <div class="input-item input-with-label">
                    <label class="input-item-label">Password</label>
                    <input type="password" name="password" class="input-bordered" placeholder="Password" id="">
                    <span class="text-danger"></span>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="input-item input-with-label">
                    <label class="input-item-label">Password</label>
                    <input type="password" name="password_confirmation" class="input-bordered" placeholder="Password Confirmation" id="">
                    <span class="text-danger"></span>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="input-item input-with-label">
                    <label class="input-item-label">Photo Upload</label>
                    <div class="relative">
                        <em class="input-file-icon fas fa-upload"></em>
                        <input type="file" class="input-file" name="photo" id="file-01">
                        <label for="file-01">Choose a file</label>
                    </div>
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
        
        <div class="form-group text-right">
            <button class="btn btn-primary" type="submit" onclick="formSubmit(this, event)">Register</button>
        </div>
        {!! Form::close() !!}
    </div>
</div><!-- .card -->
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