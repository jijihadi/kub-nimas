<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateAbsensiRequest;
use App\Http\Requests\StoreAbsensiRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Kub;
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
        $data['primary'] = Kub::all();
        // $data['main'] = Absensi::all();
        // return view('absensi/index-basic', $data);
        $q = Absensi::select(
            'kegiatan',
            DB::raw('GROUP_CONCAT(id) as ids'),
            DB::raw('GROUP_CONCAT(tanggal) as tanggal'),
            DB::raw('GROUP_CONCAT(peserta) as peserta'),
            DB::raw('GROUP_CONCAT(jabatan) as jabatan'),
            DB::raw('GROUP_CONCAT(alamat) as alamat'),
            DB::raw('GROUP_CONCAT(id_kub) as id_kub'))
            ->groupBy('kegiatan')
            ->orderby('tanggal', 'desc');
            // add if petugas kub
        $idkub = getidkub(Auth::user()->id);
        if ($idkub !=0) { $q->where('id_kub', $idkub); }
        $data['main'] = $q->get();
        return view('absensi/index', $data);

    }

    public function getajax($id){
        // DB::enableQueryLog(); // to enable query log
        $id = str_replace('_', ' ', $id);
        $q = Absensi::select('*')
            ->where('kegiatan',$id)
            ->where('tanggal',date('Y-m-d'));
        $data = $q->get();
        // $query = DB::getQueryLog(); // get query logs from cache
        // dd($query);
        echo json_encode($data);
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
        // dd($request->all());
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
        $postData['id_kub'] = getidkub(Auth::user()->id);
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

            //dd($e->getMessage());
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

            //dd($e->getMessage());
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

            //dd($e->getMessage());
        }
        return redirect('daftar-hadir');
    }
}
