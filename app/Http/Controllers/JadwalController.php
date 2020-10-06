<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Jadwal;
use App\Bus;
use App\Penumpang;
use App\Pesanan;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal = Jadwal::orderBy('tgl_keberangkatan','DESC')->get();
        return view('admin.jadwal.index', compact('jadwal'));
    }

    public function cari(Request $request)
    {
        return view('tiket.cari');
    }

    public function hasilCari(Request $request)
    {
        $cari = $request->validate([
            'tgl_keberangkatan' => 'required',
            'tempat_berangkat' => 'required',
            'tujuan' => 'required',

        ]);
        $tgl = $request->get('tgl_keberangkatan');
        $berangkat = $request->get('tempat_berangkat');
        $tujuan = $request->get('tujuan');
        $jml = $request->get('jml_penumpang');



        $jadwal = Jadwal::where('tgl_keberangkatan', $tgl)
            ->where('tempat_berangkat', $berangkat)
            ->where('tujuan', $tujuan)
            ->get();

        foreach ($jadwal as $j) {
            $kursiBus = $j->buses->jumlah_kursi;
            $id_jadwal = $j->id;
            $pesanan[] = DB::table('pesanan')
                ->where('id_jadwal', $id_jadwal)
                ->sum('jumlah_penumpang');
        }



        return view('tiket.hasilCari', compact('jadwal','pesanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bus = Bus::get();
        return view('admin.jadwal.create', compact('bus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tgl_keberangkatan' => 'required',
            'no_bus' => 'required',
            'tempat_berangkat' => 'required',
            'tujuan' => 'required'
        ]);

        $jadwal = new Jadwal([
            'tgl_keberangkatan' => $request->get('tgl_keberangkatan'),
            'no_bus' => $request->get('no_bus'),
            'tempat_berangkat' => $request->get('tempat_berangkat'),
            'tujuan' => $request->get('tujuan')
        ]);

        $jadwal->save();

        return redirect()->route('jadwal.index')
            ->with('Berhasil', 'Jadwal berhasil ditambahkan');
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
    public function edit(Jadwal $jadwal)
    {
        return view('admin.jadwal.edit', compact('jadwal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        $request->validate([
            'tgl_keberangkatan' => 'required',
            'no_bus' => 'required',
            'tempat_berangkat' => 'required',
            'tujuan' => 'required'
        ]);


        $jadwal->update($request->all());

        return redirect()->route('jadwal.index')
            ->with('Berhasil', 'Jadwal berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jadwal = Jadwal::find($id);
        $jadwal->delete();
        $pesanan  = Pesanan::where('id_jadwal',$id)->first();
        $pesanan->delete();
        return redirect()->route('jadwal.index')
            ->with('Berhasil', 'Jadwal berhasil dihapus');
    }

    public function detail($id)
    {
        $pesanan = Pesanan::where('id_jadwal',$id)->get();
        foreach($pesanan as $p){
            $penumpang[] = Penumpang::where('id_pesan',$p->id)->get();
        }
        return view('admin.jadwal.detail', compact('penumpang'));
    }

    public function sorting(Request $request){
        $tgl = $request->get('tgl_keberangkatan');
        $jadwal = Jadwal::where('tgl_keberangkatan',$tgl)->orderBy('tgl_keberangkatan','DESC')->get();
        return view('admin.jadwal.index', compact('jadwal'));
    }
}
