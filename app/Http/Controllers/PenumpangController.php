<?php

namespace App\Http\Controllers;

use App\Penumpang;
use App\Pesanan;
use App\Jadwal;
use App\Pembayaran;
use Illuminate\Http\Request;

class PenumpangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $penumpang = Penumpang::all();
        return view('admin.penumpang.index', compact('penumpang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
        $jadwal = Jadwal::where('id',$id)->get();
        $request->validate(['kursi'=>'required']);
        $kur = $request->kursi;
        $kursi = count($request->kursi);
        return view('admin.penumpang.create',compact('kursi','jadwal','kur'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $harga = Jadwal::where('id',$id)->get();
        $no_kursi = $request['no_kursi'];
        $jumlah_penumpang = count($no_kursi);
        foreach ($harga as $h) {
            $total_bayar = $h->buses->harga_tiket*$jumlah_penumpang;
        }
        if (auth()->user()->role == 'admin') {
            $pesanan = new Pesanan([
                'id_user' => auth()->user()->id,
                'id_jadwal' => $id,
                'status' => 'input admin',
                'jumlah_penumpang' => $jumlah_penumpang,
                'total_bayar' => $total_bayar
            ]);

            $pesanan->save();
        }else{
            $pesanan = new Pesanan([
                'id_user' => auth()->user()->id,
                'id_jadwal' => $id,
                'jumlah_penumpang' => $jumlah_penumpang,
                'total_bayar' => $total_bayar
            ]);

        $pesanan->save();
            }


        $id_pesan = Pesanan::orderBy('created_at','ASC')->get();
        foreach ($id_pesan as $p) {
            $id_p = $p->id;
        }
            $names = $request['nama'];
            $no_ktp = $request['no_ktp'];
            $ket_tempat_berangkat = $request['ket_tempat_berangkat'];
            $no_telp = $request['no_telp'];
            for ($i=0; $i < $jumlah_penumpang ; $i++) {
            $penumpang = new Penumpang([
                'id_pesan' => $id_p,
                'nama' => $names[$i],
                'no_ktp' => $no_ktp[$i],
                'no_kursi' => $no_kursi[$i],
                'no_telp' => $no_telp[$i],
                'ket_tempat_berangkat' => $ket_tempat_berangkat[$i]
            ]);
            $penumpang->save();
        }

        $pesanan = Pesanan::where('id',$id_p)->get();


            // Buat transaksi ke midtrans kemudian save snap tokennya.
            foreach($pesanan as $p){
                $id_p = $p->id;
                $total_bayar = $p->total_bayar;
            }
        if (auth()->user()->role == 'admin') {
            $pembayaran = new Pembayaran([
                'id_pesan' => $id_p,
            ]);
            $pembayaran->save();
            return redirect()->route('pesanan.index')
        ->with('Berhasil', 'Pesanan berhasil ditambahkan');
        }else{
            $pembayaran = new Pembayaran([
                'id_pesan' => $id_p,
            ]);
            $pembayaran->save();
            $idUser = auth()->user()->id;
            $pesanan = Pesanan::where('id_user',$idUser)
            ->orderBy('created_at','DESC')->first();
            return redirect()->route('pembayaran.create',$pesanan)
        ->with('Berhasil', 'Pesanan berhasil ditambahkan');
        }

    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Penumpang $penumpang)
    {
        return view('admin.penumpang.edit',compact('penumpang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penumpang $penumpang)
    {
        $request->validate([
            'nama' => 'required',
            'no_ktp' => 'required',
            'ket_tempat_berangkat' => 'required',
            'no_telp' => 'required'
        ]);


        $penumpang->update($request->all());

        return redirect()->route('penumpang.index')
            ->with('Berhasil', 'Penumpang berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penumpang = Penumpang::find($id);
        $penumpang->delete();
        return redirect()->route('penumpang.index')
            ->with('Berhasil', 'Jadwal berhasil dihapus');
    }
}
