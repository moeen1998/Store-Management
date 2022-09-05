@extends('app')

@section('content')


<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2 class="text-decoration-underline mb-4 text-muted">Purchase id { <span id="purchase_id">{{ $data['purchase']->id }}</span>} Update Form</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('purchase.index') }}"><button class="btn btn-success float-end mb-3">Go Back</button></a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
        
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="d-flex col-sm-12 col-md-3 mb-4">
                    <label for="transaction_number" class="col-md-4 col-form-label text-md-end">T.Number</label>
                    <input id="transaction_number" type="text" class="form-control @error('transaction_number') is-invalid @enderror" name="transaction_number" value="{{ old('transaction_number',$data['purchase']->transaction_number) }}" required autocomplete="transaction_number">
                </div>

                <div class="d-flex col-sm-12 col-md-4 mb-4">
                    <label for="item_id" class="col-md-4 col-form-label text-md-end">From</label>
                    <input id="from" type="text" class="form-control @error('from') is-invalid @enderror" name="from" value="{{ old('from',$data['purchase']->from) }}" required autocomplete="from">
                </div>

                <div class="d-flex  col-sm-12 col-md-5 mb-4">
                    <label for="item_id" class="col-md-4 col-form-label text-md-end">Item Name</label>
                    <select id="item_id" name="item_id" class="form-select">
                        <option value="#" disabled selected></option>
                        @foreach ($data['items'] as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-success ml-2" onclick="add()">Add</button>
                </div>
            </div>

            <div class="row">
                <section class="col-lg-12 connectedSortable">
            
                    <table id="tblCustomers" class="table table-striped table-bordered ">
                        <thead>
                        <tr>	
                            <th scope="col">Item Id</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">qty</th>
                            <th scope="col">Packing</th>
                            <th scope="col">action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['purchase']->Items as $item)
                                <tr>
                                    <td>{{ $item->item->id }}</td>
                                    <td>{{ $item->item->name }}</td>
                                    <td> <input class="form-control" style="width:110px;" value="{{ $item->qty }}"/></td>
                                    <td>
                                        <select name="packing" class="form-select">
                                            @foreach ($item->item->Pakings as $paking)
                                                @if($paking->name == $item->p_type)
                                                    <option value="{{ $paking->value }}" selected>{{ $paking->name }}</option>                                                    
                                                @else
                                                <option value="{{ $paking->value }}">{{ $paking->name }}</option>                                                    
                                                @endif
                                            @endforeach
                                        {{ $item->item->qty }}
                                    
                                    </td>
                                    <td><button id="remove" class="btn btn-danger">Remove</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>
            </div>
            <div class="row">
                <div class="col-12">
                    <button id="send" class="btn btn-success w-25 float-right"onclick="update()">Save</button>
                </div>
            </div>
        </div>
    </section>

</div>

@endsection
