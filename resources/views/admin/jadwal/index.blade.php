@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
                <div class="card-header" style="text-align: center">Jadwal</div>

                <div class="card-body">
                    <x-tambah>
                        <x-slot name="tambah">
                            {{ route('jadwal.create') }}
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
                    <th scope="col">No</th>
                    <th scope="col">Tgl Keberangkatan</th>
                    <th scope="col">Nomor Bus</th>
                    <th scope="col">Tipe Bus</th>
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
                        <td>{{ \Carbon\Carbon::parse($j->tgl_keberangkatan)->format('d-m-Y') }}</td>
                        <td>{{$j->no_bus}}</td>
                        <td>{{$j->buses->tipe}}</td>
                        <td>{{$j->tempat_berangkat}}->{{ $j->tujuan }}</td>
                        <td>@currency($j->buses->harga_tiket)
                        </td>

                        <td><form action="{{ route('jadwal.destroy', $j->id)}}" method="post">
                            @csrf @method('DELETE')
                            <a href="{{ route('jadwal.edit', $j->id)}}" type="submit" class="btn btn-sm btn-success" >Edit</a>
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('are you sure?');">Delete</button>
                            <a href="{{ route('jadwal.detail', $j->id)}}" type="submit" class="btn btn-sm btn-primary" >Detail</a>
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
