@extends('layouts.admin')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
                <div class="card-header" style="text-align: center">Pesanan</div>
                <div class="card-body">
                    <x-tambah>
                        <x-slot name="tambah">
                            {{ route('jadwal.cari') }}
                        </x-slot>
                    </x-tambah>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

            <table class="table">
                <thead bgcolor = #5cb85c>
                  <tr>
                    <th scope="col">Tgl Keberangkatan</th>
                    <th scope="col">No Pesanan</th>
                    <th scope="col">Jumlah Penumpang</th>
                    <th scope="col">Tujuan</th>
                    <th scope="col">Total Bayar</th>
                    <th scope="col">Status Pembayaran</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($pesanan as $pesan)
                    <tr>
                        <td>{{ $pesan->jadwal->tgl_keberangkatan }}</td>
                        <td>{{ $pesan->id }}</td>
                        <td>{{ $pesan->jumlah_penumpang }}</td>
                        <td>{{ $pesan->jadwal->tempat_berangkat }} -> {{ $pesan->jadwal->tujuan }}</td>
                        <td>@currency($pesan->total_bayar)</td>
                        <td>{{ $pesan->status }}</td>
                        <td><form action="{{ route('pesanan.destroy', $pesan->id)}}" method="post">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('are you sure?');">Delete</button>
                            <a href="{{ route('pesanan.edit', $pesan->id)}}" type="submit" class="btn btn-sm btn-success" >Edit</a>
                            <a href="{{ route('pesanan.detail', $pesan->id)}}" type="submit" class="btn btn-sm btn-primary" >Detail</a>
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
