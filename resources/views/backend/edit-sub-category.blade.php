@extends('layout.master')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 offset-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Sub Category</h5>
                    @if (session('success'))
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <!-- Vertical Form -->
                    <form class="row g-3" action="{{ url('/update-sub-category') }}" method="post">
                        @csrf
                        <input type="hidden" name="sub_category_id" value="{{ $data->id }}">
                        <div class="col-12">
                            <label for="inputNanme4" class="form-label">Sub Category Name</label>
                            <input type="text" value="{{ $data->sub_category_name }}" name="sub_category_name" class="form-control @error('sub_category_name') is in-valid
                      
                            @enderror" placeholder="Sub Category Name" id="inputNanme4">
                            @error('sub_category_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                        <div class="col-md-12">
                            <label for="inputState" class="form-label">Choose Category</label>
                            <select id="inputState" name="category_id" class="form-select @error('category_id')
                      
                             @enderror">
                                <option selected="">Choose...</option>
                                @foreach ($categories as $category)
                                <option @if ($data->category_id == $category->id)
                                  {{ 'selected' }}
                                @endif value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach

                            </select>
                            @error('category_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form><!-- Vertical Form -->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
