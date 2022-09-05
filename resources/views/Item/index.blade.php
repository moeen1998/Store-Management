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
            <h2 class="text-decoration-underline mb-4 text-muted">Items Table</h2>
          </div>
          <div class="col-sm-6">

            <form class="form-inline d-inline" action="{{ route('item.index') }}">
              <input class="form-control mb-1" value="@isset($search){{$search}} @endisset" name="search" placeholder="Enter Item Name Or Code" >
              <button type="submit" class="btn btn-primary mb-1">Search</button>
            </form>
            <a href="{{ route('item.index') }}"><button class="btn btn-primary mb-1 @if(! isset($search)) d-none  @endif">All Items</button></a>
            <a href="{{ route('item.create') }}"><button class="btn btn-success mb-1 float-right">Add Item</button></a>

          </div>
        </div>
      </div>
    </div>
        
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <section class="col-lg-12 connectedSortable"> 
            <h2>Items { {{ count($items) }} }</h2>
            <table id="tblCustomers" class="table table-striped table-bordered table-responsive ">
              <thead>
                <tr>	
                  <th scope="col">#</th>
                  <th scope="col">Item Code</th>
                  <th scope="col">Item name</th>
                  <th scope="col">Paking Type</th>
                  <th scope="col">category Name</th>
                  <th scope="col">Group Name</th>
                  <th scope="col">Item Description</th>
                  <th scope="col">Item Qty</th>
                  <th scope="col">Item Coast</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($items as $item)
                  <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $item->code }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                      @foreach ($item->Pakings as $pak)
                        {{ $pak->name }},
                      @endforeach
                    </td>
                    <td>{{ $item->Category->name }}</td>
                    <td>{{ $item->group->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td style="width: 10%">
                      <?php
                          if (count($item->Pakings) > 0){
                            $text="";
                            $length= count($item->Pakings);
                            for($i=0; $i<=$length;$i++){

                              $text .=  ((integer) ($item->qty / $item->Pakings[$i]->value)) . ' : ';
                              $item->qty = $item->qty % $item->Pakings[$i]->value;

                              if($item->qty == 0 ){
                                break;
                              }
                            }
                            echo $text;
                          }
                          
                        ?>
                    </td>
                    <td>{{ $item->price }}</td>
      
                    <td class="w-25">

                      <a href="{{ route('item.edit',$item->id) }}"><button class="btn btn-success">Edit</button></a>
                      <form action="{{ route('item.destroy',$item->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-danger" type="submit">Delete</button>
                      </form>
                      <a href="{{ route('item_history',$item->id) }}"><button class="btn btn-info">History</button></a>
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