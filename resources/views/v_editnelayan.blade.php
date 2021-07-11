@extends('layout.v_template')
@section('title','Mitra')


@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nelayan</title>
</head>
<body>

    <div class="container">
        <form action="/nelayan/update/{{$nelayan->id_nelayan}}" method="post" enctype="multipart/form-data">
            @csrf
            <br>
        <div class="content">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label >Username</label>
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username" value="{{$nelayan->username }}" readonly>
                        <div class="text-denger">
                            @error('username')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label >Nama Nelayan</label>
                        <input type="text" name="nama_nelayan" class="form-control @error('nama_nelayan') is-invalid @enderror" placeholder="nama_nelayan" value="{{ $nelayan->nama_nelayan }}">
                        <div class="text-denger">
                            @error('nama_nelayan')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label >password</label>
                        <input type="text" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="password" value="{{$nelayan->password}}">
                        <div class="text-denger">
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="col-sm 12">
                        <div class="col-sm 6">
                            <img src="{{ url('foto_nelayan/'.$nelayan->foto_nelayan) }}" width="100px">
                        </div>
                        <br>
                        <div class="col-sm 6">
                            <div class="form-group">
                                <label >Ganti Foto Nelayan</label>
                                <input type="file" name="foto_nelayan" class="form-control">
                                <div class="text-denger">
                                    @error('foto')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <button class="btn btn-primary btn-sm">Simpan</button>
                    </div>
                </div>
                
            </div>
        </div>
        </form>
    </div>


</body>
</html>
@endsection