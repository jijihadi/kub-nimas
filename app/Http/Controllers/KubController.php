<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kub;
use App\Http\Requests\StoreKubRequest;
use App\Http\Requests\UpdateKubRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;
use DB;

class KubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['main'] = Kub::all();
        return view('kub/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['main'] = User::where('role', 'not like', '2')->get();
        return view('kub/form-add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKubRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKubRequest $request)
    {
        //validate post data
        $this->validate($request, [
            'name' => 'required',
            'alamat' => 'required',
            'jumlah_anggota' => 'required',
            'kelas' => 'required',
            'noreg_skt' => 'required',
            'noreg_pupi' => 'required',
            'id_ketua' => "numeric|between:0.001,99.99",
        ]);
        //get post data
        $postData = $request->all();
        try {
            DB::beginTransaction();
            DB::enableQueryLog();

            //insert post data
            Kub::create($postData);
            DB::commit();

            //store status message
            Session::flash('success', 'Data berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            Session::flash('error', $e->getMessage());

            dd( $e->getMessage() );
        }
        return redirect('list-kub');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kub  $kub
     * @return \Illuminate\Http\Response
     */
    public function show(Kub $kub)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kub  $kub
     * @return \Illuminate\Http\Response
     */
    public function edit(Kub $kub, $id)
    {
        $data['main'] = Kub::find($id)->toArray();
        $data['side'] = User::where('role', 'not like', '2')->get();
        return view('kub/form-edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKubRequest  $request
     * @param  \App\Models\Kub  $kub
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKubRequest $request, Kub $kub, $id)
    {
        //validate post data
        $this->validate($request, [
            'name' => 'required',
            'alamat' => 'required',
            'jumlah_anggota' => 'required',
            'kelas' => 'required',
            'noreg_skt' => 'required',
            'noreg_pupi' => 'required',
            'id_ketua' => "numeric|between:0.001,99.99",
        ]);
        //get post data
        $postData = $request->all();
        try {
            DB::beginTransaction();
            DB::enableQueryLog();

            //insert post data
            Kub::find($id)->update($postData);
            DB::commit();

            //store status message
            Session::flash('success', 'Data berhasil diubah!');
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            Session::flash('error', $e->getMessage());

            dd( $e->getMessage() );
        }
        return redirect('list-kub-edit/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kub  $kub
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kub $kub, $id)
    {
        try {
            DB::beginTransaction();
            DB::enableQueryLog();

            //insert post data
            Kub::find($id)->delete();
            DB::commit();

            //store status message
            Session::flash('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            Session::flash('error', $e->getMessage());

            dd( $e->getMessage() );
        }
        return redirect('list-kub');
    }
}
