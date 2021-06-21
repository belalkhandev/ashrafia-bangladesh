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
            <div class="col-md-6">
                <div class="input-item">
                    <label for="" class="input-item-label">Name</label>
                    <input type="text" name="name" placeholder="Name" class="input-bordered">
                    <span class="text-danger"></span>
                </div>
                <div class="input-item">
                    <label for="" class="input-item-label">Head of family</label>
                    <input type="text" name="head_of_family" placeholder="Head of family" class="input-bordered">
                    <span class="text-danger"></span>
                </div>
                <div class="input-item">
                    <label for="" class="input-item-label">Blood Group</label>
                    <select class="input-bordered" name="blood_group">
                        <option value="">Select Blood Group</option>
                    </select>
                    <span class="text-danger"></span>
                </div>
                <div class="input-item">
                    <label for="" class="input-item-label">Place</label>
                    <input type="text" name="place" placeholder="place" class="input-bordered">
                    <span class="text-danger"></span>
                </div>
                <div class="input-item">
                    <label for="" class="input-item-label">NID</label>
                    <input type="text" name="NID" placeholder="NID" class="input-bordered">
                    <span class="text-danger"></span>
                </div>
                <div class="input-item">
                    <label for="" class="input-item-label">Division</label>
                    <div class="select-wrapper">
                        <select class="input-bordered" name="gender">
                            <option value="">Select Division</option>
                        </select>
                    </div>
                    <span class="text-danger"></span>
                </div>
                <div class="input-item">
                    <label for="" class="input-item-label">Upazila</label>
                    <div class="select-wrapper">
                        <select class="input-bordered" name="gender">
                            <option value="">Select Upazila</option>
                        </select>
                    </div>
                    <span class="text-danger"></span>
                </div>
                <div class="input-item">
                    <label for="" class="input-item-label">Telephone (Home)</label>
                    <input type="text" name="telephone_home" placeholder="Telephone(Home)" class="input-bordered">
                    <span class="text-danger"></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-item">
                    <label for="" class="input-item-label">Father/Husband's Name</label>
                    <input type="text" name="father_name" placeholder="Father or Husband name" class="input-bordered">
                    <span class="text-danger"></span>
                </div>
                <div class="input-item">
                    <label for="" class="input-item-label">Gender</label>
                    <div class="select-wrapper">
                        <select class="input-bordered" name="gender">
                            <option value="">Select</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <span class="text-danger"></span>
                </div>
                <div class="input-item">
                    <label for="" class="input-item-label">Birthdate</label>
                    <input type="text" name="birthdate" placeholder="YYYY-MM-DD" class="input-bordered">
                    <span class="text-danger"></span>
                </div>    
                <div class="input-item">
                    <label for="" class="input-item-label">Nationality</label>
                    <input type="text" name="nationality" placeholder="Nationality" class="input-bordered">
                    <span class="text-danger"></span>
                </div>            
                <div class="input-item">
                    <label for="" class="input-item-label">Profession</label>
                    <input type="text" name="profession" placeholder="Profession" class="input-bordered">
                    <span class="text-danger"></span>
                </div>
                <div class="input-item">
                    <label for="" class="input-item-label">District</label>
                    <div class="select-wrapper">
                        <select class="input-bordered" name="gender">
                            <option value="">Select District</option>
                        </select>
                    </div>
                    <span class="text-danger"></span>
                </div>
                <div class="input-item">
                    <label for="" class="input-item-label">Home Address</label>
                    <input type="text" name="home_address" placeholder="Home address" class="input-bordered">
                    <span class="text-danger"></span>
                </div>
                <div class="input-item">
                    <label for="" class="input-item-label">Mobile No</label>
                    <input type="text" name="telephone_home" placeholder="Telephone(Home)" class="input-bordered">
                    <span class="text-danger"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="input-item">
                    <label for="" class="input-item-label">Office address</label>
                    <input type="text" name="office_address" placeholder="Office address" class="input-bordered">
                    <span class="text-danger"></span>
                </div>
                <div class="input-item">
                    <label for="" class="input-item-label">Fax</label>
                    <input type="text" name="fax" placeholder="Fax" class="input-bordered">
                    <span class="text-danger"></span>
                </div>
                <div class="input-item">
                    <label for="" class="input-item-label">Contact number</label>
                    <input type="text" name="contact_number" placeholder="Contact number" class="input-bordered">
                    <span class="text-danger"></span>
                </div>                
                <div class="input-item">
                    <label for="" class="input-item-label">Website</label>
                    <input type="text" name="website" placeholder="Website" class="input-bordered">
                    <span class="text-danger"></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-item">
                    <label for="" class="input-item-label">Telephone(Office)</label>
                    <input type="text" name="telephone_office" placeholder="Telephone Office" class="input-bordered">
                    <span class="text-danger"></span>
                </div>                
                <div class="input-item">
                    <label for="" class="input-item-label">Emergency Contact</label>
                    <input type="text" name="emergency_contact" placeholder="Emergency Contact" class="input-bordered">
                    <span class="text-danger"></span>
                </div>                
                <div class="input-item">
                    <label for="" class="input-item-label">Email address </label>
                    <input type="text" name="email" placeholder="Email address" class="input-bordered">
                    <span class="text-danger"></span>
                </div> 
                <div class="input-item">
                    <label for="" class="input-item-label">Disciple/Mureed of </label>
                    <input type="text" name="disciple_of" placeholder="Disciple/Mureed of" class="input-bordered">
                    <span class="text-danger"></span>
                </div>           
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="input-item input-with-label">
                    <label class="input-item-label">Photo Upload</label>
                    <div class="relative">
                        <em class="input-file-icon fas fa-upload"></em>
                        <input type="file" class="input-file" name="photo" id="file-01">
                        <label for="file-01">Choose a file</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group text-right">
            <button class="btn btn-primary" type="submit" onclick="formSubmit(this, event)">Register</button>
        </div>
        {!! Form::close() !!}
    </div>
</div><!-- .card -->
</div><!-- .row -->


@endsection
