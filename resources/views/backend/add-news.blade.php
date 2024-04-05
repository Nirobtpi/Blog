@extends('layout.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2">
            <div class="card">
                <div class="card-body">
                     @if(session('success'))
                <div class="alert mt-3 alert-primary alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    
                </div>
                <hr>
                @endif
                    <h5 class="card-title">Add News</h5>

                    <!-- Floating Labels Form -->
                    <form class="row g-3" action="{{ url('/add-news-item') }}" method="Post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="news_title" id="floatingName"
                                    placeholder="Enter news title">
                                <label for="floatingName">News Title</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" name="slug" class="form-control" id="floatingEmail"
                                    placeholder="Enter slug">
                                <label for="floatingEmail">Slug</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <select name="news_category" class="form-select" id="floatingSelect" aria-label="State">
                                    <option selected="">Select One</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">News Category</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <select name="news_sub_category" class="form-select" id="floatingSelect"
                                    aria-label="State">
                                    <option selected="">Select One</option>
                                    @foreach ($subCategories as $subcategory)
                                    <option value="{{ $subcategory->id }}">{{ $subcategory->sub_category_name }}
                                    </option>
                                    @endforeach


                                </select>
                                <label for="floatingSelect">Sub Category</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea name="sort_description" class="form-control" placeholder="Address"
                                    id="floatingTextarea" style="height: 100px;"></textarea>
                                <label for="floatingTextarea">Sort Description</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea name="description" class="form-control" name="description"
                                    placeholder="Address" id="floatingTextarea" style="height: 100px;"></textarea>
                                <label for="floatingTextarea">Full Description</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="file" name="thumbnail" class="form-control" id="floatingfile">
                                <label for="floatingEmail">Thumbnail</label>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
