
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

    <div style="border-left: 5px solid #f0ad4e; background-color: #fff8e1; padding: 20px; margin-bottom: 30px; border-radius: 6px; box-shadow: 0 2px 6px rgba(0,0,0,0.05);">
        <h3 style="margin-top: 0; margin-bottom: 15px; color: #a26c00; font-size: 20px;">
            📄 Season Ticket Registration – Proof Document Guidelines
        </h3>
    
        <p style="font-size: 14px; color: #444;">
            To apply for a season ticket, you must upload a document that proves your reason for travel. This document must be 
            <strong>certified by a recognized official</strong>. Here's what you need based on your situation:
        </p>
    
        <ul style="list-style: none; padding-left: 0; font-size: 14px; color: #333; margin-top: 15px; margin-bottom: 25px;">
            <li style="margin-bottom: 20px;">
                ✅ <strong>If you are a School Student:</strong> Submit a letter certified by your 
                <strong>school principal</strong> or area <strong>Grama Niladhari</strong>.
            </li>
            <li style="margin-bottom: 20px;">
                ✅ <strong>If you work in the Government Sector:</strong> Submit an employment letter certified by a 
                <strong>senior officer</strong> or <strong>HR department</strong>.
            </li>
            <li style="margin-bottom: 20px;">
                ✅ <strong>If you work in the Private Sector:</strong> Submit a letter certified by a 
                <strong>manager</strong>, <strong>department head</strong>, or <strong>HR department</strong>.
            </li>
            <li style="margin-bottom: 20px;">
                ✅ <strong>If you are Self-Employed or Others:</strong> Submit a letter from your area 
                <strong>Grama Niladhari</strong> confirming your identity, address, and reason for regular travel.
            </li>
        </ul>
    
        <div style="border-top: 1px solid #ddd; padding-top: 12px; margin-top: 20px;">
            <p style="font-weight: bold; color: #d9534f; margin-bottom: 10px;">⚠ Important Notes</p>
            <ul style="list-style: disc; padding-left: 20px; font-size: 13px; color: #444; margin: 0;">
                <li>The document must be <strong>recent</strong> (within the last 3 months).</li>
                <li>It should have a <strong>clear stamp and signature</strong>.</li>
                <li><strong>Falsified or unclear documents will lead to rejection.</strong></li>
                <li>If you need help, visit your <strong>nearest railway station</strong> or 
                    <strong>contact our support team</strong>.
                </li>
            </ul>
        </div>
    </div>
    

    
      
      
    
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
                <input class="form-check-input" type="radio" name="occupation_sector" id="sectorGovernment" value="GOV" required>
                <label class="form-check-label" for="sectorGovernment">Government</label>
            </div>
        
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="occupation_sector" id="sectorPrivate" value="PVT">
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
        @foreach($stations as $station_name)
            <option value="{{ $station_name }}">{{ $station_name }}</option>
        @endforeach
    </select>

    <label for="work_station" class="form-label">Nearest Railway Station to Work <span style="color: red;">*</span></label> <!--Red star for the required fields-->
    <select name="work_station" class="form-control" id='work_station' required>
        <option value="" disabled selected>-- Select a station --</option>
        @foreach($stations as $station_name)
            <option value="{{ $station_name }}">{{ $station_name }}</option>
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
    </form>
</div>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
@endsection

