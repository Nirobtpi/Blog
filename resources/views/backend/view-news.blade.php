@extends('layout.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if(Session('success'))
                    <div class="alert mt-3 alert-primary alert-dismissible fade show" role="alert">
                       {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <h5 class="card-title">All News</h5>


                    <!-- Primary Color Bordered Table -->
                    <table class="table table-bordered border-primary">
                        <thead>
                            <tr>
                                <th scope="col">Sl No</th>
                                <th scope="col">News Title</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Category</th>
                                <th scope="col">Sub Category</th>
                                <th scope="col">Thumbnail</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($newsItems as $news)
                            <tr>
                                <th scope="row">{{ $loop->index +1 }}</th>
                                <td>{{ $news->news_title }}</td>
                                <td>{{ $news->slug }}</td>
                                <td>{{ $news->get_category->category_name }}</td>
                                <td>{{ $news->get_sub_category->sub_category_name }}</td>
                                <td><img src="{{ asset('/storage/'.$news->thumbnail) }}"
                                        style="width: :50px; height:50px; object-fit:cover" alt=""></td>
                                <td>
                                    <a href="{{ url('/admin/edit-news') }}/{{ $news->id }}" class="btn btn-sm btn-outline-info d-block mb-1">Edit</a>&nbsp;&nbsp;
                                    <a href="{{ url('/admin/news-delete') }}/{{ $news->id }}"
                                        class="btn btn-sm btn-outline-danger">delete</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <!-- End Primary Color Bordered Table -->

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
