
@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="text-align: center">Detail Pesanan</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
            <table class="table">
                <thead bgcolor = #50c942>
                  <tr >
                    <th scope="col">No.Penumpang</th>
                    <th scope="col">No.Pesanan</th>
                    <th scope="col">Nama</th>
                    <th scope="col">No.Ktp</th>
                    <th scope="col">No.Kursi</th>
                    <th scope="col">Tempat Berangkat</th>
                    <th scope="col">Bukti Bayar</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($penumpang as $p)
                    <tr>
                        <th scope="row">{{ $p->id }}</th>
                        <td>{{ $p->id_pesan}}</td>
                        <td>{{ $p->nama}}</td>
                        <td>{{$p->no_ktp}}</td>
                        <td>{{$p->no_kursi}}</td>
                        <td>{{$p->ket_tempat_berangkat}}</td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
            <h5 style="margin-left: 100px">Bukti Pembayaran :</h5>
            <table class="table">
                <tr>
                @foreach ($pembayaran as $pbyr)
                        @php $path = Storage::url('pembayaran/'.$pbyr->path); @endphp
                        <td><img src="{{ url($path) }}" width="200px" height="100px"/></td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>
                            @csrf
                            @foreach ($pesanan as $pesan)
                            @if ($pesan->status == 'menunggu konfirmasi')
                            <a href="{{ route('pembayaran.konfirmasi', $pesan->id)}}" type="submit" class="btn btn-sm btn-primary" >Konfirmasi Pembayaran</a></td>
                            @endif
                            @endforeach
                    </tr>
            </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

