@php
    $roleID = session('roleID');
@endphp

<ul>
    <li class="p-4"><a href="" class="block sidebar-link" data-page="admin-dashboard">Dashboard</a></li>

    @if ($roleID < 2)
        <li class="p-4 hover:bg-[#189AB4]"><a href="" class="sidebar-link block" data-page="admin-manager">Admin Management</a></li>
        <li class="p-4 hover:bg-[#189AB4]"><a href="" class="sidebar-link block" data-page="revenue-manager">Revenue Details</a></li>
        <li class="p-4 hover:bg-[#189AB4]"><a href="{{route('show.validator')}}" class="block">Tickets Management</a></li>
    @endif

    @if ($roleID < 11)
        <li class="p-4 hover:bg-[#189AB4]"><a href="" class="sidebar-link block" data-page="applicant-manager">Applicant Management</a></li>
        <li class="p-4 hover:bg-[#189AB4]"><a href="{{route('show.validator')}}" class="block">Tickets Management</a></li>

    @endif

    @if ($roleID == 11)
        <li class="p-4 hover:bg-[#189AB4]"><a href="" class="sidebar-link block" data-page="revenue-manager">Revenue Details</a></li>
    @endif

    @if (in_array($roleID, [12, 13]))
        <li class="p-4 hover:bg-[#189AB4]"><a href="{{route('show.validator')}}" class="block">Validate Ticket</a></li>
    @endif

    <li class="p-4 hover:bg-[#189AB4]"><a href="" class="sidebar-link block" data-page="passenger-manager">Passenger Management</a></li>
</ul>