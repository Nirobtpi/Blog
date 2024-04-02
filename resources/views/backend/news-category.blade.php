@extends('layout.master')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8-offser-2">
            <div class="card">
            <div class="card-body">
              <h5 class="card-title">Floating labels Form</h5>

              <!-- Floating Labels Form -->
              <form class="row g-3" action="{{ url('/add-category') }}" method="POST">
                @csrf
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control @error('category_name') id in-valid
                        
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