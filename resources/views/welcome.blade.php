@extends('app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">hello</a></li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
            
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info text-center">

                            <div class="inner">
                                <h3 class="mt-3">{{ $data['categories'] }}</h3>
                                <p>Categories</p>
                            </div>

                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success text-center">

                            <div class="inner">
                                <h3 class="mt-3">{{ $data['groups'] }}</h3>
                                <p>Groups</p>
                            </div>

                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger text-center">

                            <div class="inner">
                                <h3 class="mt-3">{{ $data['items'] }}</h3>
                                <p>Items</p>
                            </div>

                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-6 connectedSortable"> 
                        <h2>In Transactions { {{ count($data['purchases']) }} }</h2>
                        <table class="table table-striped table-bordered border-primary">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">transaction_number</th>
                                <th scope="col">from</th>
                                <th scope="col">date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['purchases'] as $purchase)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $purchase->transaction_number }}</td>
                                        <td>{{ $purchase->from }}</td>
                                        <td>{{ $purchase->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </section>

                    <!-- right col -->
                    <section class="col-lg-6 connectedSortable">
                        <h2>Out Transactions { {{ count($data['orders']) }} }</h2>
                        <table class="table table-striped table-bordered border-primary">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">transaction_number</th>
                                <th scope="col">from</th>
                                <th scope="col">date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['orders'] as $order)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $order->transaction_number }}</td>
                                        <td>{{ $order->to }}</td>
                                        <td>{{ $order->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </section>
                    <!-- right col -->
                </div>
            </div>
        </section>

    </div>
    <!-- /.content-wrapper -->
@endsection