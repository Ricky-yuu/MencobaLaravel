@extends('layout.v_template')
@section('title','Nelayan')



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
<br>
<br>

    <div class="container">
        <a href="/nelayan/add" class="btn btn-primary btn-sm">Add Nelayan</a>
        <br><br>
        @if (session('pesan'))
        <div class="alert alert-success alert-dimissible">
            <h4><i class="icon fa fa-check"></i>Success</h4>
            {{(session('pesan'))}}.
        </div>
            
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>nama</th>
                    <th>password</th>
                    <th>foto</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?> 
                @foreach ($nelayan as $data) 
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->username }}</td>
                        <td>{{ $data->nama_nelayan }}</td>
                        <td>{{ $data->password }}</td>
                        <td><img src="{{ url('foto_nelayan/'.$data->foto_nelayan) }}" width="60px"></td>
                        <td>
                            <a href="/nelayan/detail/{{ $data->id_nelayan}}" class="btn btn-sn. btn-success">Detail</a>
                            <a href="/nelayan/edit/{{ $data->id_nelayan}}" class="btn btn-sn. btn-warning">Edit</a>
                           <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete">
                              Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="modal" tabindex="-1" id="delete">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Modal title</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>
    </div>

     
</body>
</html>
@endsection