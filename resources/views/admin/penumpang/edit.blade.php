@extends('layouts.admin')

@section('content')
<div class="container">
    <x-navigation></x-navigation>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Penumpang</div>

                <div class="card-body">

                    <form method="post" action="{{ route('penumpang.update', $penumpang->id) }}">
                        @csrf
                        @method('PUT')
                    <div class="form-group row">
                        <label for="nama" class="col-md-4 col-form-label text-md-right">Nama</label>
                        <div class="col-md-6">
                            <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ $penumpang->nama }}">

                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="no_ktp" class="col-md-4 col-form-label text-md-right">Nomor KTP</label>
                        <div class="col-md-6">
                            <input id="no_ktp" type="text" class="form-control @error('no_ktp') is-invalid @enderror" name="no_ktp" value="{{ $penumpang->no_ktp }}">

                            @error('no_ktp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="ket_tempat_berangkat" class="col-md-4 col-form-label text-md-right">Tempat Bernagkat</label>
                        <div class="col-md-6">
                            <input id="tket_tempat_berangkat" type="text" class="form-control @error('ket_tempat_berangkat') is-invalid @enderror" name="ket_tempat_berangkat" value="{{ $penumpang->ket_tempat_berangkat }}">

                            @error('ket_tempat_berangkat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="no_telp" class="col-md-4 col-form-label text-md-right">Nomor Telepon</label>
                        <div class="col-md-6">
                            <input id="no_telp" type="text" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" value="{{ $penumpang->no_telp }}">

                            @error('no_telp')
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

