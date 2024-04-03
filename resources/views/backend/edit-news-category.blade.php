@extends('layout.master')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8-offser-2">
            <div class="card">
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert m-3 alert-success alert-dismissible fade show" role="alert">
                       {{ session('success')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <h5 class="card-title">Edit News Category</h5>
                    <!-- Floating Labels Form -->
                    <form class="row g-3" action="{{ url('/edit-category') }}" method="POST">
                        @csrf
                        <input type="hidden" name="category_id" value="{{ $getValue->id }}">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" value="{{ $getValue->category_name }}" class="form-control @error('category_name') id in-valid
                        
                    @enderror" name="category_name" id="category_name" placeholder="Category Name">
                                <label for="category_name">News Category Name</label>
                                @error('category_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form><!-- End floating Labels Form -->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
