@extends('app')

@section('content')


<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2 class="text-decoration-underline mb-4 text-muted">Item Edit Form</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('item.index') }}"><button class="btn btn-success float-end mb-3">Go Back</button></a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
        
    <section class="content">
        <div class="container-fluid">
            <div class="row">
            <section class="col-lg-12 connectedSortable"> 
                <form method="POST" action="{{ route('item.update',$data['item']->id) }}">
                    @csrf
                    @method('PUT')
                    
                    <div class="row mb-3">
                        <label for="code" class="col-md-4 col-form-label text-md-end">Item code</label>

                        <div class="col-md-6">
                            <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code',$data['item']->code) }}" required autocomplete="code">

                            @error('code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">Item Name</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name',$data['item']->name) }}" required autocomplete="name">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="category_id" class="col-md-4 col-form-label text-md-end">Category Name</label>
                        <div class="col-md-6">
                            <select id="category_id" name="category_id" class="form-select">
                                @foreach ($data['categories'] as $category)
                                    @if ($category->id == $data['item']->category_id)
                                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                    @else
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="group_id" class="col-md-4 col-form-label text-md-end">Group Name</label>
                        <div class="col-md-6">
                            <select id="group_id" name="group_id" class="form-select">
                                @foreach ($data['groups'] as $group)
                                    @if ($group->id == $data['item']->group_id)
                                        <option value="{{ $group->id }}" selected>{{ $group->name }}</option>
                                    @else
                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('group_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="description" class="col-md-4 col-form-label text-md-end">Item description</label>

                        <div class="col-md-6">
                            <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description',$data['item']->description) }}" required autocomplete="description">

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="price" class="col-md-4 col-form-label text-md-end">Item price</label>

                        <div class="col-md-6">
                            <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price',$data['item']->price) }}" required autocomplete="price">

                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Update The Item
                            </button>
                        </div>
                    </div>
                </form>
            </section>
            </div>
        </div>
    </section>

</div>

@endsection
