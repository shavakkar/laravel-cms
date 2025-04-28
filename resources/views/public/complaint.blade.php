@extends('public.layouts.app')

@section('title', 'Complaint Board')

@section('content')

    <!-- start breadcrumb area -->
    <div class="rts-breadcrumb-area breadcrumb-bg bg_image">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 breadcrumb-1">
                    <h1 class="title">Complaints</h1>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="bread-tag">
                        <a href="/">Home</a>
                        <span> / </span>
                        <a href="#" class="active">Complaints</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb area -->

    <section class="mt--40 mb--60">
        <div class="container">
            <section>
                <div class="mb--60 text-center">
                    <h2>Complaints</h2>
                    <h4 class="text-decoration-underline">Activities Registered</h4>
                    <p>As of 7th March. 2024</p>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-striped text-center">
                                <thead>
                                    <tr style="text-wrap: balance;">
                                        <th scope="col">#</th>
                                        <th scope="col">Received From</th>
                                        <th scope="col">Pending at the end of the last month</th>
                                        <th scope="col">Received</th>
                                        <th scope="col">Resolved</th>
                                        <th scope="col">Total Pending</th>
                                        <th scope="col">Pending Complaints > 3 months</th>
                                        <th scope="col">Average Resolution Time</th>
                                    </tr>
                                </thead>
                                <tbody style="vertical-align: middle">
                                    @foreach ($complaints as $complaint)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="text-start">{{ $complaint->from }}</td>
                                            <td>{{ $complaint->monthpending }}</td>
                                            <td>{{ $complaint->received }}</td>
                                            <td>{{ $complaint->resolved }}</td>
                                            <td>{{ $complaint->pending }}</td>
                                            <td>{{ $complaint->pending3 }}</td>
                                            <td>{{ $complaint->avg }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="2">Grand Total</td>
                                        <td>{{ $totalMonthPending }}</td>
                                        <td>{{ $totalReceived }}</td>
                                        <td>{{ $totalResolved }}</td>
                                        <td>{{ $totalPending }}</td>
                                        <td>{{ $totalPending3 }}</td>
                                        <td>{{ $totalAvg }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>


@endsection
