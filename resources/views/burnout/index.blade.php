@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="head">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 class="title">Burnout</h2>
                        </div>
                    </div>
                </div>
                <div class="body">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-group">
                                <li class="list-group-item"><h2>This week</h2></li>
                                <li class="list-group-item">
                                    <h4>Requestes accepted: 10</h4>
                                    Hours covered: 75 hrs.
                                </li>
                                <li class="list-group-item">
                                    <h4>Requests made: 4</h4>
                                    Hours that cover me: 8Hrs.
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'Hours covered',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: [0, 10, 2, 0, 4, 6, 9]
                }]
            },
            options: {}
        });
    </script>
@endsection