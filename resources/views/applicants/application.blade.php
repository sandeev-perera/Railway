{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Applicant Registration Form</h2>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error )
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif
        <form action="{{route('application.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Full Name -->
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="full_name" class="form-control" required>
            </div>

            <!-- NIC -->
            <div class="mb-3">
                <label class="form-label">NIC</label>
                <input type="text" name="nic" class="form-control" required>
            </div>

            <!-- Gender -->
            <div class="mb-3">
                <label class="form-label">Gender</label>
                <select name="gender" class="form-control" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>

            <!-- Date of Birth -->
            <div class="mb-3">
                <label class="form-label">Date of Birth</label>
                <input type="date" name="date_of_birth" class="form-control" required >
            </div>

            <!-- Address -->
            <div class="mb-3">
                <label class="form-label">Address</label>
                <input type="text" name="address" class="form-control mb-2" placeholder="No." required>
                <input type="text" name="district" class="form-control mb-2" placeholder="District" required>
                <input type="text" name="province" class="form-control" placeholder="Province" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Personal Contact</label>
                <input type="string" name="personal_contact" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Home Contact Optional</label>
                <input type="string" name="lan_contact" class="form-control">
            </div>


            <!-- Occupation -->
            <div class="mb-3">
                <label class="form-label">Occupation</label>
                <input type="text" name="occupation" class="form-control" required>
            </div>

            <!-- Occupation Address -->
            <div class="mb-3">
                <label class="form-label">Occupation Address</label>
                <input type="text" name="occupation_address" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Work Contact Optional</label>
                <input type="string" name="work_contact" class="form-control">
            </div>

            <!-- Closest Station to Home -->
            <div class="mb-3">
                <label class="form-label">Closest Station to Home</label>
                <input type="text" name="home_station" class="form-control" required>
            </div>

            <!-- Closest Station to Work -->
            <div class="mb-3">
                <label class="form-label">Closest Station to Work</label>
                <input type="text" name="work_station" class="form-control" required>
            </div>

            <!-- Upload Photo -->
            <div class="mb-3">
                <label class="form-label">Upload Photo</label>
                <input type="file" name="photo" class="form-control" accept="image/*" required>
            </div>

            <!-- Upload PDF (Source of Proof) -->
            <div class="mb-3">
                <label class="form-label">Upload PDF (Source of Proof)</label>
                <input type="file" name="source_of_proof" class="form-control" accept="application/pdf" required>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" id="password" name="password_confirmation" class="form-control" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Submit</button>
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error )
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> --}}



@extends("layouts.layout")
@section('disable_header', true)

@section('bg_image', url('images/support.jpg'))
@section("title", "Tap & Go | Application")

@section('content')
<div class="containe form-section">
    <h2 class="mb-4">Applicant Registration Form</h2>
    @if(session('error'))
        <div class="alert-danger-custom">
            {{ session('error') }}
        </div>
    @endif
    @if ($errors->any())
        <ul class="error-list">
            @foreach ($errors->all() as $error )
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('application.store') }}" method="POST" enctype="multipart/form-data" class="sticketform">
        @csrf

        <!-- Personal Information -->
    <button type="button" data-bs-toggle="collapse" data-bs-target="#personalInfo"
    style="background-color: #658397; color: white; width: 100%; text-align: left; 
    padding: 10px 20px; margin-bottom: 10px; font-size: 20px; border: none; cursor: pointer; "> <!--in-line CSS for sectioning design-->
    Personal Information
</button>

    <div class="collapse show" id="personalInfo">
        <label for="full_name" class="form-label">Applicant's Full Name <span style="color: red;">*</span></label> <!--Red star for the required fields-->
        <input type="text" id="full_name" name="full_name" class="form-control" required>
        
        <label for="nic" class="form-label">NIC <span style="color: red;">*</span></label> <!--Red star for the required fields-->
        <input type="text" id="nic" name="nic" required>
        
        <label for="gender" class="form-label">Gender <span style="color: red;">*</span></label> <!--Red star for the required fields-->
        <select name="gender" id="gender" class="form-control" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
        
        <label for="dob" class="form-label">Date of Birth <span style="color: red;">*</span></label> <!--Red star for the required fields-->
        <input type="date" name="date_of_birth" class="form-control" id="dob" required>
    </div>

    <div class="collapse" id="contactInfo">
        <label for="address" class="form-label">Address <span style="color: red;">*</span></label> <!--Red star for the required fields-->
        <input id='address' type="text" name="address" class="form-control mb-2" placeholder="No.122/A7, indrajothi mawatha, thanthirimulla, panadura"
            required>

            <select name="district" class="form-control mb-2" required>
                <option value="Ampara">Ampara</option>
                <option value="Anuradhapura">Anuradhapura</option>
                <option value="Badulla">Badulla</option>
                <option value="Batticaloa">Batticaloa</option>
                <option value="Colombo">Colombo</option>
                <option value="Galle">Galle</option>
                <option value="Gampaha">Gampaha</option>
                <option value="Hambantota">Hambantota</option>
                <option value="Jaffna">Jaffna</option>
                <option value="Kalutara">Kalutara</option>
                <option value="Kandy">Kandy</option>
                <option value="Kegalle">Kegalle</option>
                <option value="Kilinochchi">Kilinochchi</option>
                <option value="Kurunegala">Kurunegala</option>
                <option value="Mannar">Mannar</option>
                <option value="Matale">Matale</option>
                <option value="Matara">Matara</option>
                <option value="Monaragala">Monaragala</option>
                <option value="Mullaitivu">Mullaitivu</option>
                <option value="Nuwara Eliya">Nuwara Eliya</option>
                <option value="Polonnaruwa">Polonnaruwa</option>
                <option value="Puttalam">Puttalam</option>
                <option value="Ratnapura">Ratnapura</option>
                <option value="Trincomalee">Trincomalee</option>
                <option value="Vavuniya">Vavuniya</option>
            </select>

            <!-- Contact Information -->
    <button type="button" data-bs-toggle="collapse" data-bs-target="#personalInfo"
    style="background-color: #658397; color: white; width: 100%; text-align: left; 
    padding: 10px 20px; margin-bottom: 10px; font-size: 20px; border: none; cursor: pointer;">Contact Information</button> <!--in-line CSS for sectioning design-->




        <label for="phone" class="form-label">Personal Contact <span style="color: red;">*</span></label> <!--Red star for the required fields-->
        <input type="tel" id="phone" name="personal_contact" required>

        <label for="lan_phone" class="form-label">Home Contact (Optional)</label>
        <input type="tel" id="lan_phone" name="lan_contact">

    </div>

    <!-- Employment Details -->
    <button type="button" data-bs-toggle="collapse" data-bs-target="#personalInfo"
    style="background-color: #658397; color: white; width: 100%; text-align: left; 
    padding: 10px 20px; margin-bottom: 10px; font-size: 20px; border: none; cursor: pointer;">Employment Details</button> <!--in-line CSS for sectioning design-->
    <div class="collapse" id="employmentInfo">
        <label for="occupation" class="form-label">Occupation <span style="color: red;">*</span></label> <!--Red star for the required fields-->


        <input type="text" id="occupation" placeholder="Eg:Student" name="occupation" required>

        <label for="work" class="form-label">Occupation Address <span style="color: red;">*</span></label> <!--Red star for the required fields-->

        <div style="margin-top: 3px; margin-botton: 4px">
            <p style="font-size: 13px; color:gray"> &bull; If you are a Student please mention the School, Eg: Royal College, Colombo </p>
        </div> <!--Info section to specify the field and what needs to be there-->

        <input type="text" id="work" name="occupation_address" required>

        <label class="form-label d-block">Occupation Sector</label>
        
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="occupation_sector" id="sectorGovernment" value="government" required>
                <label class="form-check-label" for="sectorGovernment">Government</label>
            </div>
        
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="occupation_sector" id="sectorPrivate" value="private">
                <label class="form-check-label" for="sectorPrivate">Private</label>
            </div>

        <label for="work_phone" class="form-label">Work Contact (Optional)</label>
        <input type="tel" id="phone" name="work_contact">
    </div>

    <!-- Additional Information -->
    <button type="button" data-bs-toggle="collapse" data-bs-target="#personalInfo"
    style="background-color: #658397; color: white; width: 100%; text-align: left; 
    padding: 10px 20px; margin-bottom: 10px; font-size: 20px; border: none; cursor: pointer;">Additional Information</button> <!--in-line CSS for sectioning design-->
    <div class="collapse" id="additionalInfo">

    <label for="n-home" class="form-label">Nearest Railway Station to Residence <span style="color: red;">*</span></label> <!--Red star for the required fields-->
     
    <option value="" disabled selected>-- Select a station --</option>
    <select name="home_station" class="form-control" required>
        @foreach($stations as $location)
            <option value="{{ $location }}">{{ $location }}</option>
        @endforeach
    </select>

    <label for="work_station" class="form-label">Nearest Railway Station to Work <span style="color: red;">*</span></label> <!--Red star for the required fields-->
    <select name="work_station" class="form-control" id='work_station' required>
        <option value="" disabled selected>-- Select a station --</option>
        @foreach($stations as $location)
            <option value="{{ $location }}">{{ $location }}</option>
        @endforeach
    </select>

    <label for="passport_photo" class="form-label">Upload Photo: <span style="color: red;">*</span></label> <!--Red star for the required fields-->

        <div style="margin-top: 3px; margin-botton: 4px">
            <p style="font-size: 13px; color:gray"> &bull; Upload a maximum of 2MB file. </p> <!--Info section to specify the field and what needs to be there-->
        </div>

        <input type="file" id="passport_photo" name="photo" accept="image/*" required>

        <label for="pdf" class="form-label">&Upload PDF (Source of Proof) <span style="color: red;">*</span></label> <!--Red star for the required fields-->

        <div style="margin-top: 3px; margin-botton: 4px">
            <p style="font-size: 13px; color:gray"> &bull; Please upload the Grama Niladhari-issued letter. </p>

        </div><!--Info section to specify the field and what needs to be there-->
        <div style="margin-top: 3px; margin-botton: 4px">
            <p style="font-size: 13px; color:gray"> &bull; Upload a maximum of 2MB file. </p> <!--Info section to specify the field and what needs to be there-->
        </div>

        <input type="file" name="source_of_proof" class="form-control" accept="application/pdf" required>

    </div>
    <!-- Sign-up Credentials -->
    <button type="button" data-bs-toggle="collapse" data-bs-target="#personalInfo"
    style="background-color: #658397; color: white; width: 100%; text-align: left; 
    padding: 10px 20px; margin-bottom: 10px; font-size: 20px; border: none; cursor: pointer;">Sign-up Credentials</button>
    <div class="collapse" id="additionalInfo">

        <div style="margin-top: 3px; margin-botton: 4px">
            <p style="font-size: 13px; color:gray">&bull; Please complete this section to gain access to the system after admin approval.</p> <!--Info section to specify the field and what needs to be there-->
        </div>


        <label for="email" class="form-label">Email <span style="color: red;">*</span> <!--Red star for the required fields-->
            

        </label>
        <input type="email" name="email" id="email" class="form-control" required>
        
        <label for="pass" class="form-label">Password <span style="color: red;">*</span></label> <!--Red star for the required fields-->
        <input type="password" id="password" name="password" class="form-control" required>

        <label for="c-pass" class="form-label">Confirm Password <span style="color: red;">*</span></label> <!--Red star for the required fields-->
        <input type="password" id="password" name="password_confirmation" class="form-control" required>
    </div>


<button type="submit" class="s_btn mt-3">Submit</button>










        {{-- <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="full_name" class="form-control" required>
        </div>

        <d<select name="home_station" class="form-control" required>
       iv class="mb-3">
            <label class="form-label">NIC</label>
            <input type="text" name="nic" class="form-control" required>
        </div>

<div>
        <div class="mb-3">
            <label class="form-label">Gender</label>
            <select name="gender" class="form-control" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Date of Birth</label>
            <input type="date" name="date_of_birth" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Address</label>
            <input type="text" name="address" class="form-control mb-2" placeholder="No.188 Highlevel Road, Kirulapone" required>
            <select name="district" class="form-control mb-2" required>
                <option value="Ampara">Ampara</option>
                <option value="Anuradhapura">Anuradhapura</option>
                <option value="Badulla">Badulla</option>
                <option value="Batticaloa">Batticaloa</option>
                <option value="Colombo">Colombo</option>
                <option value="Galle">Galle</option>
                <option value="Gampaha">Gampaha</option>
                <option value="Hambantota">Hambantota</option>
                <option value="Jaffna">Jaffna</option>
                <option value="Kalutara">Kalutara</option>
                <option value="Kandy">Kandy</option>
                <option value="Kegalle">Kegalle</option>
                <option value="Kilinochchi">Kilinochchi</option>
                <option value="Kurunegala">Kurunegala</option>
                <option value="Mannar">Mannar</option>
                <option value="Matale">Matale</option>
                <option value="Matara">Matara</option>
                <option value="Monaragala">Monaragala</option>
                <option value="Mullaitivu">Mullaitivu</option>
                <option value="Nuwara Eliya">Nuwara Eliya</option>
                <option value="Polonnaruwa">Polonnaruwa</option>
                <option value="Puttalam">Puttalam</option>
                <option value="Ratnapura">Ratnapura</option>
                <option value="Trincomalee">Trincomalee</option>
                <option value="Vavuniya">Vavuniya</option>
            </select> --}}
            {{-- <select name="province" class="form-control" required>
                <option value="Central">Central</option>
                <option value="Eastern">Eastern</option>
                <option value="North Central">North Central</option>
                <option value="Northern">Northern</option>
                <option value="North Western">North Western</option>
                <option value="Sabaragamuwa">Sabaragamuwa</option>
                <option value="Southern">Southern</option>
                <option value="Uva">Uva</option>
                <option value="Western">Western</option>
            </select> --}}
        {{-- </div>

        <div class="mb-3">
            <label class="form-label">Personal Contact</label>
            <input type="text" name="personal_contact" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Home Contact Optional</label>
            <input type="text" name="lan_contact" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Occupation</label>
            <input type="text" name="occupation" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Occupation Address</label>
            <input type="text" name="occupation_address" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label d-block">Occupation Sector</label>
        
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="occupation_sector" id="sectorGovernment" value="government" required>
                <label class="form-check-label" for="sectorGovernment">Government</label>
            </div>
        
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="occupation_sector" id="sectorPrivate" value="private">
                <label class="form-check-label" for="sectorPrivate">Private</label>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Work Contact Optional</label>
            <input type="text" name="work_contact" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Select Home Station Location</label>
            <select name="home_station" class="form-control" required>
                <option value="" disabled selected>-- Select a station --</option>
                @foreach($stations as $location)
                    <option value="{{ $location }}">{{ $location }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Select Work Station Location</label>
            <select name="work_station" class="form-control" required>
                <option value="" disabled selected>-- Select a station --</option>
                @foreach($stations as $location)
                    <option value="{{ $location }}">{{ $location }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Upload Photo</label>
            <input type="file" name="photo" class="form-control" accept="image/*" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Upload PDF (Source of Proof)</label>
            <input type="file" name="source_of_proof" class="form-control" accept="application/pdf" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button> --}}
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection

