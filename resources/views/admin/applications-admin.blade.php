<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicants List</title>
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"> --}}
</head>

<script>
    window.addEventListener("pageshow", function(event) {
        if (event.persisted) {
            location.reload();
        }
    });
</script>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Applicants List</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>District</th>
                    <th>Applied Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($applicants as $applicant)
                    <tr>
                        <td><a href="{{ route('admin.applications.show', ['applicant' => $applicant->id]) }}">{{ $applicant->id }}</a></td>
                        <td><a href="{{ route('admin.applications.show', ['applicant' => $applicant->id]) }}">{{ $applicant->full_name }}</a></td>
                        <td><a href="{{ route('admin.applications.show', ['applicant' => $applicant->id]) }}">{{ $applicant->district }}</a></td>
                        <td><a href="{{ route('admin.applications.show', ['applicant' => $applicant->id]) }}">{{ $applicant->created_at}}</a></td>
                        <td>                           
                            <span class="badge bg-warning text-dark">Pending</span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No applicants found</td>
                    </tr>
                @endforelse
            </tbody>        </table>


    </div>
    <div>{{ $applicants->links() }}</div>


    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
</body>
</html>