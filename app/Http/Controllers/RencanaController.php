<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateRencanaRequest;
use App\Http\Requests\StoreRencanaRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Rencana;
use Session;
use DB;

class RencanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $q = Rencana::select('*');
        // cek apakah ketua kub
        $idkub = getidkub(Auth::user()->id);
        if ($idkub !=0) { $q->where('id_kub', $idkub); }
        // run query
        $data['main'] = $q->get();
        return view('rencana/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rencana/form-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRencanaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRencanaRequest $request)
    {
        //validate post data
        $this->validate($request, [
            'name' => 'required',
            'volume' => 'required',
            'waktu' => 'required',
            'tempat' => 'required',
            'keterangan' => 'required',
        ]);
        //get post data
        $postData = $request->all();
        $postData['id_kub'] = getidkub(Auth::user()->id);
        try {
            DB::beginTransaction();
            DB::enableQueryLog();

            //insert post data
            Rencana::create($postData);
            DB::commit();

            //store status message
            Session::flash('success', 'Data berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            Session::flash('error', $e->getMessage());

            //dd($e->getMessage());
        }
        return redirect('rencana-kegiatan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rencana  $rencana
     * @return \Illuminate\Http\Response
     */
    public function show(Rencana $rencana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rencana  $rencana
     * @return \Illuminate\Http\Response
     */
    public function edit(Rencana $rencana, $id)
    {
        $data['main'] = Rencana::find($id)->toArray();
        return view('rencana/form-edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRencanaRequest  $request
     * @param  \App\Models\Rencana  $rencana
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRencanaRequest $request, Rencana $rencana, $id)
    {
        //validate post data
        $this->validate($request, [
            'name' => 'required',
            'volume' => 'required',
            'waktu' => 'required',
            'tempat' => 'required',
            'keterangan' => 'required',
        ]);
        //get post data
        $postData = $request->all();
        try {
            DB::beginTransaction();
            DB::enableQueryLog();

            //insert post data
            Rencana::find($id)->update($postData);
            DB::commit();

            //store status message
            Session::flash('success', 'Data berhasil diubah!');
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            Session::flash('error', $e->getMessage());

            //dd($e->getMessage());
        }
        return redirect('rencana-kegiatan-edit/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rencana  $rencana
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rencana $rencana, $id)
    {
        try {
            DB::beginTransaction();
            DB::enableQueryLog();

            //insert post data
            Rencana::find($id)->delete();
            DB::commit();

            //store status message
            Session::flash('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            Session::flash('error', $e->getMessage());

            //dd($e->getMessage());
        }
        return redirect('rencana-kegiatan');
    }
}
