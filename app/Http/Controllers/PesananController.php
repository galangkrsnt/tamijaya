<?php

namespace App\Http\Controllers;

use App\Jadwal;
use App\Pesanan;
use App\Penumpang;
use App\Pembayaran;
use PDF;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $pesanan = Pesanan::orderBy('created_at','DESC')->get();
        return view('admin.pesanan.index', compact('pesanan'));
    }

    public function pilihKursi($id)
    {
        $jadwal = Jadwal::where('id', $id)->get();
        $pesanan = Pesanan::where('id_jadwal',$id)->get();
        if($pesanan->isNotEmpty()){
            foreach ($pesanan as $p ){
                $kursi[] = Penumpang::select('no_kursi')->where('id_pesan',$p->id)->get();

            foreach ($kursi as $k){
                foreach($k as $kur){
                    $kursiTerisi[]=$kur->no_kursi;
                }
            }
        }
            return view('admin.pesanan.kursi', compact('jadwal','kursiTerisi'));
        }else{
            $kursiTerisi = [];
        return view('admin.pesanan.kursi', compact('jadwal','kursiTerisi'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pesanan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Pesanan $pesanan)
    {
        return view('admin.pesanan.edit', compact('pesanan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pesanan $pesanan)
    {
        $request->validate([
            'jumlah_penumpang' => 'required',
            'total_bayar' => 'required'
        ]);


        $pesanan->update($request->all());

        return redirect()->route('pesanan.index')
            ->with('Berhasil', 'Pesanan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pesanan = Pesanan::find($id);
        $pesanan->delete();
        $penumpang = Penumpang::where('id_pesan', $id);
        $penumpang->delete();
        if (auth()->user()->role == 'admin') {
            return redirect()->route('pesanan.index')
                ->with('Berhasil', 'Jadwal berhasil dihapus');
        } else {
            return redirect()->route('customer.tiketku')
                ->with('Berhasil', 'PEsanan berhasil dibatalakan');
        }
    }


    public function detail($id)
    {
        $penumpang = Penumpang::where('id_pesan', $id)->get();
        $pembayaran = Pembayaran::where('id_pesan', $id)->get();
        $pesanan = Pesanan::where('id', $id)->get();
        return view('admin.pesanan.detail', compact('pembayaran','penumpang','pesanan'));
    }

    public function tiketku()
    {
        $id = auth()->user()->id;
        $pesanan = Pesanan::where('id_user', $id)->orderby('created_at','DESC')->get();
        return view('customer.tiketku', compact('pesanan'));
    }


     public function tiketpdf($id){
        $pesanan = Pesanan::where('id',$id)->get();
        $pdf = PDF::loadview('tiket.e_tiket',['pesanan'=>$pesanan]);
        return $pdf->stream();
     }
     public function tes($id){
        $pesanan = Pesanan::where('id',$id)->get();
        return view('tiket.e_tiket', compact('pesanan'));
     }

     public function sorting(Request $request){
        $idp = $request->get('idpesan');
        $pesanan = Pesanan::where('id',$idp)->get();
        return view('admin.pesanan.index', compact('pesanan'));
    }
}
