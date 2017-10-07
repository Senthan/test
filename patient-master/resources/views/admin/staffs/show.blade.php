@extends('admin.layouts.master')
@section('content')
    <ul class="breadcrumb">
        <li>{!! link_to_route('admin.home.index', 'Home ') !!}</li>
        <li>{!! link_to_route('staff.index', 'staffs ') !!}</li>
        <li class="active">{{ $staff->first_name . ' ' . $staff->last_name }}</li>
    </ul>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{!! $staff->first_name . ' ' . $staff->last_name !!}</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <canvas id="ctx" height="300"></canvas>
                </div>
                <div class="col-md-6">
                    <canvas id="pie_ctx" height="300"></canvas>
                </div>
            </div>
        </div>

        <div class="panel-footer">
            {{ form()->bsCancel('Staff', 'staff.index') }}
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            var ctx = $("#ctx");
            var pie_ctx = $("#pie_ctx");


            var data = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [
                    {
                        label: "Laparoscopic left hemicolectomy",
                        backgroundColor: "rgba(255,99,132,0.2)",
                        borderColor: "rgba(255,99,132,1)",
                        borderWidth: 1,
                        hoverBackgroundColor: "rgba(255,99,132,0.4)",
                        hoverBorderColor: "rgba(255,99,132,1)",
                        data: [65, 59, 80, 81, 56, 55, 40]
                    }
                ]
            };

            new Chart(ctx, {
                type: "bar",
                data: data,
                options: {
                    scales: {
                        xAxes: [{
                            stacked: true
                        }],
                        yAxes: [{
                            stacked: true
                        }]
                    }
                }
            }
        );

            var data2 = {
                labels: [
                    "Appendisectomy",
                    "Hydrocelectomy",
                    "Mastectomy"
                ],
                datasets: [
                    {
                        data: [300, 50, 100],
                        backgroundColor: [
                            "#FF6384",
                            "#36A2EB",
                            "#FFCE56"
                        ],
                        hoverBackgroundColor: [
                            "#FF6384",
                            "#36A2EB",
                            "#FFCE56"
                        ]
                    }]
            };

            var myPieChart = new Chart(pie_ctx,{
                type:"doughnut",
                animation:{
                    animateScale:true
                },
                data: data2
            });
        })
    </script>
@endsection