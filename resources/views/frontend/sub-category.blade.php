<!doctype html>
<html lang="en">

<head>
    <title>News Paper</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main class="mt-5">


        <div class="container">
            <div class="row">
                <h1>{{ $subCat->sub_category_name }}</h1>
                <div class="category mb-4">
                    {{-- @foreach ($categories as $category)
                         <a class="text-info" href="{{ url('') }}/{{ $category->category_name }}/{{ $category->id }}">{{ $category->category_name }}</a>&nbsp;&nbsp;
                    @endforeach --}}
                   
                </div>
                @foreach ($all as $one)
                <div class="col-md-6 mb-2">
                    <div class="card bordered">
                       <a href="{{ url('') }}/{{ $one->slug }}/{{ $one->id }}" style="text-decoration: none">
                         <div class="card-body">
                            <img src="{{ asset('/storage/'.$one->thumbnail) }}" style="width:100%; height:350px; object-fit:cover" alt="">
                            <div class="description">
                                <h2 style="font-size:22px" class="text-dark">{{ $one->news_title }}</h2>
                            </div>
                        </div>
                       </a>
                    </div>
                </div>
                @endforeach


            </div>
        </div>

    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
