@extends('layouts.pdf')

@section('pdf.content')
    <div class="pdf-header">
        <h2>Anjuman-e-Ashrafia Bangladesh</h2>
    </div>
    <div class="pdf-body">
        <table>
            <tr>
                <td>
                    <div class="form-group">
                        <label for="">{{ __('lang.name') }}</label>
                        <input type="text" name="name" placeholder="Name" class="form-control" value="{{ $mureed->name }}">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <label for="">{{ __('reg.father_name') }}</label>
                        <input type="text" name="father_name" placeholder="Father or Husband name" class="form-control"  value="{{ $mureed->father_name }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group">
                        <label for="">{{ __('reg.family_head') }}</label>
                        <input type="text" name="head_of_family" placeholder="Head of family" class="form-control"  value="{{ $mureed->head_of_family }}">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <label for="">{{ __('lang.gender') }}</label>
                        <div class="select-wrapper">
                        {!! Form::select('gender', getGenderType(), $mureed->gender, ['placeholder' => 'Select gender', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group">
                        <label for="">{{ __('reg.birthdate') }}</label>
                        <input type="text" name="birthdate" placeholder="YYYY-MM-DD" class="form-control datepicker" autocomplete="off" value="{{ database_formatted_date($mureed->birthdate) }}">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <label for="">{{ __('reg.blood_group') }}</label>
                        <div class="select-wrapper">
                        {!! Form::select('blood_group', getBloodGroups(), $mureed->blood_group, ['placeholder' => 'Select blood group', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group">
                        <label for="">{{ __('reg.place') }}</label>
                        <input type="text" name="place" placeholder="place" class="form-control" value="{{ $mureed->place }}">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <label for="">{{ __('reg.nid') }}</label>
                        <input type="text" name="nid" placeholder="NID" class="form-control" value="{{ $mureed->nid }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group">
                        <label for="">{{ __('reg.nationality') }}</label>
                        <input type="text" name="nationality" placeholder="Nationality" class="form-control" value="{{ $mureed->nationality }}">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <label for="">{{ __('reg.division') }}</label>
                        <div class="select-wrapper">
                        {!! Form::select('division_id', formSelectOptions($divisions), $mureed->division_id, ['placeholder' => 'Select Division', 'class' => 'form-control', 'id' => 'division']) !!}
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group">
                        <label for="">{{ __('reg.district') }}</label>
                        <div class="select-wrapper">
                        {!! Form::select('district_id', formSelectOptions($districts), $mureed->district_id, ['placeholder' => 'Select District', 'class' => 'form-control', 'id' => 'district']) !!}
                        </div>
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <label for="">{{ __('reg.upazila') }}</label>
                        <div class="select-wrapper">
                        {!! Form::select('upazila_id', formSelectOptions($upazilas), $mureed->upazila_id, ['placeholder' => 'Select upazila', 'class' => 'form-control', 'id' => 'upazila']) !!}
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group">
                        <label for="">{{ __('reg.home_address') }}</label>
                        <input type="text" name="home_address" placeholder="Home address" class="form-control" value="{{ $mureed->home_address }}">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <label for="">{{ __('reg.mobile_no') }}</label>
                        <input type="text" name="mobile" placeholder="Mobile No" class="form-control" value="{{ $mureed->mobile }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group">
                        <label for="">{{ __('reg.telephone_home') }}</label>
                        <input type="text" name="telephone_home" placeholder="telephone home" class="form-control" value="{{ $mureed->telephone_home }}">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <label for="">{{ __('reg.profession') }}</label>
                        <input type="text" name="profession" placeholder="Profession" class="form-control" value="{{ $mureed->profession }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group">
                        <label for="">{{ __('reg.office_address') }}</label>
                        <input type="text" name="office_address" placeholder="Office address" class="form-control"  value="{{ $mureed->office_address }}">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <label for="">{{ __('reg.telephone_office') }}</label>
                        <input type="text" name="telephone_office" placeholder="Telephone Office" class="form-control"  value="{{ $mureed->telephone_office }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group">
                        <label for="">{{ __('reg.facebook_id') }}</label>
                        <input type="text" name="fax" placeholder="Facebook ID" class="form-control"  value="{{ $mureed->fax }}">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <label for="">{{ __('reg.emergency_contact') }}</label>
                        <input type="text" name="emergency_contact" placeholder="Emergency Contact" class="form-control"  value="{{ $mureed->emergency_contact }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group">
                        <label for="">{{ __('reg.emergency_telephone') }}</label>
                        <input type="text" name="emergency_telephone" placeholder="Emergency Telephone" class="form-control" value="{{ $mureed->emergency_telephone }}">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <label for="">{{ __('reg.email') }}</label>
                        <input type="text" name="email" placeholder="Email address" class="form-control" value="{{ $mureed->email }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group">
                        <label for="">{{ __('reg.website') }}</label>
                        <input type="text" name="website" placeholder="Website" class="form-control" value="{{ $mureed->website }}">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <label for="">{{ __('reg.disciple') }}</label>
                        <input type="text" name="disciple_of" placeholder="Disciple/Mureed of" class="form-control" value="{{ $mureed->disciple_of }}">
                    </div>
                </td>
            </tr>
        </table>
    </div>


@endsection