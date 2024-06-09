<!-- Your HTML content goes here -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js">

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+PmAzLB4v5BT8aHUXElmKUHitfK3I" crossorigin="anonymous"></script>

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}");
    @endif

</script>


</body>
</html>
