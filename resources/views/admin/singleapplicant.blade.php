<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Applicant Details</h2>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <td>{{ $applicant->id }}</td>
            </tr>
            <tr>
                <th>Full Name</th>
                <td>{{ $applicant->full_name }}</td>
            </tr>
            <tr>
                <th>NIC</th>
                <td>{{ $applicant->nic }}</td>
            </tr>
            <tr>
                <th>Gender</th>
                <td>{{ $applicant->gender }}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{ $applicant->address}}</td>
            </tr>
            <tr>
                <th>Date of Birth</th>
                <td>{{ $applicant->date_of_birth}}</td>
            </tr>
            <tr>
                <th>District</th>
                <td>{{ $applicant->district }}</td>
            </tr>
            <tr>
                <th>Province</th>
                <td>{{ $applicant->province }}</td>
            </tr>
            <tr>
                <th>Occupation</th>
                <td>{{ $applicant->occupation}}</td>
            </tr>
            <tr>
                <th>Occupation Address</th>
                <td>{{ $applicant->occupation_address}}</td>
            </tr>
            <tr>
                <th>Home Station</th>
                <td>{{ $applicant->home_station}}</td>
            </tr>
            <tr>
                <th>Work Station</th>
                <td>{{ $applicant->work_station}}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $applicant->email}}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    @if($applicant->status == 'pending')
                        <span class="badge bg-warning text-dark">Pending</span>
                    @elseif($applicant->status == 'approved')
                        <span class="badge bg-success">Approved</span>
                    @else
                        <span class="badge bg-danger">Rejected</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Profile Image</th>
                <td>
                    <img src="{{ asset('storage/' . $applicant->photo) }}" alt="Applicant Photo" width="150">
                </td>
            </tr>
        </table>
        <iframe src="{{ asset('storage/' . $applicant->source_of_proof) }}" 
style="width:600px; height:500px;" frameborder="0"></iframe>

        <form action="{{ route('admin.applications.approve', ['applicant' => $applicant->id]) }}" method="POST" style="display: inline;">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-success">Approve</button>
        </form>
        
        <form action="{{ route('admin.applications.reject', ['applicant' => $applicant->id]) }}" method="POST" style="display: inline;">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-danger">Reject</button>
        </form>        
    </div>
    
</body>
</html>


{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Applicant Details</h2>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <td>{{ $applicant->id }}</td>
            </tr>
            <tr>
                <th>Full Name</th>
                <td>{{ $applicant->full_name }}</td>
            </tr>
            <tr>
                <th>NIC</th>
                <td>{{ $applicant->nic }}</td>
            </tr>
            <tr>
                <th>Gender</th>
                <td>{{ $applicant->gender }}</td>
            </tr>
            <tr>
                <th>District</th>
                <td>{{ $applicant->district }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    @if($applicant->status == 'pending')
                        <span class="badge bg-warning text-dark">Pending</span>
                    @elseif($applicant->status == 'approved')
                        <span class="badge bg-success">Approved</span>
                    @else
                        <span class="badge bg-danger">Rejected</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Profile Image</th>
                <td>
                    <img src="{{ asset('storage/' . $applicant->photo) }}" alt="Applicant Photo" width="150">
                </td>
            </tr>
        </table>
        <iframe src="{{ asset('storage/' . $applicant->source_of_proof) }}" 
style="width:600px; height:500px;" frameborder="0"></iframe>

        <form action="{{ route('admin.applications.approve', ['applicant' => $applicant->id]) }}" method="POST" style="display: inline;">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-success">Approve</button>
        </form>
        
        <form action="{{ route('admin.applications.reject', ['applicant' => $applicant->id]) }}" method="POST" style="display: inline;">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-danger">Reject</button>
        </form>


        
    </div>
    
</body>
</html> --}}


{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Applicant Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Applicant Details</h2>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <td>{{ $applicant->id }}</td>
            </tr>
            <tr>
                <th>Full Name</th>
                <td>{{ $applicant->full_name }}</td>
            </tr>
            <tr>
                <th>NIC</th>
                <td>{{ $applicant->nic }}</td>
            </tr>
            <tr>
                <th>Gender</th>
                <td>{{ $applicant->gender }}</td>
            </tr>
            <tr>
                <th>District</th>
                <td>{{ $applicant->district }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    @if($applicant->status == 'pending')
                        <span class="badge bg-warning text-dark">Pending</span>
                    @elseif($applicant->status == 'approved')
                        <span class="badge bg-success">Approved</span>
                    @else
                        <span class="badge bg-danger">Rejected</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Profile Image</th>
                <td>
                    <img src="{{ asset('storage/' . $applicant->photo) }}" alt="Applicant Photo" width="150">
                </td>
            </tr>
        </table>
        <iframe src="{{ asset('storage/' . $applicant->source_of_proof) }}" 
style="width:600px; height:500px;" frameborder="0"></iframe>

<button id="approve-btn" class="btn btn-success" data-id="{{ $applicant->id }}">Approve</button>
<button id="reject-btn" class="btn btn-danger" data-id="{{ $applicant->id }}">Reject</button>

<p id="status-message" class="mt-3 text-bold"></p>
       
    </div>

    
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        function updateStatus(userId, action) {
            fetch(`/admin/applications/${userId}/${action}`, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                    "Content-Type": "application/json"
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update the status badge dynamically
                    let statusBadge = document.querySelector("td span.badge");
                    if (action === "approve") {
                        statusBadge.className = "badge bg-success";
                        statusBadge.textContent = "Approved";
                    } else if (action === "reject") {
                        statusBadge.className = "badge bg-danger";
                        statusBadge.textContent = "Rejected";
                    }
    
                    // Show success message
                    document.getElementById("status-message").textContent = data.message;
                    document.getElementById("status-message").style.color = "green";
                } else {
                    alert("Error: " + data.message);
                }
            })
            .catch(error => console.error("Error:", error));
        }
    
        document.getElementById("approve-btn").addEventListener("click", function() {
            let userId = this.getAttribute("data-id");
            updateStatus(userId, "approve");
        });
    
        document.getElementById("reject-btn").addEventListener("click", function() {
            let userId = this.getAttribute("data-id");
            updateStatus(userId, "reject");
        });
    });
    </script>

</html> --}}

