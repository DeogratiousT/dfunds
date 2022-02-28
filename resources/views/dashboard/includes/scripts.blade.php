<script>var hostUrl = "metronic/";</script>
<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{ asset('metronic/js/plugins/plugins.bundle.js') }}"></script>
<script src="{{ asset('metronic/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->

<!--begin::Page Custom Javascript-->
    @stack('scripts')
<!--end::Page Custom Javascript-->

<!--end::Javascript-->