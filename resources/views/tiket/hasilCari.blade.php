@extends('layouts.pesan')

@section('content')
<div class="container">
    <x-navigation></x-navigation>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="text-align: center">JADWAL TERSEDIA</div>


            <table class="table" style="width: 100%">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tipe Bus</th>
                    <th scope="col">Tgl Keberangkatan</th>
                    <th scope="col">Nomor Bus</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Harga Tiket</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $no = 0;?>
                    @foreach ($jadwal as $j)
                    <?php $no++ ;?>
                    <tr>
                        <th scope="row">{{ $no }}</th>
                        <td>{{ $j->buses->tipe }}</td>
                        <td>{{ $j->tgl_keberangkatan }}</td>
                        <td>{{$j->no_bus}}</td>
                        <td>{{$j->tempat_berangkat}}->{{ $j->tujuan }}</td>
                        <td>@currency($j->buses->harga_tiket)
                        </td>

                        <td><form method="post">
                            @csrf
                            <a href="{{ route('pesanan.kursi',$j->id)}}" type="submit" class="btn btn-sm btn-success" >Pesan</a>
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
