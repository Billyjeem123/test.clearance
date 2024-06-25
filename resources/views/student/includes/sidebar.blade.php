<div class=" sidemenu col-auto col-md-3 col-lg-3 min-vh-100">
    <div class=" p-2">
        <ul class="nav nav-pills flex-column mt-4">
            <li class="nav-item py-2 py-sm-0">
                <a href="{{route('student_dashboard')}}" class="nav-link text-white" aria-current="page">
                    <img src="/assets/images/dashboard-icon.png" alt="dashboard-icon">
                    <span class="fs-4 ms-3 d-none d-sm-inline"> Dashboard </span>
                </a>
            </li>
            <li class="nav-item py-2 py-sm-0">
                <a href="" class="nav-link text-white dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false"  >
                    <img src="/assets/images/dashboard-icon.png" alt="document-icon">
                    <span class="fs-4 ms-3 d-none d-sm-inline"> Clearance Units</span>
                </a>
                <ul class="dropdown-menu">
                    @foreach ($units as $unit)
                        <li><a class="dropdown-item" href="{{route('clearance_approval_unit', $unit->id)}}">{{ $unit->unit_name . ' Unit' }} </a></li>
                    @endforeach
                </ul>


            </li>

{{--            <li class="nav-item py-2 py-sm-0">--}}
{{--                <a href="#" class="nav-link text-white" id="notificationsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                    <img src="/assets/images/dashboard-icon.png" alt="notification-icon">--}}
{{--                    <span class="fs-4 ms-3 d-none d-sm-inline"> Notifications </span>--}}
{{--                    <!-- Example of notification badge -->--}}
{{--                    <span class="badge bg-danger">3</span>--}}
{{--                </a>--}}
{{--                <!-- Dropdown menu for notifications -->--}}
{{--                <ul class="dropdown-menu" aria-labelledby="notificationsDropdown">--}}
{{--                    <!-- Replace with dynamic notifications list -->--}}
{{--                    <li><a class="dropdown-item" href="#">Notification 1</a></li>--}}
{{--                    <li><a class="dropdown-item" href="#">Notification 2</a></li>--}}
{{--                    <li><a class="dropdown-item" href="#">Notification 3</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}


            <li class="nav-item py-2 py-sm-0">
                <a href="{{route('all_docs')}}" class="nav-link text-white" aria-current="page">
                    <img src="/assets/images/dashboard-icon.png" alt="dashboard-icon">
                    <span class="fs-4 ms-3 d-none d-sm-inline"> All Documents </span>
                </a>
            </li>

        </ul>
    </div>
</div>
