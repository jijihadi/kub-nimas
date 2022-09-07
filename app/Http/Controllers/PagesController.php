<?php

namespace App\Http\Controllers;

use App\Models\Produksi;
use App\Models\Surat;
use App\Models\User;
use App\Models\Kub;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use Session;
use DB;

class PagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['main'] = Kub::all();
        $q1 = Surat::where('tanggal_masuk', 'not like', '0000-00-00');
        // cek apakah ketua kub
        $idkub = getidkub(Auth::user()->id);
        if ($idkub !=0) { $q1->where('id_kub', $idkub); }
        $data['second'] = $q1->get();
        // run query
        $q2 = Produksi::select('*');
        // cek apakah ketua kub
        $idkub = getidkub(Auth::user()->id);
        if ($idkub !=0) { $q2->where('id_kub', $idkub); }
        $data['third'] = $q2->get();
        // run query
        return view('index', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['main'] = User::find($id)->toArray();
        return view('user-edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate post data
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);
        //get post data
        $postData = $request->all();
        if ($postData['password']=='') {
            $postData['password'] = $postData['oldpassword'];
        }
        // dd($postData);
        try {
            DB::beginTransaction();
            DB::enableQueryLog();

            //insert post data
            User::find($id)->update($postData);
            DB::commit();

            //store status message
            Session::flash('success', 'Data berhasil diubah!');
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            Session::flash('error', $e->getMessage());

            dd( $e->getMessage() );
        }
        return redirect('edit-user/'.$id);
    }

}
