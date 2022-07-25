<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use App\Http\Requests\StoreTamuRequest;
use App\Http\Requests\UpdateTamuRequest;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Http\Request;
use Session;

class TamuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['main'] = Tamu::all();
        return view('tamu/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tamu/form-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTamuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTamuRequest $request)
    {
        //validate post data
        $this->validate($request, [
            'nama' => 'required',
            'jabatan' => 'required',
            'telp' => 'required',
            'tanggal_datang' => 'required',
            'tanggal_pulang' => 'required',
            'keperluan' => 'required',
            'kesan' => 'required',
            'pesan' => 'required',
        ]);
        //get post data
        $postData = $request->all();
        try {
            DB::beginTransaction();
            DB::enableQueryLog();

            //insert post data
            Tamu::create($postData);
            DB::commit();

            //store status message
            Session::flash('success', 'Data berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            Session::flash('error', $e->getMessage());

            dd( $e->getMessage() );
        }
        return redirect('buku-tamu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tamu  $tamu
     * @return \Illuminate\Http\Response
     */
    public function show(Tamu $tamu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tamu  $tamu
     * @return \Illuminate\Http\Response
     */
    public function edit(Tamu $tamu, $id)
    {
        $data['main'] = Tamu::find($id)->toArray();
        return view('tamu/form-edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTamuRequest  $request
     * @param  \App\Models\Tamu  $tamu
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTamuRequest $request, Tamu $tamu, $id)
    {
        //validate post data
        $this->validate($request, [
            'nama' => 'required',
            'jabatan' => 'required',
            'telp' => 'required',
            'tanggal_datang' => 'required',
            'tanggal_pulang' => 'required',
            'keperluan' => 'required',
            'kesan' => 'required',
            'pesan' => 'required',
        ]);
        //get post data
        $postData = $request->all();
        try {
            DB::beginTransaction();
            DB::enableQueryLog();

            //insert post data
            Tamu::find($id)->update($postData);
            DB::commit();

            //store status message
            Session::flash('success', 'Data berhasil diubah!');
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            Session::flash('error', $e->getMessage());

            dd( $e->getMessage() );
        }
        return redirect('buku-tamu-edit/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tamu  $tamu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tamu $tamu, $id)
    {
        try {
            DB::beginTransaction();
            DB::enableQueryLog();

            //insert post data
            Tamu::find($id)->delete();
            DB::commit();

            //store status message
            Session::flash('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            Session::flash('error', $e->getMessage());

            dd( $e->getMessage() );
        }
        return redirect('buku-tamu');
    }
}
