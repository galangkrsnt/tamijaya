<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Pembayaran;
use App\Pesanan;

class PembayaranController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $pesanan = Pesanan::where('id',$id)->get();
        $pembayaran = Pembayaran::where('id_pesan',$id)->get();
        return view('customer.pembayaran.create',compact('pesanan','pembayaran'));
        ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        if ($request->hasFile('image')) {
            //  Let's do everything here
            if ($request->file('image')->isValid()) {
                //
                $validated = $request->validate([
                    'image' => 'mimes:jpeg,png|max:1024',
                ]);
                $extension = $request->image->extension();
                $request->image->storeAs('/public/pembayaran', $id.".".$extension);
                $imgname = $id.".".$extension;
                $file = Pembayaran::where('id_pesan',$id)->first();
                $file->path = $imgname;
                $file->save();

                $status = Pesanan::find($id);
                $status->status = 'menunggu konfirmasi';
                $status->save();

                return redirect()->route('customer.tiketku')
                ->with('Berhasil', 'Bukti Pembayaran Berhasil di Upload');;
            }
        }
        abort(500, 'Could not upload image :(');
    }


    public function konfirmasi($id)
    {
                $file = Pesanan::where('id',$id)->first();
                $file->status = 'sudah bayar';
                $file->save();
                return redirect()->route('pesanan.index')
                ->with('Berhasil', 'Bukti Pembayaran Berhasil di Upload');;

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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
