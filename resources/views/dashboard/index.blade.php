@extends('dashboard.layouts.main')

@section('title', 'DASHBOARD')

@section('page-title', 'DASHBOARD')

@section('content')
    <div class="row">
        <div class="">
            <!--begin::Mixed Widget 2-->
            <div class="card card-xxl-stretch">
                <!--begin::Header-->
                <div class="card-header border-0 bg-danger py-5">
                    <h3 class="card-title fw-bolder text-white">Sales Statistics</h3>
                    <div class="card-toolbar">
                        <!--begin::Menu-->
                        <button type="button" class="btn btn-sm btn-icon btn-color-white btn-active-white btn-active-color- border-0 me-n3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000"></rect>
                                        <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3"></rect>
                                        <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3"></rect>
                                        <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3"></rect>
                                    </g>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </button>
                        <!--end::Menu-->
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body p-0" style="position: relative; overflow: hidden">
                    <!--begin::Chart-->
                    <div class="mixed-widget-2-chart card-rounded-bottom bg-danger" data-kt-color="danger" style="height: 200px; min-height: 200px;"><div id="apexcharts3hmtlzet" class="apexcharts-canvas apexcharts3hmtlzet apexcharts-theme-light" style="width: 1024px; height: 200px;"><svg id="SvgjsSvg1263" width="1024" height="200" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1265" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs1264"><clipPath id="gridRectMask3hmtlzet"><rect id="SvgjsRect1268" width="1031" height="203" x="-3.5" y="-1.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMask3hmtlzet"></clipPath><clipPath id="nonForecastMask3hmtlzet"></clipPath><clipPath id="gridRectMarkerMask3hmtlzet"><rect id="SvgjsRect1269" width="1028" height="204" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><filter id="SvgjsFilter1275" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%" y="-50%"><feFlood id="SvgjsFeFlood1276" flood-color="#cb1b46" flood-opacity="0.5" result="SvgjsFeFlood1276Out" in="SourceGraphic"></feFlood><feComposite id="SvgjsFeComposite1277" in="SvgjsFeFlood1276Out" in2="SourceAlpha" operator="in" result="SvgjsFeComposite1277Out"></feComposite><feOffset id="SvgjsFeOffset1278" dx="0" dy="5" result="SvgjsFeOffset1278Out" in="SvgjsFeComposite1277Out"></feOffset><feGaussianBlur id="SvgjsFeGaussianBlur1279" stdDeviation="3 " result="SvgjsFeGaussianBlur1279Out" in="SvgjsFeOffset1278Out"></feGaussianBlur><feMerge id="SvgjsFeMerge1280" result="SvgjsFeMerge1280Out" in="SourceGraphic"><feMergeNode id="SvgjsFeMergeNode1281" in="SvgjsFeGaussianBlur1279Out"></feMergeNode><feMergeNode id="SvgjsFeMergeNode1282" in="[object Arguments]"></feMergeNode></feMerge><feBlend id="SvgjsFeBlend1283" in="SourceGraphic" in2="SvgjsFeMerge1280Out" mode="normal" result="SvgjsFeBlend1283Out"></feBlend></filter><filter id="SvgjsFilter1285" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%" y="-50%"><feFlood id="SvgjsFeFlood1286" flood-color="#cb1b46" flood-opacity="0.5" result="SvgjsFeFlood1286Out" in="SourceGraphic"></feFlood><feComposite id="SvgjsFeComposite1287" in="SvgjsFeFlood1286Out" in2="SourceAlpha" operator="in" result="SvgjsFeComposite1287Out"></feComposite><feOffset id="SvgjsFeOffset1288" dx="0" dy="5" result="SvgjsFeOffset1288Out" in="SvgjsFeComposite1287Out"></feOffset><feGaussianBlur id="SvgjsFeGaussianBlur1289" stdDeviation="3 " result="SvgjsFeGaussianBlur1289Out" in="SvgjsFeOffset1288Out"></feGaussianBlur><feMerge id="SvgjsFeMerge1290" result="SvgjsFeMerge1290Out" in="SourceGraphic"><feMergeNode id="SvgjsFeMergeNode1291" in="SvgjsFeGaussianBlur1289Out"></feMergeNode><feMergeNode id="SvgjsFeMergeNode1292" in="[object Arguments]"></feMergeNode></feMerge><feBlend id="SvgjsFeBlend1293" in="SourceGraphic" in2="SvgjsFeMerge1290Out" mode="normal" result="SvgjsFeBlend1293Out"></feBlend></filter></defs><g id="SvgjsG1294" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1295" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g id="SvgjsG1304" class="apexcharts-grid"><g id="SvgjsG1305" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine1307" x1="0" y1="0" x2="1024" y2="0" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1308" x1="0" y1="20" x2="1024" y2="20" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1309" x1="0" y1="40" x2="1024" y2="40" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1310" x1="0" y1="60" x2="1024" y2="60" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1311" x1="0" y1="80" x2="1024" y2="80" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1312" x1="0" y1="100" x2="1024" y2="100" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1313" x1="0" y1="120" x2="1024" y2="120" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1314" x1="0" y1="140" x2="1024" y2="140" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1315" x1="0" y1="160" x2="1024" y2="160" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1316" x1="0" y1="180" x2="1024" y2="180" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1317" x1="0" y1="200" x2="1024" y2="200" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line></g><g id="SvgjsG1306" class="apexcharts-gridlines-vertical" style="display: none;"></g><line id="SvgjsLine1319" x1="0" y1="200" x2="1024" y2="200" stroke="transparent" stroke-dasharray="0"></line><line id="SvgjsLine1318" x1="0" y1="1" x2="0" y2="200" stroke="transparent" stroke-dasharray="0"></line></g><g id="SvgjsG1270" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG1271" class="apexcharts-series" seriesName="NetxProfit" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1274" d="M 0 200L 0 125C 59.73333333333333 125 110.93333333333334 87.5 170.66666666666666 87.5C 230.39999999999998 87.5 281.59999999999997 120 341.3333333333333 120C 401.06666666666666 120 452.26666666666665 25 512 25C 571.7333333333333 25 622.9333333333333 100 682.6666666666666 100C 742.4 100 793.6 100 853.3333333333334 100C 913.0666666666667 100 964.2666666666667 100 1024 100C 1024 100 1024 100 1024 200M 1024 100z" fill="transparent" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask3hmtlzet)" filter="url(#SvgjsFilter1275)" pathTo="M 0 200L 0 125C 59.73333333333333 125 110.93333333333334 87.5 170.66666666666666 87.5C 230.39999999999998 87.5 281.59999999999997 120 341.3333333333333 120C 401.06666666666666 120 452.26666666666665 25 512 25C 571.7333333333333 25 622.9333333333333 100 682.6666666666666 100C 742.4 100 793.6 100 853.3333333333334 100C 913.0666666666667 100 964.2666666666667 100 1024 100C 1024 100 1024 100 1024 200M 1024 100z" pathFrom="M -1 200L -1 200L 170.66666666666666 200L 341.3333333333333 200L 512 200L 682.6666666666666 200L 853.3333333333334 200L 1024 200"></path><path id="SvgjsPath1284" d="M 0 125C 59.73333333333333 125 110.93333333333334 87.5 170.66666666666666 87.5C 230.39999999999998 87.5 281.59999999999997 120 341.3333333333333 120C 401.06666666666666 120 452.26666666666665 25 512 25C 571.7333333333333 25 622.9333333333333 100 682.6666666666666 100C 742.4 100 793.6 100 853.3333333333334 100C 913.0666666666667 100 964.2666666666667 100 1024 100" fill="none" fill-opacity="1" stroke="#cb1b46" stroke-opacity="1" stroke-linecap="butt" stroke-width="3" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask3hmtlzet)" filter="url(#SvgjsFilter1285)" pathTo="M 0 125C 59.73333333333333 125 110.93333333333334 87.5 170.66666666666666 87.5C 230.39999999999998 87.5 281.59999999999997 120 341.3333333333333 120C 401.06666666666666 120 452.26666666666665 25 512 25C 571.7333333333333 25 622.9333333333333 100 682.6666666666666 100C 742.4 100 793.6 100 853.3333333333334 100C 913.0666666666667 100 964.2666666666667 100 1024 100" pathFrom="M -1 200L -1 200L 170.66666666666666 200L 341.3333333333333 200L 512 200L 682.6666666666666 200L 853.3333333333334 200L 1024 200"></path><g id="SvgjsG1272" class="apexcharts-series-markers-wrap" data:realIndex="0"><g class="apexcharts-series-markers"><circle id="SvgjsCircle1325" r="0" cx="170.66666666666666" cy="87.5" class="apexcharts-marker wp6iq51cn no-pointer-events" stroke="#cb1b46" fill="#f1416c" fill-opacity="1" stroke-width="3" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG1273" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine1320" x1="0" y1="0" x2="1024" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1321" x1="0" y1="0" x2="1024" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1322" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1323" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1324" class="apexcharts-point-annotations"></g></g><g id="SvgjsG1303" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG1266" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend" style="max-height: 100px;"></div><div class="apexcharts-tooltip apexcharts-theme-light" style="left: 181.667px; top: 90.5px;"><div class="apexcharts-tooltip-title" style="font-family: inherit; font-size: 12px;">Mar</div><div class="apexcharts-tooltip-series-group apexcharts-active" style="order: 1; display: flex;"><span class="apexcharts-tooltip-marker" style="background-color: transparent; display: none;"></span><div class="apexcharts-tooltip-text" style="font-family: inherit; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">Net Profit: </span><span class="apexcharts-tooltip-text-y-value">$45 thousands</span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
                    <!--end::Chart-->
                    <!--begin::Stats-->
                    <div class="card-p mt-n20 position-relative">
                        <!--begin::Row-->
                        <div class="row g-0">
                            <!--begin::Col-->
                            <div class="col bg-light-warning px-6 py-8 rounded-2 me-7 mb-7">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect x="8" y="9" width="3" height="10" rx="1.5" fill="black"></rect>
                                        <rect opacity="0.5" x="13" y="5" width="3" height="14" rx="1.5" fill="black"></rect>
                                        <rect x="18" y="11" width="3" height="8" rx="1.5" fill="black"></rect>
                                        <rect x="3" y="13" width="3" height="6" rx="1.5" fill="black"></rect>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <a href="#" class="text-warning fw-bold fs-6">Weekly Sales</a>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col bg-light-primary px-6 py-8 rounded-2 mb-7">
                                <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                                <span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z" fill="black"></path>
                                        <path d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z" fill="black"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <a href="#" class="text-primary fw-bold fs-6">New Projects</a>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row g-0">
                            <!--begin::Col-->
                            <div class="col bg-light-danger px-6 py-8 rounded-2 me-7">
                                <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
                                <span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="black"></path>
                                        <path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="black"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <a href="#" class="text-danger fw-bold fs-6 mt-2">Item Orders</a>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col bg-light-success px-6 py-8 rounded-2">
                                <!--begin::Svg Icon | path: icons/duotune/communication/com010.svg-->
                                <span class="svg-icon svg-icon-3x svg-icon-success d-block my-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M6 8.725C6 8.125 6.4 7.725 7 7.725H14L18 11.725V12.925L22 9.725L12.6 2.225C12.2 1.925 11.7 1.925 11.4 2.225L2 9.725L6 12.925V8.725Z" fill="black"></path>
                                        <path opacity="0.3" d="M22 9.72498V20.725C22 21.325 21.6 21.725 21 21.725H3C2.4 21.725 2 21.325 2 20.725V9.72498L11.4 17.225C11.8 17.525 12.3 17.525 12.6 17.225L22 9.72498ZM15 11.725H18L14 7.72498V10.725C14 11.325 14.4 11.725 15 11.725Z" fill="black"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <a href="#" class="text-success fw-bold fs-6 mt-2">Bug Reports</a>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Stats-->
                <div class="resize-triggers"><div class="expand-trigger"><div style="width: 1025px; height: 461px;"></div></div><div class="contract-trigger"></div></div></div>
                <!--end::Body-->
            </div>
            <!--end::Mixed Widget 2-->
        </div>
    </div>
@endsection