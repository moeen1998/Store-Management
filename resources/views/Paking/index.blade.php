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
            <h2 class="text-decoration-underline mb-4 text-muted">Paking Table</h2>
          </div>
          <div class="col-sm-6">

            <form class="form-inline d-inline" action="{{ route('paking.index') }}">
              <input class="form-control mb-1" value="@isset($search){{$search}} @endisset" name="search" placeholder="Enter paking type" >
              <button type="submit" class="btn btn-primary mb-1">Search</button>
            </form>
            <a href="{{ route('paking.index') }}"><button class="btn btn-primary mb-1 @if(! isset($search)) d-none  @endif">All Pakings</button></a>
            <a href="{{ route('paking.create') }}"><button class="btn btn-success mb-1 float-right">Add Paking</button></a>

          </div>
        </div>
      </div>
    </div>
        
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <section class="col-lg-12 connectedSortable"> 
            <h2>Paking { {{ count($pakings) }} }</h2>
            <table id="tblCustomers" class="table table-striped table-bordered">
              <thead>
                <tr>	
                  <th scope="col">#</th>
                  <th scope="col">Item name</th>
                  <th scope="col">Paking Type</th>
                  <th scope="col">Paking Value</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($pakings as $paking)
                  <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $paking->item->name }}</td>
                    <td>{{ $paking->name }}</td>
                    <td>{{ $paking->value }}</td>     
                    <td style="width: 15%">

                      <a href="{{ route('paking.edit',$paking->id) }}"><button class="btn btn-success">Edit</button></a>
                      <form action="{{ route('paking.destroy',$paking->id) }}" method="POST" class="d-inline">
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