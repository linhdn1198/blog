@extends('layouts.app')

@section('content')
@if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>{{  Session::get('error') }}</strong>
    </div>
@endif
@if (Session::has('info'))
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <strong>{{ Session::get('info') }}</strong> 
</div>
@endif
<div class="row text-center">
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header">Bài viết</div>
            <div class="card-body">
                <h1>{{ $posts_count }}</h1>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header">Bài viết đã xóa</div>
        
            <div class="card-body">
                <h1>{{ $trashed_count }}</h1>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header">Người dùng</div>
        
            <div class="card-body">
                <h1>{{ $users_count }}</h1>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header">Danh mục bài viết</div>
        
            <div class="card-body">
                <h1>{{ $categories_count }}</h1>
            </div>
        </div>
    </div>
</div>
<div class="row my-5">
    <div class="col-lg-12">
        <!-- LINE CHART -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Biểu đồ người đăng ký</h3>
            </div>
            <div class="card-body">
                <button id="now" class="btn btn-outline-primary my-2">Tháng hiện tại</button>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="reservation">
                </div>
                <div class="chart">
                    <canvas id="line-chart" style="height: 250px; width: 510px;" height="250" width="510"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row my-5">
    <div class="col-lg-12">
        <!-- RADAR CHART -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Biểu đồ bài viết</h3>
            </div>
            <div class="card-body">
                <div class="chart">
                    <canvas id="radar-chart" height="250" width="510"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    let dates = {!! $dates !!};
    let users = {!! $countUsers !!};
    let lineChart = new Chart(document.getElementById("line-chart"), {
    type: 'line',
    data: {
        labels: dates,
        datasets: [{ 
            data: users,
            label: "Người đăng ký",
            borderColor: "#3e95cd",
            fill: false
        }
        ]
    },
    options: {
        title: {
        display: true,
        text: 'Người đăng ký blog tính theo đơn vị 1'
        }
    }
    });
    let nameCategories = {!! $nameCategories !!};
    let countPosts = {!! $countPosts !!};
    new Chart(document.getElementById("radar-chart"), {
        type: 'radar',
        data: {
        labels: nameCategories,
        datasets: [
            {
            label: "Bài viết",
            fill: true,
            backgroundColor: "rgba(52,144,220,0.8)",
            borderColor: "rgba(179,181,198,0)",
            pointBorderColor: "#fff",
            pointBackgroundColor: "rgba(52,144,220,1)",
            data: countPosts
            }
        ]
        },
        options: {
            title: {
                display: true,
                text: 'Biểu đồ bài viết theo thể loại'
            },
            scale: {
                pointLabels: {
                    fontSize: 18,
                },
                ticks: {
                    beginAtZero: true,
                    min: 0,
                    stepSize: 1
                }
            }
        }
    });

    $('#reservation').daterangepicker({
        "applyButtonClasses": "btn-outline-success",
        "cancelClass": "btn-outline-default",
        opens: 'left',
        "locale": {
            "format": "MM/DD/YYYY",
            "separator": " - ",
            "applyLabel": "Xem",
            "cancelLabel": "Hủy",
            "fromLabel": "Đến",
            "toLabel": "Từ",
            "customRangeLabel": "Custom",
            "weekLabel": "W",
            "daysOfWeek": [
                "CN",
                "T2",
                "T3",
                "T4",
                "T5",
                "T6",
                "T7"
            ],
            "monthNames": [
                "Tháng 1",
                "Tháng 2",
                "Tháng 3",
                "Tháng 4",
                "Tháng 5",
                "Tháng 6",
                "Tháng 7",
                "Tháng 8",
                "Tháng 9",
                "Tháng 10",
                "Tháng 11",
                "Tháng 12"
            ],
            "firstDay": 1
        },
    }, function(start, end, label) {
        let startDay = start.format('YYYY-MM-DD');
        let endDay = end.format('YYYY-MM-DD');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "post",
            url: "{{ route('users') }}",
            data: {startDay: startDay, endDay: endDay},
            success: function (response) {
                let dates = JSON.parse(response.dates);
                let countUsers = JSON.parse(response.countUsers);
                lineChart.data.labels = dates;
                lineChart.data.datasets[0].data = countUsers;
                lineChart.update();
            }
        });
    });

    $('#now').click(function(){
        $.ajax({
            type: "get",
            url: "{{ route('get-user') }}",
            success: function (response) {
                console.log(response);
                let dates = JSON.parse(response.dates);
                let countUsers = JSON.parse(response.countUsers);
                lineChart.data.labels = dates;
                lineChart.data.datasets[0].data = countUsers;
                lineChart.update();
            }
        });
    })
</script>   
@endsection
