<?php

namespace App\Http\Controllers;

use App\Models\Produksi;
use App\Models\Anggota;
use App\Http\Requests\StoreProduksiRequest;
use App\Http\Requests\UpdateProduksiRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;
use DB;

class ProduksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $q = Produksi::select('*');
        // cek apakah ketua kub
        $idkub = getidkub(Auth::user()->id);
        if ($idkub !=0) { $q->where('id_kub', $idkub); }
        // run query
        $data['main'] = $q->get();
        return view('produksi/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['anggota'] = Anggota::all()->toArray();
        return view('produksi/form-add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProduksiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduksiRequest $request)
    {
        //validate post data
        $this->validate($request, [
            'tanggal' => 'required',
            'nama_anggota' => 'required',
            'jumlah' => 'required',
            'nilai' => 'required',
            'keterangan' => 'required',
        ]);
        //get post data
        $postData = $request->all();
        $postData['id_kub'] = getidkub(Auth::user()->id);
        $postData['nilai'] = bilanganbulat($postData['nilai']);
        try {
            DB::beginTransaction();
            DB::enableQueryLog();

            //insert post data
            Produksi::create($postData);
            DB::commit();

            //store status message
            Session::flash('success', 'Data berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            Session::flash('error', $e->getMessage());

            dd( $e->getMessage() );
        }
        return redirect('hasil-produksi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produksi  $produksi
     * @return \Illuminate\Http\Response
     */
    public function show(Produksi $produksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produksi  $produksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Produksi $produksi, $id)
    {
        $data['main'] = Produksi::find($id)->toArray();
        $data['anggota'] = Anggota::all()->toArray();
        return view('produksi/form-edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProduksiRequest  $request
     * @param  \App\Models\Produksi  $produksi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProduksiRequest $request, Produksi $produksi, $id)
    {
        //validate post data
        $this->validate($request, [
            'tanggal' => 'required',
            'nama_anggota' => 'required',
            'jumlah' => 'required',
            'nilai' => 'required',
            'keterangan' => 'required',
        ]);
        //get post data
        $postData = $request->all();
        $postData['nilai'] = bilanganbulat($postData['nilai']);
        try {
            DB::beginTransaction();
            DB::enableQueryLog();

            //insert post data
            Produksi::find($id)->update($postData);
            DB::commit();

            //store status message
            Session::flash('success', 'Data berhasil diubah!');
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            Session::flash('error', $e->getMessage());

            dd( $e->getMessage() );
        }
        return redirect('hasil-produksi-edit/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produksi  $produksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produksi $produksi, $id)
    {
        try {
            DB::beginTransaction();
            DB::enableQueryLog();

            //insert post data
            Produksi::find($id)->delete();
            DB::commit();

            //store status message
            Session::flash('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            Session::flash('error', $e->getMessage());

            dd( $e->getMessage() );
        }
        return redirect('hasil-produksi');
    }
}
