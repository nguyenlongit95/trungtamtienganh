@extends('admin.master')

@section('custom-css')
@endsection

@section('content')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Bảng điều khiển</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Trang chính</a></li>
                        <li class="breadcrumb-item active">Bảng điều khiển</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $totalStudent }}</h3>

                            <p>Tổng số học viên</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ url('/admin/hoc-vien/') }}" class="small-box-footer">Vào phần quản lý <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $totalTeacher }}</h3>

                            <p>Tổng số giảng viên</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ url('/admin/giang-vien/') }}" class="small-box-footer">Vào phần quản lý <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $totalClass }}</h3>

                            <p>Tổng số lớp học</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{ url('/admin/lop-hoc') }}" class="small-box-footer">Vào phần quản lý <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $totalVoucher }}</h3>

                            <p>Tổng số mã khuyến mại</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{ url('/admin/voucher/') }}" class="small-box-footer">Vào phần quản lý <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            @if(\Illuminate\Support\Facades\Auth::user()->role === 0)
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-7 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Biểu đồ thu chi học phí và lương
                            </h3>
                            <div class="card-tools">
                                <ul class="nav nav-pills ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <!-- Morris chart - Sales -->
                                <div class="chart tab-pane active" id="revenue-chart"
                                     style="position: relative; height: 350px;">
                                    <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                                </div>
                                <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 350px;">
                                    <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                                </div>
                            </div>
                        </div><!-- /.card-body -->
                        <div class="card-footer">
                            <p>- Biểu đồ thống kê theo năm: <span class="text-danger">{{ $thisYear }}</span></p>
                            <p>- Miền biểu đồ có màu <span class="font-weight-bold" style="color:rgba(210, 214, 222, 1)">xám</span> biểu thị số tiền phải trả cho giảng viên, công nhân viên. <span class="text-danger">*</span></p>
                            <p>- Miền biểu đồ có màu <span class="font-weight-bold" style="color:rgba(60,141,188,0.9);">xanh</span> biểu thị số tiền học phí thu được từ học viên và các dịch vụ khác. <span class="text-danger">*</span></p>
                        </div>
                    </div>
                    <!-- /.card -->
                </section>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-5 connectedSortable">
                    <!-- solid sales graph -->
                    <div class="card bg-gradient-info">
                        <div class="card-header border-0">
                            <h3 class="card-title">
                                <i class="fas fa-th mr-1"></i>
                                Biểu đồ lượng học viên theo tháng
                            </h3>

                            <div class="card-tools">
                                <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas class="chart" id="line-chart" style="min-height: 350px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <!-- /.card-footer -->
                        <div class="card-footer">
                            <p>- Biểu đồ thống kê theo năm: <span class="text-white font-weight-bold">{{ $thisYear }}</span></p>
                            <p>- Biểu đồ trên thể hiện số lượng học viên đang theo học của các tháng. <span class="text-danger">*</span></p>
                            <p>- Số lượng học viên sẽ được thống kê theo từng tháng và theo các lớp học. <span class="text-danger">*</span></p>
                        </div>
                    </div>
                    <!-- /.card -->
                    <!-- /.card -->
                </section>
                <!-- right col -->
            </div>
            @endif
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách các lớp đang mở trong tháng này</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên lớp</th>
                                    <th>Mã lớp</th>
                                    <th>Số học viên</th>
                                    <th>Thời gian bắt đầu</th>
                                    <th>Thời gian kết thúc</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($lopHoc))
                                    @foreach($lopHoc as $value)
                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            <td><a href="{{ url('/admin/lop-hoc/' . $value->id . '/edit') }}">{{ $value->ten_lop }}</a></td>
                                            <td>{{ $value->ma_lop }}</td>
                                            <td><span class="tag tag-success">{{ $value->so_hoc_vien }}</span></td>
                                            <td>{{ $value->thoi_gian_bat_dau }}</td>
                                            <td>{{ $value->thoi_gian_ket_thuc }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <p class="text-danger">Hiện chưa có lớp học được mở</p>
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <form action="{{ url('/admin/') }}" method="get" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row">
                                    <div class="col-6">
                                        <h3 class="card-title float-left">Lọc học viên mới trong ngày</h3>
                                    </div>
                                    <div class="col-3">
                                        <input type="date" class="form-control" name="date" value="">
                                    </div>
                                    <div class="col-3">
                                        <input type="submit" class="btn btn-secondary" name="filter" value="Lọc">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên</th>
                                    <th>Ngày sinh</th>
                                    <th>Email</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($students))
                                    @foreach($students as $value)
                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            <td><a href="{{ url('/admin/hoc-vien/' . $value->id . '/edit') }}">{{ $value->ten }}</a></td>
                                            <td>{{ $value->ngay_sinh }}</td>
                                            <td><span class="tag tag-success">{{ $value->email }}</span></td>
                                        </tr>
                                    @endforeach
                                @else
                                    <p class="text-danger">Không có học viên mới trong ngày</p>
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <input type="hidden" id="thu-hoc-phi" value="{{ json_encode($thuHocPhi) }}">
    <input type="hidden" id="luong-giang-vien" value="{{ json_encode($luongGiangVien) }}">
    <input type="hidden" id="so-hoc-vien" value="{{ json_encode($calculateStudent) }}">
</div>
@endsection

@section('custom-js')
    <script>
        $(document).ready(function () {
            let dataSale = JSON.parse($('#thu-hoc-phi').val()); // Hoc phi
            let dataCharge = JSON.parse($('#luong-giang-vien').val()); // Luong giang vien
            let dataStudent = JSON.parse($('#so-hoc-vien').val());
            let labelSales = ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'];
            let labelStudent = ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'];

            drawChart(dataSale, dataCharge, dataStudent, labelSales, labelStudent);
        });

        function drawChart(dataSale, dataCharge, dataStudent, labelSale, labelStudent) {
            /* Chart.js Charts */
            // Sales chart
            var salesChartCanvas = document.getElementById('revenue-chart-canvas').getContext('2d');
            //$('#revenue-chart').get(0).getContext('2d');

            var salesChartData = {
                labels: labelSale,
                datasets: [
                    {
                        label: 'Số tiền thu: ',
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: dataSale
                    },
                    {
                        label: 'Số tiền chi: ',
                        backgroundColor: 'rgba(210, 214, 222, 1)',
                        borderColor: 'rgba(210, 214, 222, 1)',
                        pointRadius: false,
                        pointColor: 'rgba(210, 214, 222, 1)',
                        pointStrokeColor: '#c1c7d1',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data: dataCharge
                    },
                ]
            };

            var salesChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }]
                }
            };

            // This will get the first returned node in the jQuery collection.
            var salesChart = new Chart(salesChartCanvas, {
                type: 'line',
                data: salesChartData,
                options: salesChartOptions
            });


            /**
             * biểđ ồđ đuo
             */
                // Sales graph chart
            var salesGraphChartCanvas = $('#line-chart').get(0).getContext('2d');
            //$('#revenue-chart').get(0).getContext('2d');

            var salesGraphChartData = {
                labels: labelStudent,
                datasets: [{
                    label: 'Số học viên đang theo học',
                    fill: false,
                    borderWidth: 2,
                    lineTension: 0,
                    spanGaps: true,
                    borderColor: '#efefef',
                    pointRadius: 3,
                    pointHoverRadius: 7,
                    pointColor: '#efefef',
                    pointBackgroundColor: '#efefef',
                    data: dataStudent
                }]
            };

            var salesGraphChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false,
                },
                scales: {
                    xAxes: [{
                        ticks: {
                            fontColor: '#efefef',
                        },
                        gridLines: {
                            display: false,
                            color: '#efefef',
                            drawBorder: false,
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            stepSize: 5000,
                            fontColor: '#efefef',
                        },
                        gridLines: {
                            display: true,
                            color: '#efefef',
                            drawBorder: false,
                        }
                    }]
                }
            };

            // This will get the first returned node in the jQuery collection.
            var salesGraphChart = new Chart(salesGraphChartCanvas, {
                type: 'line',
                data: salesGraphChartData,
                options: salesGraphChartOptions
            });
        }
    </script>
@endsection
