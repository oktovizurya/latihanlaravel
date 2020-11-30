@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card table-responsive">
                <div class="card-header">Dashboard <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target=".modal">Tambah</button></div>
                
                <div class="card-body">
                    
                    <table class="table">
                        @if (session('status'))
                            <div class="col-12">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                            @endif
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Username</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Agama</th>
                                <th scope="col">Biografi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($pengguna as $item)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->jk = 'l' ? 'laki-laki' : 'perempuan' }}</td>
                                <td>{{ $item->agama }}</td>
                                <td>{!! $item->biografi !!}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form action="{{ route('simpan') }}" method="post">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                        <input type="text" class="form-control"  aria-describedby="emailHelp" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control"  aria-describedby="emailHelp" name="username">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control"  aria-describedby="emailHelp" name="email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                    </div>
                    
            
                    <div class="form-group">
                        <select class="form-control" name=agama>
                            <option value="Islam">Islam</option>
                        </select>
                        
                    </div>
                    <div class="form-group">
                        <label for="">Gender</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jk" id="exampleRadios1" value="p" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Perempuan
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jk" id="exampleRadios2" value="l">
                            <label class="form-check-label" for="exampleRadios2">
                                Laki-laki
                            </label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Biografi</label>
                        <textarea name="biografi" id="" cols="30" rows="10"></textarea>
                    </div>
                    
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection
