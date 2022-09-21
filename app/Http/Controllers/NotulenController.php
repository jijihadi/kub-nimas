<?php

namespace App\Http\Controllers;

use App\Models\Notulen;
use App\Http\Requests\StoreNotulenRequest;
use App\Http\Requests\UpdateNotulenRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Kub;
use Session;
use DB;

class NotulenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['primary'] = Kub::all();
        $q = Notulen::select('*');
        // cek apakah ketua kub
        $idkub = getidkub(Auth::user()->id);
        if ($idkub !=0) { $q->where('id_kub', $idkub); }
        // run query
        $data['main'] = $q->get();

        return view('notulen/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notulen/form-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNotulenRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNotulenRequest $request)
    {
        //validate post data
        $this->validate($request, [
            'kegiatan' => 'required',
            'tanggal' => 'required',
            'pembicara' => 'required',
            'jabatan' => 'required',
            'materi' => 'required',
            'kesimpulan' => 'required',
        ]);
        //get post data
        $postData = $request->all();
        $postData['id_kub'] = getidkub(Auth::user()->id);
        try {
            DB::beginTransaction();
            DB::enableQueryLog();

            //insert post data
            Notulen::create($postData);
            DB::commit();

            //store status message
            Session::flash('success', 'Data berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            Session::flash('error', $e->getMessage());

            //dd($e->getMessage());
        }
        return redirect('notulen');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notulen  $notulen
     * @return \Illuminate\Http\Response
     */
    public function show(Notulen $notulen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notulen  $notulen
     * @return \Illuminate\Http\Response
     */
    public function edit(Notulen $notulen, $id)
    {
        $data['main'] = Notulen::find($id)->toArray();
        return view('notulen/form-edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNotulenRequest  $request
     * @param  \App\Models\Notulen  $notulen
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNotulenRequest $request, Notulen $notulen, $id)
    {
        //validate post data
        $this->validate($request, [
            'kegiatan' => 'required',
            'tanggal' => 'required',
            'pembicara' => 'required',
            'jabatan' => 'required',
            'materi' => 'required',
            'kesimpulan' => 'required',
        ]);
        //get post data
        $postData = $request->all();
        try {
            DB::beginTransaction();
            DB::enableQueryLog();

            //insert post data
            Notulen::find($id)->update($postData);
            DB::commit();

            //store status message
            Session::flash('success', 'Data berhasil diubah!');
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            Session::flash('error', $e->getMessage());

            //dd($e->getMessage());
        }
        return redirect('notulen-edit/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notulen  $notulen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notulen $notulen, $id)
    {
        try {
            DB::beginTransaction();
            DB::enableQueryLog();

            //insert post data
            Notulen::find($id)->delete();
            DB::commit();

            //store status message
            Session::flash('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            Session::flash('error', $e->getMessage());

            //dd($e->getMessage());
        }
        return redirect('notulen');
    }
}
