@extends('backend.dashboard')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-8 offset-2">
            <div class="card">
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert mt-3 alert-primary alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    </div>
                    @endif
                    <h5 class="card-title">All Categori=y</h5>

                    <!-- Table with stripped rows -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Sl</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <th scope="row">{{ $loop->index +1 }}</th>
                                <td>{{ $category->category_name }}</td>
                                <td>
                                    <a href="" class="btn btn-outline-success">Edit</a>
                                    <a href="{{ url('/delete-category') }}/{{ $category->id }}"
                                        class="btn btn-outline-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
</div>

@endsection
