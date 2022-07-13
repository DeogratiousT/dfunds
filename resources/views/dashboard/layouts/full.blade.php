@extends('dashboard.layouts.app')

@section('body')
    <!--begin::Body-->
    <body id="kt_body" class="bg-body">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - Sign-in -->
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(assets/media/illustrations/sketchy-1/14.png">
				<!--begin::Content-->
				<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
					<!--begin::Logo-->
					<a href="#" class="mb-6">
						<img alt="Logo" src="images/logo.jpg" class="h-60px" />
					</a>
                    <h1 class="text-dark mb-6">DISCOVERY FUNDS</h1>
					<!--end::Logo-->
					<!--begin::Wrapper-->
					<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
						<!--begin::Form-->
                                @yield('content')
                        <!--end::Form-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Authentication - Sign-in-->
        </div>
        <!--end::Main-->        
        <!--begin::Scripts -->
        @include('dashboard.includes.scripts')
        <!--end::Scripts -->

        <!--begin::Indicator Script -->
        <script>
            // Element to indecate
            var subButton = document.querySelector("#kt_button");
        
            // Handle button click event
            button.addEventListener("click", function() {
                // Activate indicator
                subButton.setAttribute("data-kt-indicator", "on");
            });
        </script>
        <!--end::Indicator Script -->
    </body>
    <!--end::Body-->
@endsection