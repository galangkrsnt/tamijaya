@extends('layouts.pesan')

@section('content')
<div class="container">
    <x-navigation></x-navigation>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Cari Tiket</div>

                <div class="card-body">
                    <form method="GET" action="{{ route('jadwal.hasilCari') }}">
                        @csrf
                    <div class="form-group row">
                        <label for="tgl_keberangkatan" class="col-md-4 col-form-label text-md-right">Tanggal Berangkat</label>

                        <div class="col-md-6">
                            <input id="tgl_keberangkatan" type="date" class="form-control @error('tgl_keberangkatan') is-invalid @enderror" name="tgl_keberangkatan" min="{{ date("Y-m-d", strtotime('tomorrow')) }}">

                            @error('tgl_keberangkatan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tempat_berangkat" class="col-md-4 col-form-label text-md-right">Dari</label>

                        <div class="col-md-6">
                            <select id="tempat_berangkat" type="text" class="form-control @error('tempat_berangkat') is-invalid @enderror" name="tempat_berangkat">
                                <option value='Yogyakarta'>Yogyakarta</option>
                                <option value='Denpasar'>Denpasar</option>
                            </select>

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
                            <select id="tujuan" type="text" class="form-control @error('tujuan') is-invalid @enderror" name="tujuan">
                                <option value='Denpasar'>Denpasar</option>
                                <option value='Yogyakarta'>Yogyakarta</option>
                            </select>

                            @error('tujuan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">

                        <div class="col-md-6">
                            <input id="jml_penumpang" type="hidden" class="form-control @error('jml_penumpang') is-invalid @enderror" name="jml_penumpang">

                            @error('jml_penumpang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-success">
                                Cari
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

