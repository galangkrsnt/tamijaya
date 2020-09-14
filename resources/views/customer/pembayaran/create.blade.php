@extends('layouts.pesan')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style=" margin-left: auto; margin-right: auto;">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <h2 style="padding-left: 180px">TAMI JAYA</h2>
                        <h3>Rincian Pesanan</h3>
                        @foreach ($pesanan as $pesan )
                            <tr>Id Tiket : <code>{{ $pesan->id }}</code></tr>
                        <br>
                            <tr>Jumlah Penumpang : {{ $pesan->jumlah_penumpang}}</tr>
                        <br>
                            <tr>No Kursi : @foreach ($pesan->penumpang as $p)
                                {{ $p->no_kursi }}
                            @endforeach</tr>
                        <br>
                            <tr>Total Pembayaran : Rp. {{ number_format($pesan->total_bayar) }},-</tr>
                        <br>
                            <tr>Status : {{ ($pesan->status) }}</tr>
                        <br>
                    <br>
                <br>
                @endforeach
            </table>
            @if ($pesan->status == 'menunggu pembayaran')
            <p>Silahkan Upload Bukti Pembayaran !!!</p>
            <p>Batas waktu upload bukti pembayaran adalah 6 jam setelah melakukan pemesanan</p>
            <p style="color: red">*pesanan akan otomatis terhapus jika customer tidak meng-upload bukti pembayaran sampai melewati batas waktu upload</p>
                                <form method="post" action="{{ route('pembayaran.store',$pesan->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <input id="image" type="file" name="image">
                                    </div>
                                    <div class="form-group row">

                                        <button type="submit" class="btn btn-primary">Upload</button>
                                        @endif
                                    </div>
                                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
