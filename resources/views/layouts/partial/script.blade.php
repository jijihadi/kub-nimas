<!-- core:js -->
<script src="{{ asset('/assets/vendors/core/core.js') }}"></script>
<!-- endinject -->

<!-- inject:js -->
<script src="{{ asset('/assets/vendors/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('/assets/js/template.js') }}"></script>
<!-- endinject -->
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
@yield('scripts')
