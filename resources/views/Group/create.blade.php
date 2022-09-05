@extends('app')

@section('content')


<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2 class="text-decoration-underline mb-4 text-muted">Group Edit Form</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('group.index') }}"><button class="btn btn-success float-end mb-3">Go Back</button></a>
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
                <form method="POST" action="{{ route('group.store') }}">
                    @csrf
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">Group Name</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">

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
                            <select id="category_id" name="category_id" class="form-select @error('category_id') is-invalid @enderror" name="category_id" value="{{ old('category_id') }}" required>
                                <option value="#" disabled selected>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Create The Group
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
