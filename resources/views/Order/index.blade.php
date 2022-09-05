@extends('app')

@section('content')

  <div class="content-wrapper">

    @if(session()->has('message'))
      <div class="alert alert-success alert-dismissible fade show mx-2" role="alert">
        {{ session()->get('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 class="text-decoration-underline mb-4 text-muted">Orders Table</h2>
          </div>
          <div class="col-sm-6">

            <form class="form-inline d-inline" action="{{ route('order.index') }}">
              <input class="form-control mb-1" value="@isset($search){{$search}} @endisset" name="search" placeholder="Search By Purchase Date" >
              <button type="submit" class="btn btn-primary mb-1">Search</button>
            </form>
            <a href="{{ route('order.index') }}"><button class="btn btn-primary mb-1 @if(! isset($search)) d-none  @endif">All Orders</button></a>
            <a href="{{ route('order.create') }}"><button class="btn btn-success mb-1 float-right">Add Order</button></a>

          </div>
        </div>
      </div>
    </div>
        
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <section class="col-lg-12 connectedSortable"> 
            <h2>Orders { {{ count($orders) }} }</h2>
            <table id="tblCustomers" class="table table-striped table-bordered ">
              <thead>
                <tr>	
                  <th scope="col">#</th>
                  <th scope="col">Transaction Number</th>
                  <th scope="col">to</th>
                  <th scope="col">The Items</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($orders as $order)
                  <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $order->transaction_number }}</td>
                    <td>{{ $order->to }}</td>
                    <td>
                      @foreach ($order->Items as $item)
                      {{ $item->Item->name }} => has { {{ $item->qty }} - {{ $item->p_type }} }, 
                      @endforeach
                    </td>
      
                    <td style="width: 15%">

                      <a href="{{ route('order.edit',$order->id) }}"><button class="btn btn-success">Edit</button></a>
                      <form action="{{ route('order.destroy',$order->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-danger" type="submit">Delete</button>
                      </form>
      
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <input type="button" id="btnExport" value="Export" onclick="Export()" />
          </section>
        </div>
      </div>
    </section>

  </div>
  
@endsection