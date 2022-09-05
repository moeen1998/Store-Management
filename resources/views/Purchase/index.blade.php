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
            <h2 class="text-decoration-underline mb-4 text-muted">Purchase Table</h2>
          </div>
          <div class="col-sm-6">

            <form class="form-inline d-inline" action="{{ route('purchase.index') }}">
              <input class="form-control mb-1" value="@isset($search){{$search}} @endisset" name="search" placeholder="Search By Purchase Date" >
              <button type="submit" class="btn btn-primary mb-1">Search</button>
            </form>
            <a href="{{ route('purchase.index') }}"><button class="btn btn-primary mb-1 @if(! isset($search)) d-none  @endif">All Purchases</button></a>
            <a href="{{ route('purchase.create') }}"><button class="btn btn-success mb-1 float-right">Add Purchase</button></a>

          </div>
        </div>
      </div>
    </div>
        
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <section class="col-lg-12 connectedSortable"> 
            <h2>Purchases { {{ count($purchases) }} }</h2>
            <table id="tblCustomers" class="table table-striped table-bordered ">
              <thead>
                <tr>	
                  <th scope="col">#</th>
                  <th scope="col">Transaction Number</th>
                  <th scope="col">From</th>
                  <th scope="col">The Items</th>
                  <th scope="col">Date</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($purchases as $purchase)
                  <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $purchase->transaction_number }}</td>
                    <td>{{ $purchase->from }}</td>
                    <td>
                      @foreach ($purchase->Items as $item)
                      {{ $item->Item->name }} => has { {{ $item->qty }} - {{ $item->p_type }} }, 
                      @endforeach
                    </td>
                    <td>{{ $purchase->created_at }}</td>

                    <td style="width: 15%">

                      <a href="{{ route('purchase.edit',$purchase->id) }}"><button class="btn btn-success">Edit</button></a>
                      <form action="{{ route('purchase.destroy',$purchase->id) }}" method="POST" class="d-inline">
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