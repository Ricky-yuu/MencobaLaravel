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
        
    <table class="table">
        <tr>
            <th width="150px">Username</th>
            <th width="30px">:</th>
            <th>{{ $nelayan->username }}</th>
        </tr>
        <tr>
            <th width="150px">Nama Nelayan</th>
            <th width="30px">:</th>
            <th>{{ $nelayan->nama_nelayan }}</th>
        </tr>
        <tr>
            <th width="150px">Password</th>
            <th width="30px">:</th>
            <th>{{ $nelayan->password }}</th>
        </tr>
        <tr>
            <th width="150px">Foto</th>
            <th width="30px">:</th>
            <th><img src="{{ url('foto_nelayan/'.$nelayan->foto_nelayan) }}" width="250px"></th>
        </tr>
        <tr>
            <th>
                <a href="/nelayan" class="btn btn-success btn-sm">Kembali</a>
            </th>
        </tr>

    </table>
        

    </div>

</body>
</html>
@endsection