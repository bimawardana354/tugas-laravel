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

    @if(Auth::user()->role == 'admin')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('blog.create') }}" class="btn btn-md btn-success mb-3"><i class="fas fa-plus"></i>  Tambah Blog</a>
                        <table class="table table-bordered">
                            <thead style="background-color: #B8DFD8;">
                              <tr>
                                <th scope="col">GAMBAR</th>
                                <th scope="col">JUDUL</th>
                                <th scope="col">CONTENT</th>
                                <th scope="col">AKSI</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($blogs as $blog)
                                <tr>
                                    <td class="text-center" width="250px">
                                        <img src="{{ Storage::url('public/blogs/').$blog->image }}" class="rounded" style="width: 150px">
                                    </td>
                                    <td width="150px">{{ $blog->title }}</td>
                                    <td >{!! $blog->content !!}</td>
                                    <td width="250px">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('blog.destroy', $blog->id) }}" method="POST">
                                            <a href="{{ route('blog.show', $blog->id) }}" class="btn btn-sm btn-info"><i class="fas fa-info-circle"></i> Detail</a>
                                            <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-sm btn-warning"><i class="far fa-edit"></i> Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data Blog belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{ $blogs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>

@endif
@if(Auth::user()->role == 'users')

    <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow rounded">
                        <div class="card-body">
                            
                            <table class="table table-bordered">
                                <thead style="background-color: #B8DFD8;">
                                <tr>
                                    <th scope="col">GAMBAR</th>
                                    <th scope="col">JUDUL</th>
                                    <th scope="col">CONTENT</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($blogs as $blog)
                                    <tr>
                                        <td class="text-center" width="250px">
                                            <img src="{{ Storage::url('public/blogs/').$blog->image }}" class="rounded" style="width: 150px">
                                        </td>
                                        <td width="150px">{{ $blog->title }}</td>
                                        <td >{!! $blog->content !!}</td>
                                        <td width="250px">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('blog.destroy', $blog->id) }}" method="POST">
                                                <a href="{{ route('blog.show', $blog->id) }}" class="btn btn-sm btn-info"><i class="fas fa-info-circle"></i> Detail</a>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Blog belum Tersedia.
                                    </div>
                                @endforelse
                                </tbody>
                            </table>  
                            {{ $blogs->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


        @endif
</body>
</html>

@endsection
