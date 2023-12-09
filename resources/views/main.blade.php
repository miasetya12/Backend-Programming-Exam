<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('/css/user/styles.css')}}">   
    @stack('css')
    
    <title>Book</title>
</head>
<body>

      <form method="get" action="{{ Route('test') }}"> 
        @csrf

        <div class="container mt-5">
            <div class="row ">
                <div class="col-lg-2 col-sm-4">
                    <h2 for="filter">List Shown: </h2>
                </div>
                <div class="col-lg-2 col-sm-2 dropdown">
                    <select name="filter" id="filter" class="btn btn-outline-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @for ($i = 10; $i <= 100; $i += 10)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-lg-8 col-sm-6 justify-content-end">

                    {{-- <button  class="btn btn-primary" type="submit">Filter</button> --}}
                </div>

            </div>
        </div>


        <div class="container text-left">
            <div class="row mt-1">
                <div class="col-lg-2 col-sm-4">
                    <h2 for="search">Search:</h2>
                </div>
                <div class="col-lg-5 col-sm-8 ">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" id="search" placeholder="Enter book or author name">
                </div>


                </div>
            </div>
        </div>

        <div class="container mt-3 mb-3">
            <div class="row">
                <div class="col-lg-9 col-sm-5">

                    <button  class="btn btn-primary col-lg-2 col-sm-5" type="submit">Submit</button>
                    <a href="{{ url('/')}}" class='btn btn-light'>Back</a>
                </div>
                <div class="col-lg-3 col-sm-7">
                    <a href="{{ url('/rating')}}" class='btn btn-dark'>Give Rating</a>
                    <a href="{{ url('/famous')}}" class='btn btn-dark'>Famous Author</a>
                </div>
            </div>
        </div>
    </form>

     <div class="container text-left">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Book Name</th>
                <th scope="col">Category Name</th>
                <th scope="col">Author Name</th>
                <th scope="col">Average Rating</th>
                <th scope="col">Voter</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php $i = 1 ?>
                @foreach ($book as $b)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $b->book_name }}</td>
                    <td>{{ $b->category->category_name }}</td>
                    <td>{{ $b->author->author_name }}</td>
                    <td>{{ $b->average_rating }}</td>
                    <td>{{ $b->voter  }}</td>
                </tr>
                @endforeach
            </tbody>
          </table>
    </div>

  

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

        @stack('script')
</body>
</html>