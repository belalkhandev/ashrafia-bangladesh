@extends('layouts.master')

@section('content')

    <div class="box">
        <div class="box-header">
            <h5 class="box-title">New Register</h5>
        </div>
        {!! Form::open(['route' => 'fr.register.store', 'method' => 'POST']) !!}
        <div class="box-body">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" placeholder="Name" class="form-control">
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">Father/Husband's Name</label>
                        <input type="text" name="father_name" placeholder="Father or Husband name" class="form-control">
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">Head of family</label>
                        <input type="text" name="head_of_family" placeholder="Head of family" class="form-control">
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">Gender</label>
                        <div class="select-wrapper">
                        {!! Form::select('gender', getGenderType(), null, ['placeholder' => 'Select gender', 'class' => 'form-control']) !!}
                        </div>
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">Birthdate</label>
                        <input type="text" name="birthdate" placeholder="dd/mm/yyyy" class="form-control date-picker">
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">Blood Group</label>
                        <div class="select-wrapper">
                        {!! Form::select('blood_group', getBloodGroups(), null, ['placeholder' => 'Select blood group', 'class' => 'form-control']) !!}
                        </div>
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">Place</label>
                        <input type="text" name="place" placeholder="place" class="form-control">
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">NID</label>
                        <input type="text" name="nid" placeholder="NID" class="form-control">
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">Nationality</label>
                        <input type="text" name="nationality" placeholder="Nationality" class="form-control">
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">Division</label>
                        <div class="select-wrapper">
                        {!! Form::select('division_id', formSelectOptions($divisions), null, ['placeholder' => 'Select Division', 'class' => 'form-control', 'id' => 'division']) !!}
                        </div>
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">District</label>
                        <div class="select-wrapper">
                        {!! Form::select('district_id', [], null, ['placeholder' => 'Select District', 'class' => 'form-control', 'id' => 'district']) !!}
                        </div>
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">Upazila</label>
                        <div class="select-wrapper">
                        {!! Form::select('upazila_id', [], null, ['placeholder' => 'Select upazila', 'class' => 'form-control', 'id' => 'upazila']) !!}
                        </div>
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">Home Address</label>
                        <input type="text" name="home_address" placeholder="Home address" class="form-control">
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">Mobile No</label>
                        <input type="text" name="mobile" placeholder="Mobile No" class="form-control">
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">Telephone (Home)</label>
                        <input type="text" name="telephone_home" placeholder="telephone home" class="form-control">
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">Profession</label>
                        <input type="text" name="profession" placeholder="Profession" class="form-control">
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">Office address</label>
                        <input type="text" name="office_address" placeholder="Office address" class="form-control">
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">Telephone(Office)</label>
                        <input type="text" name="telephone_office" placeholder="Telephone Office" class="form-control">
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">Fax</label>
                        <input type="text" name="fax" placeholder="Fax" class="form-control">
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">Emergency Contact</label>
                        <input type="text" name="emergency_contact" placeholder="Emergency Contact" class="form-control">
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">Contact number</label>
                        <input type="text" name="contact_number" placeholder="Contact number" class="form-control">
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">Email address </label>
                        <input type="text" name="email" placeholder="Email address" class="form-control">
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">Website</label>
                        <input type="text" name="website" placeholder="Website" class="form-control">
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="">Disciple/Mureed of </label>
                        <input type="text" name="disciple_of" placeholder="Disciple/Mureed of" class="form-control">
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label>Photo Upload</label>
                        <div class="relative">
                            <input type="file" class="input-file" name="photo" id="file-01">
                        </div>
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>

            <h2 class="form-section-title">Account Security</h2>
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <span class="text-danger"></span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirmation">
                        <span class="text-danger"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button class="btn btn-primary" type="submit" onclick="formSubmit(this, event)">Register Now</button>
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
