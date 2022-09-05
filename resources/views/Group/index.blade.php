@extends('app')

@section('content')

  <div class="content-wrapper">

    @if(session()->has('message'))
      <div class="alert alert-success alert-dismissible fade show mx-2" role="alert">
        {{ session()->get('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h2 class="text-decoration-underline mb-2 text-muted">Groups Table</h2>
          </div>
          <div class="col-sm-6">

            <form class="form-inline d-inline" action="{{ route('group.index') }}">
                <input class="form-control mb-1" value="@isset($search){{$search}} @endisset" name="search" placeholder="Search Here By Group Name" >
                <button type="submit" class="btn btn-primary mb-1">Search</button>
            </form>
            <a href="{{ route('group.index') }}"><button class="btn btn-primary mb-1 @if(! isset($search)) d-none  @endif">All Groups</button></a>
            <a href="{{ route('group.create') }}"><button class="btn btn-success mb-1 float-right">Add Group</button></a>

          </div>
        </div>
      </div>
    </div>
        
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable"> 
            <h2>Groups { {{ count($groups) }} }</h2>
            <table id="tblCustomers" class="table table-striped table-bordered">
              <thead>
                <tr>	
                  <th scope="col">#</th>
                  <th scope="col">Group name</th>
                  <th scope="col">The Items</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($groups as $group)
                  <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $group->name }}</td>
                    <td>
                      @foreach ($group->Items as $item)
                      {{ $item->name }} => qty { {{ $item->qty }} },
                      @endforeach
                    </td>
      
                    <td>

                      <a href="{{ route('group.edit',$group->id) }}"><button class="btn btn-success">Edit</button></a>
                      <form action="{{ route('group.destroy',$group->id) }}" method="POST" class="d-inline">
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