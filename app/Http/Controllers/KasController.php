<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateKasRequest;
use App\Http\Requests\StoreKasRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Kas;
use Session;
use DB;

class KasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // main
        $q1 = Kas::select('*');
        $idkub = getidkub(Auth::user()->id);
        if ($idkub !=0) { $q1->where('id_kub', $idkub); }
        $data['main'] = $q1->get();
        // first
        $q2 = Kas::where('masuk', 'not like', 0);
        if ($idkub !=0) { $q2->where('id_kub', $idkub); }
        $data['first'] = $q2->get();
        // second
        $q3 = Kas::where('keluar', 'not like', 0);
        if ($idkub !=0) { $q3->where('id_kub', $idkub); }
        $data['second'] = $q3->get();
        // view
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
        $postData['id_kub'] = getidkub(Auth::user()->id);
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
