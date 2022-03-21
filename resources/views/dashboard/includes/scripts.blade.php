<script>var hostUrl = "metronic/";</script>
<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{ asset('metronic/js/plugins/plugins.bundle.js') }}"></script>
<script src="{{ asset('metronic/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->

<!--begin::Page Custom Javascript-->
    @stack('scripts')
<!--end::Page Custom Javascript-->

<script>
    // Element to indecate
    var button = document.querySelector("#kt_button");

    // Handle button click event
    button.addEventListener("click", function() {
        // Activate indicator
        button.setAttribute("data-kt-indicator", "on");
    });
</script>

<!--end::Javascript-->