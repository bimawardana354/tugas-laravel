@extends('layout.v_template')

@section('content')

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>

        <title>Data Blogs </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

        <!-- Google Font -->
        <link rel="preconnect" href="https://fonts.gstatic.com"/>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Open+Sans&display=swap" rel="stylesheet"/>
        

        <!-- Icons Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css"/>
       

    </head>
    <body style="background: lightgray">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">  
                        <center>     
                        <h3 class="mb-3">{{ $blog->title }}</h3>
                        <img src="{{ Storage::url('public/blogs/').$blog->image }}" class="rounded" width="250px">
                        </center>  
                        <br>
                        <div class="col-md-8 ml-auto mr-auto">
                        {!! $blog->content !!}
                        </div>
                        <button type="button" class="btn btn-md btn-secondary"><a href="/blog" style="color: white; text-decoration:none;"><i class="fas fa-arrow-left"></i> Kembali</a></button>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</body>
</html>

@endsection
