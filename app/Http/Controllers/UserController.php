<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['main'] = User::all();
        return view('user/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user/form-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate post data
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role' => "numeric|between:0.001,99.99",
        ]);
        //get post data
        $postData = $request->all();
        $postData['password'] = Hash::make($postData['password']);
        try {
            DB::beginTransaction();
            DB::enableQueryLog();

            //insert post data
            User::create($postData);
            DB::commit();

            //store status message
            Session::flash('success', 'Data berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            Session::flash('error', $e->getMessage());

            dd( $e->getMessage() );
        }
        return redirect('list-user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        return view('user/form-edit', $data);
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
            'role' => "numeric|between:0.001,99.99",
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
        return redirect('list-user-edit/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            DB::enableQueryLog();

            //insert post data
            User::find($id)->delete();
            DB::commit();

            //store status message
            Session::flash('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            Session::flash('error', $e->getMessage());

            dd( $e->getMessage() );
        }
        return redirect('list-user');
    }
}
