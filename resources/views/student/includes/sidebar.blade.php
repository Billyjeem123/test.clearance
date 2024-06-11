<div class=" sidemenu col-auto col-md-3 col-lg-3 min-vh-100">
    <div class=" p-2">
        <ul class="nav nav-pills flex-column mt-4">
            <li class="nav-item py-2 py-sm-0">
                <a href="#" class="nav-link text-white " aria-current="page">
                    <img src="/assets/images/dashboard-icon.png" alt="dashboard-icon">
                    <span class="fs-4 ms-3 d-none d-sm-inline"> Dashboard </span>
                </a>
            </li>
            <li class="nav-item py-2 py-sm-0">
                <a href="#" class="nav-link text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"  >
                    <img src="/assets/images/dashboard-icon.png" alt="document-icon">
                    <span class="fs-4 ms-3 d-none d-sm-inline"> Clearance Units</span>
                </a>
                <ul class="dropdown-menu">
                    @foreach ($units as $unit)
                        <li><a class="dropdown-item" href="{{route('clearance_approval_unit', $unit->id)}}">{{ $unit->unit_name . ' Unit' }} </a></li>
                    @endforeach
                </ul>


            </li>

        </ul>
    </div>
</div>
