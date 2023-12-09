<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('/css/user/styles.css')}}"> 
    <meta name = "csrf-token" content = "{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @stack('css')
    
    <title>Book</title>
</head>
<body>
    <div class="container text-left mt-5 ">
        <div class="row ">
            <div class="col-12">
                <h1 style="font-weight: bold">Give Rating Author</h1>
            </div>
        </div>
    </div>
      <form method="post" action="{{ url('/save-rating') }}"> 
        @csrf



        <div class="container text-left mt-4">
            <div class="row ">
                <div class="col-lg-2 col-sm-4">
                    <h3 for="">Book Author</h3>
                </div>
                <div class="col-lg-3 col-sm-8">
                    <select name="author" id="author" class="form-select dynamic">
                    @foreach($author as $item)
                        <option value={{$item->author_id}}>{{$item->author_name}}</option>
                    @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="container text-left mt-2">
            <div class="row ">
                <div class="col-lg-2 col-sm-4">
                    <h3 for="search">Book Name:</h3>
                </div>
                <div class="col-lg-5 col-sm-8">
                    <select name="book" id="book" class="form-select dynamic" data-dependent="book_name" aria-label="Default select">
                         {{-- @foreach($book as $list)
                            <option value={{$list->author_id}} >{{$list->book_name}}</option>
                        @endforeach --}}
                        <option value="book">Choose Book Name</option>

                        </select>
                </div>
            </div>
        </div>

        <div class="container text-left mt-2">
            <div class="row ">
                <div class="col-lg-2 col-sm-4">
                    <h3 for="search">Rating:</h3>
                </div>
                <div class="col-lg-1 col-sm-2">
                    <select name="the_rating" id="the_rating" class="form-select" aria-label="Default select">
                        @for ($i = 1; $i <= 10; $i += 1)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>
        </div>



        <div class="container text-left mt-4">
            <div class="row ">
                <div class="col-5">

                    <button  class="btn btn-primary" type="submit">Submit</button>
                    <a href="{{ url('/')}}" class='btn btn-light'>Cancel</a>
                </div>
            </div>
        </div>
    </form>
    </div>

  
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
      <script src="//code.jquery.com/jquery-3.7.1.min.js"></script>
      {{-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> --}}
      <script>


        $(document).ready(function(){

            $('#author').on('change', function(){
                var author_id = $(this).val();
                //  console.log(author_id);

                if(author_id){
                    $.ajax({
                        url:'/getBook/'+ author_id,
                        type: 'GET',
                        data:{
                            '_token':'{{ csrf_token() }}'

                        },
                        dataType:'json',
                         success:function(data){
                            // console.log(data);

                            if(data){
                                $('#book').empty();
                                $('#book').append('<option value = "">--Choose Book Name--</option>');
                                $.each(data, function(index, book){
                                    $('#book').append(
                                        '<option value="'+book.book_id+'">' +
                                            book.book_name + '</option>'
                                    );
                                });

                            }else{
                                $('#book').empty();
                            }

                         }
                    });
                }else{
                    $('#author').empty();
                }

            });


        });
         </script> 




        @stack('script')
</body>
</html>