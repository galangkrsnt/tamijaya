
@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
                <div class="card-header" style="text-align: center">Penumpang</div>
                <div class="card-body">
                    <x-tambah>
                        <x-slot name="tambah">
                            {{ route('jadwal.cari') }}
                        </x-slot>
                    </x-tambah>
                    <form method="POST" action="{{ route('penumpang.sorting') }}">
                        @csrf
                    <div class="form-group row">
                        <div class="col-md-2">
                            <input id="id" type="text" class="form-control @error('idpesan') is-invalid @enderror" name="idpesan" placeholder="id pesanan">

                            @error('idpesan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                            <button type="submit" class="btn btn-primary">
                                Search
                            </button>
                    </div>
                    </form>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
            <table class="table">
                <thead bgcolor = #5cb85c>
                  <tr >
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Id Pesanan</th>
                    <th scope="col">No.Telepon</th>
                    <th scope="col">No.Ktp</th>
                    <th scope="col">No.Kursi</th>
                    <th scope="col">Tempat Berangkat</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $i=0;
                    @endphp
                    @foreach ($penumpang as $p)
                    @php
                        $i++;
                    @endphp
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $p->nama}}</td>
                        <td>{{ $p->id_pesan}}</td>
                        <td>{{ $p->no_telp}}</td>
                        <td>{{$p->no_ktp}}</td>
                        <td>{{$p->no_kursi}}</td>
                        <td>{{$p->ket_tempat_berangkat}}</td>
                        <td><form action="{{ route('penumpang.destroy', $p->id)}}" method="post">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('are you sure?');">Delete</button>
                            <a href="{{ route('penumpang.edit', $p->id)}}" type="submit" class="btn btn-sm btn-success" >Edit</a>
                        </form></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

