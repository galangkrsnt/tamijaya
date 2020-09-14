@extends('layouts.admin')

@section('content')
<div class="container">
    <x-navigation></x-navigation>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Jadwal</div>

                <div class="card-body">

                    <form method="post" action="{{ route('jadwal.update', $jadwal->id) }}">
                        @csrf
                        @method('PUT')
                    <div class="form-group row">
                        <label for="tgl_keberangkatan" class="col-md-4 col-form-label text-md-right">Tanggal Berangkat</label>
                        <div class="col-md-6">
                            <input id="tgl_keberangkatan" type="date" class="form-control @error('tgl_keberangkatan') is-invalid @enderror" name="tgl_keberangkatan" value="{{ $jadwal->tgl_keberangkatan }}">

                            @error('tgl_keberangkatan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="no_bus" class="col-md-4 col-form-label text-md-right">Nomor Bus</label>

                        <div class="col-md-6">
                            <input id="no_bus" type="text" class="form-control @error('no_bus') is-invalid @enderror" name="no_bus" value="{{ $jadwal->no_bus }}">

                            @error('no_bus')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tempat_berangkat" class="col-md-4 col-form-label text-md-right">Dari</label>

                        <div class="col-md-6">
                            <input id="tempat_berangkat" type="text" class="form-control @error('tempat_berangkat') is-invalid @enderror" name="tempat_berangkat" value="{{ $jadwal->tempat_berangkat }}">

                            @error('tempat_berangkat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tujuan" class="col-md-4 col-form-label text-md-right">Tujuan</label>

                        <div class="col-md-6">
                            <input id="tujuan" type="text" class="form-control @error('tujuan') is-invalid @enderror" name="tujuan" value="{{ $jadwal->tujuan }}">

                            @error('tujuan')
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

