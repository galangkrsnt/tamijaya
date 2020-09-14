@extends('layouts.pesan')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header" style="text-align: center">Pilih Kursi</div>

                <div class="card-body">
                    @foreach ($jadwal as $j)
                    <form method="get" action="{{ route('penumpang.create',$j->id)}}">
                        @csrf

                    <div class="checkbox">
                        <table class="table table-borderless col-md-4" >
                        @php
                        $a = 0;
                     @endphp
                        @if($j->buses->tipe == "Executive Class")
                        @for ( $x=1; $x <= $j->buses->jumlah_kursi; $x++)
                        @if ($x%2!=0)
                        @if (in_array($x,$kursiTerisi))
                        <td><label><input  id="kursi" type="checkbox"  name="kursiBooked[]" value="{{ $x }}" checked onclick="return false">{{ $x }}</label></td>
                        @else
                        <td><label><input  id="kursi" type="checkbox" name="kursi[]" value="{{ $x }}">{{ $x }}</label></td>
                        @endif
                        @else
                        <td><label><input  id="kursi" type="checkbox"  name="kursiDisabled[]" value="{{ $x }}" checked disabled>{{ $x }}</label></td>
                        @endif
                        @if ($x%4==0)
                            <tr></tr>
                        @elseif($x%2==0)
                            <td>   </td>
                            <td>   </td>
                            <td>   </td>
                        @endif
                        @endfor


                        @elseif($j->buses->tipe == "Suite Class")
                        <td></td>
                        <td>BAWAH</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>ATAS</td>
                        <td></td>
                        <tr></tr>
                        @for ( $x=1; $x <= $j->buses->jumlah_kursi; $x++)
                        @if ($x == 1 || $x%4 == 0)
                        @php
                           $a++;
                        @endphp
                        @if (in_array($a."D",$kursiTerisi))
                        <td><label><input id="kursi" type="checkbox" name="kursiBooked[]" checked value="{{ $a }}D" onclick="return false">{{ $a }}D</label></td>
                        @else
                        <td><label><input id="kursi" type="checkbox" name="kursi[]" value="{{ $a }}D">{{ $a }}D</label></td>
                        @endif
                        <td>   </td>
                        @if (in_array($a."B",$kursiTerisi))
                        <td><label><input id="kursi" type="checkbox" name="kursiBooked[]" checked value="{{ $a }}B" onclick="return false">{{ $a }}B</label></td>
                        @else
                        <td><label><input id="kursi" type="checkbox" name="kursi[]" value="{{ $a }}B">{{ $a }}B</label></td>
                        @endif
                        <td>   </td>
                        <td>   </td>
                        @if (in_array($a."C",$kursiTerisi))
                        <td><label><input id="kursi" type="checkbox" name="kursiBooked[]" checked value="{{ $a }}C" onclick="return false">{{ $a }}C</label></td>
                        @else
                        <td><label><input id="kursi" type="checkbox" name="kursi[]" value="{{ $a }}C">{{ $a }}C</label></td>
                        @endif
                        <td>   </td>
                        @if (in_array($a."A",$kursiTerisi))
                        <td><label><input id="kursi" type="checkbox" name="kursiBooked[]" checked value="{{ $a }}A" onclick="return false">{{ $a }}A</label></td>
                        @else
                        <td><label><input id="kursi" type="checkbox" name="kursi[]" value="{{ $a }}A">{{ $a }}A</label></td>
                        @endif
                        @endif
                        <tr></tr>
                        @if ($x%4==0)
                        <tr></tr>
                        @elseif($x%2==0)
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>

                        @endif
                        @endfor
                        @endif




                    </table>
                    <h4>Keterangan : </h4>
                    <div style="padding-bottom: 30px">
                    <input id="" type="checkbox" name="" value="{{ $x }}" checked onclick="return false"><span> Terisi</span>
                    </div>
                    <div style="padding-bottom: 30px">
                    <input id="" type="checkbox" name="" value="{{ $x }}" onclick="return false"><span> Tersedia</span>
                    </div>
                    @if($j->buses->tipe == "Executive Class")
                    <div style="padding-bottom: 30px">
                        <input id="" type="checkbox" name="" value="{{ $x }}" checked disabled><span> Dikosongkan selama pandemi covid-19</span>
                    </div>
                    @endif

                </div>
                        <button type="submit" class="btn btn-primary">
                            Lanjutkan
                        </button>

                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
