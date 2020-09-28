@extends('layouts.pesan')

@section('content')
<div class="container">
    <x-navigation></x-navigation>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    @foreach ($jadwal as $j)
                    <form method="post" action="{{ route('penumpang.store',$j->id) }}">
                        @csrf
                        @for ( $x = 1 ; $x <=  $kursi ; $x++)
                        <div class="card-header">Masukan Data Penumpang {{ $x }}</div>
                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">Nama</label>
                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama[]">

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
                                <input id="no_ktp" type="text" class="form-control @error('no_ktp') is-invalid @enderror" name="no_ktp[]">

                                @error('no_ktp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @foreach ( $jadwal as $j)
                            @if ($j->tempat_berangkat == "Yogyakarta")

                            <div class="form-group row">
                                <label for="ket_tempat_berangkat" class="col-md-4 col-form-label text-md-right">Keterangan Tempat Berangkat</label>

                                <div class="col-md-6">
                                    <select id="ket_tempat_berangkat" type="text" class="form-control @error('ket_tempat_berangkat') is-invalid @enderror" name="ket_tempat_berangkat[]">
                                        <option value="Terminal Giwangan">Terminal Giwangan</option>
                                        <option value="Kantor Jogja">Kantor Jogja</option>
                                        <option value="Mirota Babarsari">Mirota Babarsari</option>
                                        <option value="Prambanan">Prambanan</option>
                                        <option value="Terminal Klaten">Terminal Klaten</option>
                                        <option value="Agen Delangu">Agen Delangu</option>
                                        <option value="Agen Solo">Agen Solo</option>
                                    </select>

                                    @error('ket_tempat_berangkat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            @elseif($j->tempat_berangkat == "Denpasar")
                            <div class="form-group row">
                                <label for="ket_tempat_berangkat" class="col-md-4 col-form-label text-md-right">Keterangan Tempat Berangkat</label>

                                <div class="col-md-6">
                                    <select id="ket_tempat_berangkat" type="text" class="form-control @error('ket_tempat_berangkat') is-invalid @enderror" name="ket_tempat_berangkat[]">
                                        <option value="Terminal Mengwi">Terminal Mengwi</option>
                                        <option value="Garasi">Garasi</option>
                                        <option value="Agen Negara">Agen Negara</option>
                                        <option value="Gilimanuk">Gilimanuk</option>
                                    </select>

                                    @error('ket_tempat_berangkat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            @endif
                        @endforeach
                        <div class="form-group row">
                            <label for="no_telp" class="col-md-4 col-form-label text-md-right">Nomor Telepon</label>

                            <div class="col-md-6">
                                <input id="no_telp" type="text" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp[]">

                                @error('no_telp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_kursi" class="col-md-4 col-form-label text-md-right">Nomor Kursi</label>
                            <div class="col-md-6">
                                <input id="no_kursi" type="text" class="form-control @error('no_kursi') is-invalid @enderror" name="no_kursi[]" value="{{ $kur[$x-1] }}" readonly>

                                @error('no_ktp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    @endfor
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                            <a href={{ url()->previous() }} class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

