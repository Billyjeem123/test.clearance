<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>student-dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">
</head>
<body>

@include('student.includes.nav')


<div class="container-fluid">
    <div class="row flex-nowrap">

        @include('student.includes.sidebar')

        <div class="col-md-9">


            <div class="row progress-div-update">
                <div class="col-md-3 unit-progress">
                    <h4> Total Student </h4>

                    <img src="/assets/images/tick-mark.png" alt="tick-mark"><span> Cleared</span>
                </div>
                <div class="col-md-3 unit-progress">
                    <h4> Faculty Student </h4>

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



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
