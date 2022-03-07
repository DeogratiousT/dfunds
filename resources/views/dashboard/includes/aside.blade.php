<div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
    <!--begin::Menu-->
    <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">
        <div class="menu-item">
            <div class="menu-content pb-2">
                <span class="menu-section text-muted text-uppercase fs-8 ls-1">Dashboard</span>
            </div>
        </div>
        <div class="menu-item">
            <a class="menu-link" href="{{ route('dashboard') }}">
                <span class="menu-icon">
                    <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen001.svg-->
                    <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M11 2.375L2 9.575V20.575C2 21.175 2.4 21.575 3 21.575H9C9.6 21.575 10 21.175 10 20.575V14.575C10 13.975 10.4 13.575 11 13.575H13C13.6 13.575 14 13.975 14 14.575V20.575C14 21.175 14.4 21.575 15 21.575H21C21.6 21.575 22 21.175 22 20.575V9.575L13 2.375C12.4 1.875 11.6 1.875 11 2.375Z" fill="black"/>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </span>
                <span class="menu-title">Home</span>
            </a>
        </div>
        <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
            <span class="menu-link">
                <span class="menu-icon">
                    <!--begin::Svg Icon | path: assets/media/icons/duotune/maps/map001.svg-->
                    <span class="svg-icon svg-icon-muted svg-icon-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path opacity="0.3" d="M6 22H4V3C4 2.4 4.4 2 5 2C5.6 2 6 2.4 6 3V22Z" fill="black"/>
                        <path d="M18 14H4V4H18C18.8 4 19.2 4.9 18.7 5.5L16 9L18.8 12.5C19.3 13.1 18.8 14 18 14Z" fill="black"/>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </span>
                <span class="menu-title">Regions</span>
                <span class="menu-arrow"></span>
            </span>
            <div class="menu-sub menu-sub-accordion" kt-hidden-height="120" style="display: none; overflow: hidden;">
                <div class="menu-item">
                    <a class="menu-link" href="{{ route('states.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">States</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link" href="{{ route('counties.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Counties</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link" href="{{ route('payams.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">PAYAMS</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--end::Menu-->
</div>