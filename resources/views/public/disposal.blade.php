@extends('public.layouts.app')

@section('title', 'Disposal')

@section('content')

    <!-- start breadcrumb area -->
    <div class="rts-breadcrumb-area breadcrumb-bg bg_image">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 breadcrumb-1">
                    <h1 class="title">Disposal</h1>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="bread-tag">
                        <a href="/">Home</a>
                        <span> / </span>
                        <a href="#" class="active">Disposal</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb area -->

    <section class="mt--60 mb--60">
        <div class="container">
            <section class="wrapper">
                <h2 class="text-center">
                    Disposal
                </h2>
                <h4 class="text-center text-decoration-underline mb--50">Trend of Monthly disposal of complaints:
                </h4>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-striped text-center"
                                style="vertical-align: middle">
                                <thead>
                                    <tr style="text-wrap: balance;">
                                        <th scope="col">#</th>
                                        <th scope="col">Month</th>
                                        <th scope="col">Carried Forward from Previous Month</th>
                                        <th scope="col">Received</th>
                                        <th scope="col">Resolved</th>
                                        <th scope="col">Total Pending</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($disposals as $disposal)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $disposal->month }}</td>
                                            <td>{{ $disposal->complaints }}</td>
                                            <td>{{ $disposal->received }}</td>
                                            <td>{{ $disposal->resolved }}</td>
                                            <td>{{ $disposal->pending }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="2">Grand Total</td>
                                        <td>0</td>
                                        <td>{{ $totalreceived }}</td>
                                        <td>{{ $totalresolved }}</td>
                                        <td>{{ $totalpending }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--/.card -->
            </section>

            <section class="mt--60 mb--60">
                <h4 class="text-center text-decoration-underline mb--50">Trend of Annual disposal of complaints :
                </h4>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-striped text-center"
                                style="vertical-align: middle">
                                <thead>
                                    <tr style="text-wrap: balance;">
                                        <th scope="col">#</th>
                                        <th scope="col">Year</th>
                                        <th scope="col">Carried Forward from Previous Month</th>
                                        <th scope="col">Received</th>
                                        <th scope="col">Resolved</th>
                                        <th scope="col">Total Pending</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($yearlyDisposals as $yearlyDisposal)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $yearlyDisposal->year }}</td>
                                            <td>{{ $yearlyDisposal->forward }}</td>
                                            <td>{{ $yearlyDisposal->received }}</td>
                                            <td>{{ $yearlyDisposal->resolved }}</td>
                                            <td>{{ $yearlyDisposal->pending }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="2">Grand Total</td>
                                        <td>{{ $totalYearlyForward }}</td>
                                        <td>{{ $totalYearlyReceived }}</td>
                                        <td>{{ $totalYearlyResolved }}</td>
                                        <td>{{ $totalYearlyPending }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--/.card -->
            </section>
            <!-- /column -->
            <div>
                <p class="mb--15">*Data is updated on 7th of every month.</p>
                <p class="mb--15">*Data presented here is taken from score portal.</p>
                <p class="mb--15">*Importance is given to resolve the complaint in prescribed TAT.</p>
            </div>
            <!-- /.row -->
        </div>

    </section>

@endsection
