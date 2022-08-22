<?php

namespace App\Http\Controllers;

use App\Models\Usaha;
use App\Http\Requests\StoreUsahaRequest;
use App\Http\Requests\UpdateUsahaRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;
use DB;

class UsahaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['main'] = Usaha::all();
        return view('kegiatan/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kegiatan/form-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUsahaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsahaRequest $request)
    {
        //validate post data
        $this->validate($request, [
            'tanggal' => 'required',
            'uraian' => 'required',
            'volume' => 'required',
            'pelaksana' => 'required',
            'tempat' => 'required',
            'hasil' => 'required',
            'keterangan' => 'required',
        ]);
        //get post data
        $postData = $request->all();
        try {
            DB::beginTransaction();
            DB::enableQueryLog();

            //insert post data
            Usaha::create($postData);
            DB::commit();

            //store status message
            Session::flash('success', 'Data berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            Session::flash('error', $e->getMessage());

            //dd($e->getMessage());
        }
        return redirect('usaha');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usaha  $usaha
     * @return \Illuminate\Http\Response
     */
    public function show(Usaha $usaha)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usaha  $usaha
     * @return \Illuminate\Http\Response
     */
    public function edit(Usaha $usaha, $id)
    {
        $data['main'] = Usaha::find($id)->toArray();
        return view('kegiatan/form-edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUsahaRequest  $request
     * @param  \App\Models\Usaha  $usaha
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsahaRequest $request, Usaha $usaha, $id)
    {
        //validate post data
        $this->validate($request, [
            'tanggal' => 'required',
            'uraian' => 'required',
            'volume' => 'required',
            'pelaksana' => 'required',
            'tempat' => 'required',
            'hasil' => 'required',
            'keterangan' => 'required',
        ]);
        //get post data
        $postData = $request->all();
        try {
            DB::beginTransaction();
            DB::enableQueryLog();

            //insert post data
            Usaha::find($id)->update($postData);
            DB::commit();

            //store status message
            Session::flash('success', 'Data berhasil diubah!');
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            Session::flash('error', $e->getMessage());

            //dd($e->getMessage());
        }
        return redirect('usaha-edit/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usaha  $usaha
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usaha $usaha, $id)
    {
        try {
            DB::beginTransaction();
            DB::enableQueryLog();

            //insert post data
            Usaha::find($id)->delete();
            DB::commit();

            //store status message
            Session::flash('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            Session::flash('error', $e->getMessage());

            //dd($e->getMessage());
        }
        return redirect('usaha');
    }
}
