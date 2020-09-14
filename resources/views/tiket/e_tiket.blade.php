<!DOCTYPE html>
<html>
    <head>
        <title>E-Ticket TAMI JAYA</title>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container" style="margin-bottom: 100px"></div>
        <div class="container" style="padding-left: 150px">
            <h1 class="font-weight-light" style="margin-bottom: 100px">e-Ticket TAMI JAYA</h1>
            <table>
                        @foreach ($pesanan as $pesan )
                            <tr><td>Id Tiket : <code>{{ $pesan->id }}</code></td></tr>
                            <tr><td>Jumlah Penumpang : {{ $pesan->jumlah_penumpang}}</td></tr>
                            <tr><td>No Kursi : @foreach ($pesan->penumpang as $p)
                                {{ $p->no_kursi }}
                            @endforeach</td></tr>
                            <tr><td>Total Pembayaran : Rp. {{ number_format($pesan->total_bayar) }},-</td></tr>
                            <tr><td>Status : {{ ($pesan->status) }}</td></tr>
                @endforeach
            </table>
        </div>
    </body>
</html>
