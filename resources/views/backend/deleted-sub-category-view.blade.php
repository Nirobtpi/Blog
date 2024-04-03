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
                    <h5 class="card-title">All Categoriy</h5>

                    <!-- Table with stripped rows -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Sl</th>
                                <th scope="col">Sub Category Name</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subCategory as $key=>$category)
                            <tr>
                                <th scope="row">{{ $subCategory->firstItem()+ $key }}</th>
                                <td>{{ $category->sub_category_name }}</td>
                                <td>{{ $category->get_category_name->category_name }}</td>
                                <td>
                                    <a href="{{ url('/restore') }}/{{ $category->id }}" class="btn btn-outline-success">Restore</a>
                                    <a href="{{ url('/delete') }}/{{ $category->id }}"
                                        class="btn btn-outline-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $subCategory->links() }}
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
</div>

@endsection
