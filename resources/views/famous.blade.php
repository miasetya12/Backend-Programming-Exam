<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('/css/user/styles.css')}}">   
    @stack('css')
    
    <title>Famous Author</title>
</head>

<body> 
  <div class="container text-left mt-5">
      <div class="row ">
          <div class="col-5">
              <a href="{{ url('/')}}" class='btn btn-light'>Back</a>
          </div>
      </div>
    </div>
  </div>

  <div class="container text-center mt-3 ">
    <div class="row ">
        <div class="col-12">
            <h1 style="font-weight: bold">Top 10 Most Famous Author</h1>
        </div>
    </div>
</div>

  <div class="container text-left mt-4 "  style="max-width: 500px;">
    <table class="table">
        <thead>
          <tr>
            <th >No</th>
            <th >Author Name</th>
            <th >Voter</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php $i = 1 ?>
            @foreach ($book as $b)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $b->author->author_name }}</td>
                <td>{{ $b->total_voter  }}</td>
            </tr>
            @endforeach
        </tbody>
      </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  @stack('script')
</body>
</html>