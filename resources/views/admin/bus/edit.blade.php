@extends('layouts.admin')

@section('content')
<div class="container">
    <x-navigation></x-navigation>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Bus</div>

                <div class="card-body">

                    <form method="post" action="{{ route('bus.update', $bu->no_bus) }}">
                        @csrf
                        @method('PUT')
                    <div class="form-group row">
                        <label for="no_bus" class="col-md-4 col-form-label text-md-right">Nomor Bus</label>
                        <div class="col-md-6">
                            <input id="no_bus" type="text" class="form-control @error('no_bus') is-invalid @enderror" name="no_bus" value="{{ $bu->no_bus }}">

                            @error('no_bus')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tipe" class="col-md-4 col-form-label text-md-right">Tipe Bus</label>

                        <div class="col-md-6">
                            <select id="tipe" type="text" class="form-control @error('tipe') is-invalid @enderror" name="tipe">
                                <option value="Suite Class">Suite Class</option>
                                <option value="Executive Class">Executive Class</option>
                            </select>

                            @error('tipe')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="plat_nomor" class="col-md-4 col-form-label text-md-right">Plat Nomor</label>

                        <div class="col-md-6">
                            <input id="plat_nomor" type="text" class="form-control @error('plat_nomor') is-invalid @enderror" name="plat_nomor" value="{{ $bu->plat_nomor }}">

                            @error('plat_nomor')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="harga_tiket" class="col-md-4 col-form-label text-md-right">Harga Tiket</label>

                        <div class="col-md-6">
                            <input id="harga_tiket" type="text" class="form-control @error('harga_tiket') is-invalid @enderror" name="harga_tiket" value="{{ $bu->harga_tiket }}">

                            @error('harga_tiket')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="jumlah_kursi" class="col-md-4 col-form-label text-md-right">Jumlah Kursi</label>

                        <div class="col-md-6">
                            <input id="jumlah_kursi" type="text" class="form-control @error('jumlah_kursi') is-invalid @enderror" name="jumlah_kursi" value="{{ $bu->jumlah_kursi }}">

                            @error('jumlah_kursi')
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

