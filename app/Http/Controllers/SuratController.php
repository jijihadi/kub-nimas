<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Http\Requests\StoreSuratRequest;
use App\Http\Requests\UpdateSuratRequest;
use App\Models\Kas;
use DB;
use Illuminate\Http\Request;
use Session;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexin()
    {
        $data['main'] = Surat::where('tanggal_masuk', 'not like', '0000-00-00')->get();
        $data['stat'] = "Masuk";
        return view('surat/index', $data);
    }
    public function indexout()
    {
        $data['main'] = Surat::where('tanggal_keluar', 'not like', '0000-00-00')->get();
        $data['stat'] = "Keluar";
        return view('surat/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('surat/form-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSuratRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSuratRequest $request)
    {
        //validate post data
        $this->validate($request, [
            'jenis' => "numeric|between:0.001,99.99",
            'nomor' => 'required',
            'tanggal' => 'required',
            'tindak_lanjut' => 'required',
            'keterangan' => 'required',
        ]);
        //get post data
        $post = $request->all();

        $postData = array();
        $postData['nomor'] = $post['nomor'];
        $postData['tanggal'] = $post['tanggal'];
        $postData['tindak_lanjut'] = $post['tindak_lanjut'];
        $postData['keterangan'] = $post['keterangan'];
        if ($post['jenis']==1) {
            $postData['tanggal_masuk'] = $post['tanggal_masuk'];
            $postData['perihal_masuk'] = $post['perihal_masuk'];
        }
        if ($post['jenis']==2) {
            $postData['tanggal_keluar'] = $post['tanggal_keluar'];
            $postData['perihal_keluar'] = $post['perihal_keluar'];
        }
        // dd($postData);
        try {
            DB::beginTransaction();
            DB::enableQueryLog();

            //insert post data
            Surat::create($postData);
            DB::commit();

            //store status message
            Session::flash('success', 'Data berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            Session::flash('error', $e->getMessage());

            dd($e->getMessage());
        }
        if ($post['jenis']==1) {
            return redirect('surat-masuk');
        }
        return redirect('surat-keluar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function show(Surat $surat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function edit(Surat $surat, $id)
    {
        $data['main'] = Surat::find($id)->toArray();
        return view('surat/form-edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSuratRequest  $request
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSuratRequest $request, Surat $surat, $id)
    {
        //validate post data
        $this->validate($request, [
            'jenis' => "numeric|between:0.001,99.99",
            'nomor' => 'required',
            'tanggal' => 'required',
            'tindak_lanjut' => 'required',
            'keterangan' => 'required',
        ]);
        //get post data
        $post = $request->all();

        $postData = array();
        $postData['nomor'] = $post['nomor'];
        $postData['tanggal'] = $post['tanggal'];
        $postData['tindak_lanjut'] = $post['tindak_lanjut'];
        $postData['keterangan'] = $post['keterangan'];
        if ($post['jenis']==1) {
            $postData['tanggal_masuk'] = $post['tanggal_masuk'];
            $postData['perihal_masuk'] = $post['perihal_masuk'];
        }
        if ($post['jenis']==2) {
            $postData['tanggal_keluar'] = $post['tanggal_keluar'];
            $postData['perihal_keluar'] = $post['perihal_keluar'];
        }
        // dd($postData);
        try {
            DB::beginTransaction();
            DB::enableQueryLog();

            //insert post data
            Surat::find($id)->update($postData);
            DB::commit();

            //store status message
            Session::flash('success', 'Data berhasil diubah!');
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            Session::flash('error', $e->getMessage());

            dd($e->getMessage());
        }
        return redirect('surat-edit/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Surat $surat, $id)
    {
        try {
            DB::beginTransaction();
            DB::enableQueryLog();

            //insert post data
            Surat::find($id)->delete();
            DB::commit();

            //store status message
            Session::flash('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            Session::flash('error', $e->getMessage());

            dd($e->getMessage());
        }
        return redirect('surat-masuk');
    }
}
