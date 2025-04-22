@extends('layout')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y container-fluid">
        <div class="row">
            <!-- Earning Reports -->
            <div class="mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Bảng điều khiển</h5>
                    </div>
                    <div class="card-body">
                        <div class="row text-sm">
                            <div class="col-xl-3 col-md-6">
                                <a class="my-info-box info-box mb-lg-0"
                                    href="{{ url('admin', ['com' => 'setting', 'act' => 'man', 'type' => 'cau-hinh']) }}"
                                    title="Cấu hình website">
                                    <span class="my-info-box-icon info-box-icon bg-primary"><i
                                            class="ti ti-world"></i></span>
                                    <div class="info-box-content text-dark">
                                        <span class="info-box-text text-capitalize">Cấu hình website</span>
                                        <span class="info-box-number">View more</span>
                                    </div>
                                </a>
                            </div>
                            @if (\Auth::guard('admin')->user()->role == 3)
                                <div class="col-xl-3 col-md-6">
                                    <a class="my-info-box info-box mb-lg-0"
                                        href="{{ url('admin', ['com' => 'user-admin', 'act' => 'man', 'type' => 'tai-khoan']) }}"
                                        title="Tài khoản">
                                        <span class="my-info-box-icon info-box-icon bg-danger"><i
                                                class="ti ti-users"></i></span>
                                        <div class="info-box-content text-dark">
                                            <span class="info-box-text text-capitalize">Tài khoản</span>
                                            <span class="info-box-number">View more</span>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-xl-3 col-md-6">
                                    <a class="my-info-box info-box mb-lg-0"
                                        href="{{ url('admin', ['com' => 'user-admin', 'act' => 'man', 'type' => 'tai-khoan']) }}?changepass=1"
                                        title="Đổi mật khẩu">
                                        <span class="my-info-box-icon info-box-icon bg-success"><i
                                                class="ti ti-key"></i></span>
                                        <div class="info-box-content text-dark">
                                            <span class="info-box-text text-capitalize">Đổi mật khẩu</span>
                                            <span class="info-box-number">View more</span>
                                        </div>
                                    </a>
                                </div>
                            @endif
                            <div class="col-xl-3 col-md-6">
                                <a class="my-info-box info-box mb-lg-0"
                                    href="{{ url('admin', ['com' => 'newsletters', 'act' => 'man', 'type' => 'lien-he']) }}"
                                    title="Thư liên hệ">
                                    <span class="my-info-box-icon info-box-icon bg-info"><i
                                            class="ti ti-address-book"></i></span>
                                    <div class="info-box-content text-dark">
                                        <span class="info-box-text text-capitalize">Thư liên hệ</span>
                                        <span class="info-box-number">View more</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if (\Auth::guard('admin')->user()->role == 3)
                <div class="mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Cấu hình tiện ích</h5>
                        </div>
                        <div class="card-body">
                            <div class="row text-sm">
                                <div class="col-xl-4 col-md-6">
                                    <a class="my-info-box info-box mb-lg-0 bg-primary" href="extensions/man/popup"
                                        title="Cấu hình popup">
                                        <span class="my-info-box-icon  info-box-icon info-box-icon-setting "><i
                                                class="ti ti-device-camera-phone"></i></span>
                                        <div class="info-box-content text-white">
                                            <span class="info-box-text text-capitalize">Cấu hình popup</span>
                                            <span class="info-box-number font-italic">Chi tiết</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <a class="my-info-box info-box mb-lg-0 bg-danger" href="extensions/man/hotline"
                                        title="Điện thoại">
                                        <span class="my-info-box-icon info-box-icon info-box-icon-setting"><i
                                                class="ti ti-phone"></i></span>
                                        <div class="info-box-content text-white">
                                            <span class="info-box-text text-capitalize">Cấu hình điện thoại</span>
                                            <span class="info-box-number font-italic">Chi tiết</span>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-xl-4 col-md-6">
                                    <a class="my-info-box info-box mb-lg-0  bg-success" href="extensions/man/social"
                                        title="Mạng xã hội">
                                        <span class="my-info-box-icon info-box-icon info-box-icon-setting"><i
                                                class="ti ti-social"></i></span>
                                        <div class="info-box-content text-white">
                                            <span class="info-box-text text-capitalize">Cấu hình Mạng xã hội</span>
                                            <span class="info-box-number font-italic">Chi tiết</span>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="mb-4">
                <div class="card h-100">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-0">Thống kê truy cập</h5>
                            <small class="text-muted">Tháng {{ date('m/Y', time()) }}</small>
                            @php
                                $counter = Statistic::getCounter();
                            @endphp
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row gy-3 chart-online">
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-primary me-3 p-2">
                                        <i class="ti ti-chart-bar"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">{{ Statistic::getOnline() }}</h5>
                                        <small>Đang online</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-info me-3 p-2">
                                        <i class="ti ti-chart-bar"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">{{ Statistic::getTodayRecord() }}</h5>
                                        <small>Trong ngày</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-danger me-3 p-2">
                                        <i class="ti ti-chart-bar"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">{{ Statistic::getWeekRecord() }}</h5>
                                        <small>Trong tuần</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-success me-3 p-2">
                                        <i class="ti ti-chart-bar"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">{{ Statistic::getMonthRecord() }}</h5>
                                        <small>Trong tháng</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <div class="card">

                    <div class="card-body">
                        <form class="form-filter-charts row align-items-center mb-1" action="" method="get"
                            name="form-thongke" accept-charset="utf-8">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select class="form-control select2" name="month" id="month">
                                        <option value="">Chọn tháng</option>
                                        @for ($i = 1; $i <= 12; $i++)
                                            @if (isset($_GET['year']))
                                                {{ $selected = $i == $_GET['month'] ? 'selected' : '' }}
                                            @else
                                                {{ $selected = $i == date('m') ? 'selected' : '' }}
                                            @endif

                                            <option value="{{ $i }}" {{ $selected }}>Tháng
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select class="form-control select2" name="year" id="year">
                                        <option value="">Chọn năm</option>
                                        @for ($i = 2000; $i <= date('Y') + 20; $i++)
                                            @if (isset($_GET['year']))
                                                {{ $selected = $i == $_GET['year'] ? 'selected' : '' }}
                                            @else
                                                {{ $selected = $i == date('Y') ? 'selected' : '' }}
                                            @endif

                                            <option value="{{ $i }}" {{ $selected }}>Năm
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group"><button type="submit" class="btn btn-success">Thống
                                        kê</button></div>
                            </div>
                        </form>
                        <div id="apexMixedChart"></div>
                    </div>
                </div>
            </div>

            <!-- Browser States -->
            <div class="col-xl-4 col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-title m-0 me-2">
                            <h5 class="m-0 me-2">Trình duyệt</h5>
                            <small class="text-muted">Thống kê đến ngày {{ date('d/m/Y', time()) }}</small>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="p-0 m-0">
                            @foreach ($browser ?? [] as $value)
                                <li class="mb-3 pb-1 d-flex last:!mb-0">
                                    <div class="d-flex w-50 align-items-center me-3">
                                        <img onerror=this.src='@asset('assets/admin/img/icons/brands/browser.png')';
                                            src="../assets/admin/img/icons/brands/{{ Func::browser($value['browser'], $countBrowser)['img'] }}.png"
                                            alt="{{ Func::browser($value['browser'], $countBrowser)['name'] }}"
                                            class="me-3" width="35" />
                                        <div>
                                            <h6 class="mb-0">
                                                {{ Func::browser($value['browser'], $countBrowser)['name'] }}</h6>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-grow-1 align-items-center">
                                        <div class="progress w-100 me-3" style="height: 8px">
                                            <div class="progress-bar bg-danger" role="progressbar"
                                                style="width: {{ Func::browser($value['browser'], $countBrowser)['numb'] }}%"
                                                aria-valuenow="{{ Func::browser($value['browser'], $countBrowser)['numb'] }}"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span
                                            class="text-muted">{{ Func::browser($value['browser'], $countBrowser)['numb'] }}%</span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-title m-0 me-2">
                            <h5 class="m-0 me-2">Thiết bị truy cập</h5>
                            <small class="text-muted">Thống kê đến ngày {{ date('d/m/Y', time()) }}</small>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="p-0 m-0">
                            @foreach ($device ?? [] as $value)
                                <li class="mb-3 pb-1 d-flex last:!mb-0">
                                    <div class="d-flex w-50 align-items-center me-3">
                                        <img src="../assets/admin/img/icons/brands/{{ Func::device($value['device'], $countDevice)['img'] }}.png"
                                            alt="{{ Func::device($value['device'], $countDevice)['name'] }}"
                                            class="me-3" width="35" />
                                        <div>
                                            <h6 class="mb-0"> {{ Func::device($value['device'], $countDevice)['name'] }}
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-grow-1 align-items-center">
                                        <div class="progress w-100 me-3" style="height: 8px">
                                            <div class="progress-bar bg-danger" role="progressbar"
                                                style="width: {{ Func::device($value['device'], $countDevice)['numb'] }}%"
                                                aria-valuenow="{{ Func::device($value['device'], $countDevice)['numb'] }}"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span
                                            class="text-muted">{{ Func::device($value['device'], $countDevice)['numb'] }}%</span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!--/ Sales By Country -->

            <div class="col-xl-4 col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-title mb-0">
                            <h5 class="mb-0">Top ip truy cập nhiều nhất</h5>
                            <small class="text-muted">Thống kê đến ngày {{ date('d/m/Y', time()) }}</small>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="p-0 m-0">
                            @foreach ($topIP ?? [] as $value)
                                <li class="mb-3 last:!mb-0 pb-1 d-flex justify-content-between">
                                    <div class="d-flex align-items-center me-3">
                                        <div>
                                            <h6 class="mb-0"> {{ $value->ip }}</h6>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="text-muted">{{ $value->visits }}</span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="@asset('assets/admin/vendor/libs/apex-charts/apex-charts.css')" />
@endpush
@push('scripts')
    <script src="@asset('assets/admin/vendor/libs/apex-charts/apexcharts.js')"></script>
    <script>
        if ($('#apexMixedChart').length) {
            var options = {
                colors: [window.templateCustomizer.getColorPrimaryUse()],
                chart: {
                    id: 'apexMixedChart',
                    height: 450,
                    type: 'area',
                    dropShadow: {
                        enabled: true,
                        color: '#000',
                        top: 18,
                        left: 7,
                        blur: 20,
                        opacity: 0.2
                    }
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 1,
                        inverseColors: false,
                        opacityFrom: 0.8,
                        opacityTo: 0.3,
                        stops: [0, 90, 100]
                    },
                },
                series: [{
                    name: 'Thống kê truy cập tháng ' + CHARTS['month'],
                    type: 'line',
                    data: CHARTS['series']
                }],
                stroke: {
                    curve: 'smooth'
                },
                grid: {
                    borderColor: '#e7e7e7',
                    row: {
                        colors: ['#f3f3f3', 'transparent'],
                        opacity: 0.5
                    }
                },
                markers: {
                    size: 1
                },
                dataLabels: {
                    enabled: false
                },
                labels: CHARTS['labels'],
                legend: {
                    position: 'top',
                    horizontalAlign: 'right',
                    floating: true,
                    offsetY: -25,
                    offsetX: -5
                }
            };
            var apexMixedChart = new ApexCharts(document.querySelector('#apexMixedChart'), options);
            apexMixedChart.render();
            window.addEventListener('storageChanged', (e) => {
                const variableColors = window.templateCustomizer.getColorPrimaryUse();
                apexMixedChart.updateOptions({
                    colors: [variableColors]
                });
            });
        }
    </script>
@endpush
