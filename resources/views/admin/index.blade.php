@extends('admin.layouts.layout')
@section('content')

<div id="index" class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-xl-3">
            <div class="card mycards mt-3">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4>{{ __('custom.Total rooms') }}</h4>
                        <h5>{{ $rooms->count() }}</h5>
                    </div>
                    <div>
                        <span class="material-icons-outlined icon">
                            home
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-xl-3">
            <div class="card mycards mt-3">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4>{{ __('custom.All reservations') }}</h4>
                        <h5>{{ $reserved }}</h5>
                    </div>
                    <div>
                        <span class="material-icons-outlined icon">
                            dvr
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-xl-3">
            <div class="card mycards mt-3">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4>{{ __('custom.Crew') }}</h4>
                        <h5>{{ $users->count() }}</h5>
                    </div>
                    <div>
                        <span class="material-icons-outlined icon">
                            groups
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-xl-3">
            <div class="card mycards mt-3">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4>{{ __('custom.Available rooms') }}</h4>
                        <?php $reserved = 0 ?>
                        @forelse ($rooms as $room)
                            @if ($room->reserved == 'false')
                                <?php $reserved++  ?>
                            @endif
                        @empty
                            
                        @endforelse
                        <h5>{{ $reserved }}</h5>
                    </div>
                    <div>
                        <span class="material-icons-outlined icon">
                            hotel
                            </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-6 col-xl-6">
            <div class="card mycards mt-3">
                <div class="d-flex justify-content-between">
                    <div>
                        <h2>{{ __('custom.Profits') }}</h2>
                        <?php $profit = 0 ?>
                        @forelse ($rooms as $room)
                            <?php $profit += $room->total_price   ?>
                        @empty
                            
                        @endforelse
                        <h4>{{ $profit }}<span>$</span></h4>
                    </div>
                    <div>
                        <canvas id="lineChart" width="250" height="150"></canvas>
                    </div>
                </div>
            </div>
            <div class="card mycards mt-3">
                <div class="d-flex justify-content-between">
                    <div>
                        <h2>{{ __('custom.reserved_money') }}</h2>
                        <?php $profit = 0 ?>
                        @forelse ($rooms as $room)
                            <?php $profit += $room->final_price   ?>
                        @empty
                            
                        @endforelse
                        <h4>{{ $profit }}<span>$</span></h4>
                    </div>
                    <div>
                        <canvas id="lineChart2" width="250" height="150"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mt-3">
                <div class="card-header">
                    <h3>{{ __('custom.title_chart')  }}</h3>
                </div>
                <div class="card-body">
                    <canvas id="columnChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-4">
        <div class="col-12 col-md-6 mt-2">
            <div class="card">
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('custom.Name') }}</th>
                                <th scope="col">{{ __('custom.Job') }}</th>
                                <th scope="col">{{ __('custom.Salary') }}</th>
                                <th scope="col">{{ __('custom.Join date') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($employees as $employee)
                                <tr>
                                    <td>{{ $employee->name }}</td>
                                    <td>{{ $employee->job }}</td>
                                    <td>{{ $employee->salary }}</td>
                                    <td>{{ $employee->join_date }}</td>
                                </tr>
                            @empty
                                
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 mt-2">
            <div class="card">
                <div class="card-body table-responsive">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('custom.Room Id') }}</th>
                                <th scope="col">{{ __('custom.Reserved') }}</th>
                                <th scope="col">{{ __('custom.Reserved') }}</th>
                                <th scope="col">{{ __('custom.Reserved time') }}</th>
                                <th scope="col">{{ __('custom.Reservation expiration') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($rooms as $room)
                                <tr>
                                    <td>{{ $room->room_num }}</td>
                                    <td>{{ $room->reserved }}</td>
                                    <td>{{ $room->client->name }}</td>
                                    <td>{{ $room->rev_date }}</td>
                                    <td>{{ $room->rev_ex_date }}</td>
                                </tr>
                            @empty
                                
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<?php $September = 0 ?>
    @forelse ($rooms as $room)
        <?php date('F',strtotime($room->created_at)) == 'September' ? $September += $room->total_price : 0 ?>
    @empty
                        
@endforelse
<script>
    // ====> first get data and filter the months from created_at then same the prices (use loop to filter and same then save it in variable)
    
    // Data for 12 months and corresponding dollar amounts
    const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    const dollarAmounts = [1000, 1200, 1500, 1300, 1700, 2000, 1800, 2100, {{ $September }}, 2300, 2500, 2700];

    // Get the canvas element
    const canvas = document.getElementById('columnChart');
    const lineCanvas = document.getElementById('lineChart');
    const lineCanvas2 = document.getElementById('lineChart2');
    // Create the chart
    const chart = new Chart(canvas, {
    type: 'bar',
    data: {
        labels: months,
        datasets: [{
        label: 'Dollar Amounts',
        data: dollarAmounts,
        backgroundColor: '#67C656', // Blue color for the bars
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 1
        }]
    },
    options: {
        scales: {
        y: {
            beginAtZero: true,
            title: {
            display: true,
            text: 'Dollars'
            }
        },
        x: {
            title: {
            display: true,
            text: 'Months'
            }
        }
        }
    }
    });
        // Create the line chart
    const lineChart = new Chart(lineCanvas, {
    type: 'line',
    data: {
        labels: ['today','yesterday','sunday'],
        datasets: [{
        label: 'Dollar Amounts (Line Chart)',
        data: [100,500,700,1000],
        borderColor: 'rgba(255, 99, 132, 1)', // Red color for the line
        borderWidth: 2,
        fill: false
        }]
    },
    options: {
        scales: {
        y: {
            beginAtZero: true,
            title: {
            display: true,
            text: 'Dollars'
            }
        },
        x: {
            title: {
            display: true,
            text: 'days'
            }
        }
        }
    }
    });
    
    const lineChart2 = new Chart(lineCanvas2, {
    type: 'line',
    data: {
        labels: ['today','yesterday','sunday'],
        datasets: [{
        label: 'Dollar Amounts (Line Chart)',
        data: [800,700,400,600],
        borderColor: '#9B59B6', // Red color for the line
        borderWidth: 2,
        fill: false
        }]
    },
    options: {
        scales: {
        y: {
            beginAtZero: true,
            title: {
            display: true,
            text: 'Dollars'
            }
        },
        x: {
            title: {
            display: true,
            text: 'days'
            }
        }
        }
    }
    });
</script>
@endsection