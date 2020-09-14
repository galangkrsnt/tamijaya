@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="text-align: center">Bus</div>

                <div class="card-body">
                    <x-tambah>
                        <x-slot name="tambah">
                            {{ route('bus.create') }}
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
                    <th scope="col">No Bus</th>
                    <th scope="col">Tipe</th>
                    <th scope="col">Plat Nomor</th>
                    <th scope="col">Harga Tiket</th>
                    <th scope="col">Jumlah Kursi</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $no = 0;?>
                    @foreach ($bus as $b)
                    <?php $no++ ;?>
                    <tr>
                        <th scope="row">{{ $no }}</th>
                        <th scope="row">{{ $b->no_bus }}</th>
                        <th scope="row">{{ $b->tipe }}</th>
                        <td>{{ $b->plat_nomor }}</td>
                        <td>@currency($b->harga_tiket)</td>
                        <td>{{$b->jumlah_kursi}}</td>
                        <td><form action="{{ route('bus.destroy',$b->no_bus)}}" method="post">
                            @csrf @method('DELETE')
                            <a href="{{ route('bus.edit', $b->no_bus) }}" type="submit" class="btn btn-sm btn-success" >Edit</a>
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('are you sure?');">Delete</button>
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
