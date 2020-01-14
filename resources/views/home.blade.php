@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> -->
<div class="container">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Pemesanan Selesai</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Konten</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Kode Booking</th>
                                <th scope="col">Email</th>
                                <th scope="col">Paket</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Bank</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(App\Http\Controllers\PesanController::getPesanByAndStatus('D') as $pesan)
                            <tr>
                                <th class="getId">{{$pesan->kd_book}}</th>
                                <td class="email">
                                @php
                                    echo App\Http\Controllers\AkunController::getEmail($pesan->user_id);
                                @endphp
                                </td>
                                <td class="konten">Paket {{$pesan->konten_id}}</td>
                                <td class="tgl">{{$pesan->tanggal}}</td>
                                <td class="bank">{{$pesan->bank}}</td>
                                <td class="bank">{{$pesan->jumlah}}</td>
                                <td class="total">{{$pesan->total_harga}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">Tambah Data</button>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Url Photo</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(App\Http\Controllers\KontenController::index(0) as $konten)
                            <tr>
                                <td class="id">{{$konten->id}}</td>
                                <td class="judul">{{$konten->judul}}</td>
                                <td class="deskripsi">{{$konten->deskripsi}}</td>
                                <td class="harga">{{$konten->harga}}</td>
                                <td class="url">{{$konten->url_photo}}</td>
                                <td>
                                <button type="button" data-toggle="modal" data-target="#EditModal" class="btn btn-info" onclick="setText('{{$konten->id}}', '{{$konten->judul}}', '{{$konten->deskripsi}}', '{{$konten->harga}}', '{{$konten->url_photo}}')">Edit</button>
                                <button type="button" class="btn btn-danger hapus" onclick="hapus('{{$konten->id}}')">Hapus</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Tambah-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Konten</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-user-tambah">
                        <div class="form-group">
                            <label for="exampleInputNama1">Judul</label>
                            <input type="text" name="judul" class="form-control judul">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputDeskripsi1">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control deskripsi"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNim1">Harga</label>
                            <input type="number" name="harga" class="form-control harga">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">URL Photo</label>
                            <input type="email" name="urlphoto" aria-describedby="urlphoto" class="form-control urlphoto">
                            <small id="urlphoto" class="form-text text-muted">Simpan foto pada folder img terlebih dahulu, lalu masukan url photo nya disini</small>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="simpan()">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal EDIT-->
    <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Konten</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-user-edit">
                        <div class="form-group">
                            <label for="exampleInputNama1">Judul</label>
                            <input type="text" name="judul" class="form-control judul">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputDeskripsi1">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control deskripsi"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputNim1">Harga</label>
                            <input type="number" name="harga" class="form-control harga">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">URL Photo</label>
                            <input type="email" name="urlphoto" aria-describedby="urlphoto" class="form-control urlphoto">
                            <small id="urlphoto" class="form-text text-muted">Simpan foto pada folder img terlebih dahulu, lalu masukan url photo nya disini</small>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="edit($('.id').val())">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection