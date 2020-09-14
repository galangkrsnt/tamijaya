<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bus;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bus = Bus::orderBy('no_bus', 'DESC')->paginate(10);
        return view('admin.bus.index', compact('bus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bus.create');
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
            'no_bus'=>'required',
            'tipe'=>'required',
            'plat_nomor'=> 'required',
            'harga_tiket' => 'required',
            'jumlah_kursi' => 'required'
        ]);

        $bus = new Bus([
            'no_bus'=> $request->get('no_bus'),
            'tipe'=> $request->get('tipe'),
            'plat_nomor' => $request->get('plat_nomor'),
            'harga_tiket'=> $request->get('harga_tiket'),
            'jumlah_kursi'=> $request->get('jumlah_kursi')
        ]);

        $bus->save();

        return redirect()->route('bus.index')
                        ->with('Berhasil','Jadwal berhasil ditambahkan');
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
    public function edit(Bus $bu)
    {
        return view('admin.bus.edit',compact('bu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Bus $bu)
    {
        $request->validate([
            'no_bus' => 'required',
            'plat_nomor' => 'required',
            'tipe' => 'required',
            'harga_tiket' => 'required',
            'jumlah_kursi' => 'required'
        ]);


        $bu->update($request->all());

        return redirect()->route('bus.index')
            ->with('Berhasil', 'Bus berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bus = Bus::find($id);
        $bus->delete();
        return redirect()->route('bus.index')
                    ->with('Berhasil','Jadwal berhasil dihapus');
    }
}
