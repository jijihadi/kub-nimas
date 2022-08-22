<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKasRequest;
use App\Http\Requests\UpdateKasRequest;
use App\Models\Kas;
use DB;
use Illuminate\Http\Request;
use Session;

class KasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['main'] = Kas::all();
        $data['first'] = Kas::where('masuk', 'not like', 0)->get();
        $data['second'] = Kas::where('keluar', 'not like', 0)->get();
        return view('kas/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kas/form-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKasRequest $request)
    {
        //validate post data
        $this->validate($request, [
            'jenis' => "numeric|between:0.001,99.99",
            'uraian' => 'required',
            'tanggal' => 'required',
            'banyaknya' => 'required',
            'harga_satuan' => 'required',
        ]);
        //get post data
        $post = $request->all();

        $postData = array();
        $postData['uraian'] = $post['uraian'];
        $postData['tanggal'] = $post['tanggal'];
        $postData['banyaknya'] = bilanganbulat($post['banyaknya']);
        $postData['harga_satuan'] = bilanganbulat($post['harga_satuan']);
        $postData['masuk'] = 0;
        $postData['keluar'] = 0;
        ($post['jenis'] == 1 ? $postData['masuk'] = $postData['banyaknya'] : $postData['keluar'] = $postData['banyaknya']);
        // dd($postData);
        try {
            DB::beginTransaction();
            DB::enableQueryLog();

            //insert post data
            Kas::create($postData);
            DB::commit();

            //store status message
            Session::flash('success', 'Data berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            Session::flash('error', $e->getMessage());

            //dd($e->getMessage());
        }
        return redirect('kas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kas  $kas
     * @return \Illuminate\Http\Response
     */
    public function show(Kas $kas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kas  $kas
     * @return \Illuminate\Http\Response
     */
    public function edit(Kas $kas, $id)
    {
        $data['main'] = Kas::find($id)->toArray();
        return view('kas/form-edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKasRequest  $request
     * @param  \App\Models\Kas  $kas
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKasRequest $request, Kas $kas, $id)
    {
        //validate post data
        $this->validate($request, [
            'jenis' => "numeric|between:0.001,99.99",
            'uraian' => 'required',
            'tanggal' => 'required',
            'banyaknya' => 'required',
            'harga_satuan' => 'required',
        ]);
        //get post data
        $post = $request->all();

        $postData = array();
        $postData['uraian'] = $post['uraian'];
        $postData['tanggal'] = $post['tanggal'];
        $postData['banyaknya'] = bilanganbulat($post['banyaknya']);
        $postData['harga_satuan'] = bilanganbulat($post['harga_satuan']);
        $postData['masuk'] = 0;
        $postData['keluar'] = 0;
        ($post['jenis'] == 1 ? $postData['masuk'] = $postData['banyaknya'] : $postData['keluar'] = $postData['banyaknya']);
        try {
            DB::beginTransaction();
            DB::enableQueryLog();

            //insert post data
            Kas::find($id)->update($postData);
            DB::commit();

            //store status message
            Session::flash('success', 'Data berhasil diubah!');
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            Session::flash('error', $e->getMessage());

            //dd($e->getMessage());
        }
        return redirect('kas-edit/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kas  $kas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kas $kas, $id)
    {
        try {
            DB::beginTransaction();
            DB::enableQueryLog();

            //insert post data
            Kas::find($id)->delete();
            DB::commit();

            //store status message
            Session::flash('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            Session::flash('error', $e->getMessage());

            //dd($e->getMessage());
        }
        return redirect('kas');
    }
}
