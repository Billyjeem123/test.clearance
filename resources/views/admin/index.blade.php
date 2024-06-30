@include('admin.includes.header');

@include('admin.includes.nav');


<div class="container-fluid">
    <div class="row flex-nowrap">

        @include('admin.includes.sidebar');

        <div class="col-md-9">


            <div class="row progress-div-update">
                @foreach($units as $unit)
                    <div class="col-md-3 unit-progress">
                        <h4>{{ $unit->unit_name }} Unit </h4>
                        <img src="/assets/images/tick-mark.png" alt="tick-mark">
                    </div>
                @endforeach
            </div>





        </div>



    </div>
</div>

@include('admin.includes.footer');
