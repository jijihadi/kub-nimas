<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Http\Requests\StoreAnggotaRequest;
use App\Http\Requests\UpdateAnggotaRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Kub;
use Session;
use DB;


class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['primary'] = Kub::all();
        $q = Anggota::select('*');

        $idkub = getidkub(Auth::user()->id);
        if ($idkub !=0) { $q->where('id_kub', $idkub); }
        $data['main'] = $q->get();
        return view('anggota/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('anggota/form-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAnggotaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnggotaRequest $request)
    {
        //validate post data
        $this->validate($request, [
            'name' => 'required',
            'alamat' => 'required',
            'jabatan' => 'required',
            'pendidikan' => 'required',
            'usia' => 'required',
            'usaha_utama' => 'required',
            'jumlah_perahu' => 'required',
            'jenis_alat' => 'required',
            'keterangan' => 'required',
        ]);
        //get post data
        $postData = $request->all();
        $postData['id_kub'] = getidkub(Auth::user()->id);
        try {
            DB::beginTransaction();
            DB::enableQueryLog();

            //insert post data
            Anggota::create($postData);
            DB::commit();

            //store status message
            Session::flash('success', 'Data berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            Session::flash('error', $e->getMessage());

            dd( $e->getMessage() );
        }
        return redirect('list-anggota');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function show(Anggota $anggota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function edit(Anggota $anggota, $id)
    {
        $data['main'] = Anggota::find($id)->toArray();
        return view('anggota/form-edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAnggotaRequest  $request
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnggotaRequest $request, Anggota $anggota, $id)
    {
        //validate post data
        $this->validate($request, [
            'name' => 'required',
            'alamat' => 'required',
            'jabatan' => 'required',
            'pendidikan' => 'required',
            'usia' => 'required',
            'usaha_utama' => 'required',
            'jumlah_perahu' => 'required',
            'jenis_alat' => 'required',
            'keterangan' => 'required',
        ]);
        //get post data
        $postData = $request->all();
        try {
            DB::beginTransaction();
            DB::enableQueryLog();

            //insert post data
            Anggota::find($id)->update($postData);
            DB::commit();

            //store status message
            Session::flash('success', 'Data berhasil diubah!');
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            Session::flash('error', $e->getMessage());

            dd( $e->getMessage() );
        }
        return redirect('list-anggota-edit/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anggota $anggota, $id)
    {
        try {
            DB::beginTransaction();
            DB::enableQueryLog();

            //insert post data
            Anggota::find($id)->delete();
            DB::commit();

            //store status message
            Session::flash('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            Session::flash('error', $e->getMessage());

            dd( $e->getMessage() );
        }
        return redirect('list-anggota');
    }
}
