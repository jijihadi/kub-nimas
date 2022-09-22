<?php

namespace App\Http\Controllers;

use App\Models\Produksi;
use App\Models\Rencana;
use App\Models\Absensi;
use App\Models\Usaha;
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
        // run query
        $q2 = Produksi::select('*');
        // cek apakah ketua kub
        $idkub = getidkub(Auth::user()->id);
        if ($idkub > 0) {
            $q2->where('id_kub', $idkub);
        }
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
        if ($postData['password'] == '') {
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

            dd($e->getMessage());
        }
        return redirect('edit-user/' . $id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function rapat_create()
    {
        // $data['anggota'] = Anggota::all()->toArray();
        return view('rapat-form');
        // return view('rapat-form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function rapat_store(Request $request)
    // {
    //     //validate post data
    //     $this->validate($request, [
    //         'tanggal' => 'required',
    //         'nama_anggota' => 'required',
    //         'jumlah' => 'required',
    //         'nilai' => 'required',
    //         'keterangan' => 'required',
    //     ]);
    //     //get post data
    //     $postData = $request->all();
    //     $postData['id_kub'] = getidkub(Auth::user()->id);
    //     $postData['nilai'] = bilanganbulat($postData['nilai']);
    //     try {
    //         DB::beginTransaction();
    //         DB::enableQueryLog();

    //         //insert post data
    //         Produksi::create($postData);
    //         DB::commit();

    //         //store status message
    //         Session::flash('success', 'Data berhasil ditambahkan!');
    //     } catch (\Exception $e) {
    //         DB::rollback();
    //         // something went wrong
    //         Session::flash('error', $e->getMessage());

    //         dd($e->getMessage());
    //     }
    //     return redirect('hasil-produksi');
    // }
}
