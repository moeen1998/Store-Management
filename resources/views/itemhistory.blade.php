@extends('app')

@section('content')

  <div class="content-wrapper">
    <section class="content py-5">
      <div class="container-fluid">
        <div class="row">
          <section class="col-lg-12 connectedSortable"> 
            <h2>Out Transaction { {{ count($data['orders']) }} }</h2>
            <table id="tblCustomers" class="table table-striped table-bordered">
              <thead>
                <tr>	
                  <th scope="col">#</th>
                  <th scope="col">transaction number</th>
                  <th scope="col">transaction Qty</th>
                  <th scope="col">UOM</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data['orders'] as $order_item)
                  <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $order_item->Order->transaction_number }}</td>
                    <td>{{ $order_item->qty }}</td>
                    <td>{{ $order_item->p_type }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <input type="button" id="btnExport" value="Export" onclick="Export()" />

          </section>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <section class="col-lg-12 connectedSortable"> 
            <h2>In Transaction { {{ count($data['purchases']) }} }</h2>
            <table id="intransactions" class="table table-striped table-bordered">
              <thead>
                <tr>	
                  <th scope="col">#</th>
                  <th scope="col">transaction number</th>
                  <th scope="col">transaction Qty</th>
                  <th scope="col">UOM</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data['purchases'] as $order_item)
                  <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $order_item->Purchase->transaction_number }}</td>
                    <td>{{ $order_item->qty }}</td>
                    <td>{{ $order_item->p_type }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <input type="button" id="btnExport" value="Export" onclick="Export2()" />
          </section>
        </div>
      </div>
    </section>

  </div>
  
@endsection