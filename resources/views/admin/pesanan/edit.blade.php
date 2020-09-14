@extends('layouts.admin')

@section('content')
<div class="container">
    <x-navigation></x-navigation>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Pesanan</div>

                <div class="card-body">

                    <form method="post" action="{{ route('pesanan.update', $pesanan->id) }}">
                        @csrf
                        @method('PUT')
                    <div class="form-group row">
                        <label for="jumlah_penumpang" class="col-md-4 col-form-label text-md-right">Jumlah Penumpang</label>
                        <div class="col-md-6">
                            <input id="jumlah_penumpang" type="text" class="form-control @error('jumlah_penumpang') is-invalid @enderror" name="jumlah_penumpang" value="{{ $pesanan->jumlah_penumpang }}">

                            @error('jumlah_penumpang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="total_bayar" class="col-md-4 col-form-label text-md-right">Total Bayar</label>
                        <div class="col-md-6">
                            <input id="total_bayar" type="text" class="form-control @error('total_bayar') is-invalid @enderror" name="total_bayar" value="{{ $pesanan->total_bayar }}">

                            @error('total_bayar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                            <a href={{ url()->previous() }} class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

