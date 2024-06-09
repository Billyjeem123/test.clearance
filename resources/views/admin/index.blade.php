@include('admin.includes.header');

@include('admin.includes.nav');


<div class="container-fluid">
    <div class="row flex-nowrap">

        @include('admin.includes.sidebar');

        <div class="col-md-9">


            <div class="row progress-div-update">
                <div class="col-md-3 unit-progress">
                    <h4> Library </h4>

                    <img src="/assets/images/tick-mark.png" alt="tick-mark"><span> Cleared</span>
                </div>
                <div class="col-md-3 unit-progress">
                    <h4> Department </h4>

                    <img src="/assets/images/exclamation-mark.png" alt="tick-mark"><span> Not Cleared</span>
                </div>
                <div class="col-md-3 unit-progress">
                    <h4> Library </h4>

                    <img src="/assets/images/tick-mark.png" alt="tick-mark"><span> Cleared</span>
                </div>
                <div class="col-md-3 unit-progress">
                    <h4> Department </h4>

                    <img src="/assets/images/exclamation-mark.png" alt="tick-mark"><span> Not Cleared</span>
                </div>
                <div class="col-md-3 unit-progress">
                    <h4> Library </h4>

                    <img src="/assets/images/tick-mark.png" alt="tick-mark"><span> Cleared</span>
                </div>
                <div class="col-md-3 unit-progress">
                    <h4> Department </h4>

                    <img src="/assets/images/exclamation-mark.png" alt="tick-mark"><span> Not Cleared</span>
                </div>
                <div class="col-md-3 unit-progress">
                    <h4> Library </h4>

                    <img src="/assets/images/tick-mark.png" alt="tick-mark"><span> Cleared</span>
                </div>
                <div class="col-md-3 unit-progress">
                    <h4> Department </h4>

                    <img src="/assets/images/exclamation-mark.png" alt="tick-mark"><span> Not Cleared</span>
                </div>


            </div>




        </div>



    </div>
</div>

@include('admin.includes.footer');
