@extends('layouts.customer')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="text-align: center">Pesanan</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

            <table class="table">
                <thead bgcolor = #50b75e>
                  <tr>
                    <th scope="col">Tanggal Keberangkatan</th>
                    <th scope="col">Jumlah Penumpang</th>
                    <th scope="col">Tujuan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Total Bayar</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($pesanan as $pesan)
                    <tr>

                        <td>{{ $pesan->jadwal->tgl_keberangkatan }}</td>
                        <td>{{ $pesan->jumlah_penumpang }}</td>
                        <td>{{ $pesan->jadwal->tempat_berangkat }} -> {{ $pesan->jadwal->tujuan }}</td>
                        <td>{{ $pesan->status }}</td>
                        <td>@currency($pesan->total_bayar)</td>


                        <td><form action="{{ route('pesanan.destroy', $pesan->id)}}" method="post">
                            @csrf @method('DELETE')
                            @if ($pesan->status == 'menunggu pembayaran')
                            <a href="{{ route('pembayaran.create', $pesan->id)}}" type="submit" class="btn btn-sm btn-success" >Checkout</a>
                            @elseif($pesan->status == 'sudah bayar')
                            <a href="{{ route('customer.tiketpdf', $pesan->id)}}" type="submit" class="btn btn-sm btn-success" >e-ticket</a>
                            @endif
                            @if ($pesan->status == 'menunggu pembayaran')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin ingin membatalkan pesanan ? ');">Batalkan</button>
                            @endif
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

<script>
    window.open("http://www.laravel.com", "_blank", "toolbar=yes, scrollbars=yes, resizable=yes, top=500,left=500,width=400, height=400");
</script>
