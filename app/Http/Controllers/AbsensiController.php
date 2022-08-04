<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Http\Requests\StoreAbsensiRequest;
use App\Http\Requests\UpdateAbsensiRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;
use DB;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data['main'] = Absensi::all();
        $data['main'] = Absensi::select('kegiatan',DB::raw('GROUP_CONCAT(id) as ids'), DB::raw('GROUP_CONCAT(tanggal) as tanggal'), DB::raw('GROUP_CONCAT(peserta) as peserta'), DB::raw('GROUP_CONCAT(jabatan) as jabatan'), DB::raw('GROUP_CONCAT(alamat) as alamat'))->groupBy('kegiatan')->orderby('tanggal', 'desc')->get();
        return view('absensi/index', $data);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['kegiatan'] = Absensi::all()->toArray();
        return view('absensi/form-add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAbsensiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAbsensiRequest $request)
    {
        //validate post data
        $this->validate($request, [
            'kegiatan' => 'required',
            'peserta' => 'required',
            'jabatan' => 'required',
            'alamat' => 'required',
            'tanggal' => 'required',
        ]);
        //get post data
        $postData = $request->all();
        try {
            DB::beginTransaction();
            DB::enableQueryLog();

            //insert post data
            Absensi::create($postData);
            DB::commit();

            //store status message
            Session::flash('success', 'Data berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            Session::flash('error', $e->getMessage());

            dd($e->getMessage());
        }
        return redirect('daftar-hadir');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function show(Absensi $absensi)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function edit(Absensi $absensi, $id)
    {
        $data['main'] = Absensi::find($id)->toArray();
        return view('absensi/form-edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAbsensiRequest  $request
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAbsensiRequest $request, Absensi $absensi, $id)
    {
        //validate post data
        $this->validate($request, [
            'kegiatan' => 'required',
            'peserta' => 'required',
            'jabatan' => 'required',
            'alamat' => 'required',
            'tanggal' => 'required',
        ]);
        //get post data
        $postData = $request->all();
        try {
            DB::beginTransaction();
            DB::enableQueryLog();

            //insert post data
            Absensi::find($id)->update($postData);
            DB::commit();

            //store status message
            Session::flash('success', 'Data berhasil diubah!');
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            Session::flash('error', $e->getMessage());

            dd($e->getMessage());
        }
        return redirect('daftar-hadir-edit/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absensi $absensi, $id)
    {
        try {
            DB::beginTransaction();
            DB::enableQueryLog();

            //insert post data
            Absensi::find($id)->delete();
            DB::commit();

            //store status message
            Session::flash('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            Session::flash('error', $e->getMessage());

            dd($e->getMessage());
        }
        return redirect('daftar-hadir');
    }
}
