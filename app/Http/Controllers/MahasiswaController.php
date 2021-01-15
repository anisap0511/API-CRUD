<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    private $mahasiswa;

    public function __construct(Mahasiswa $mahasiswa)
    {
        $this->mahasiswa = $mahasiswa;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return $this->onSuccess('Mahasiswa', $mahasiswa, 'Founded');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $mahasiswa = $this->mahasiswa->create($request->all());
            return $this->onSuccess('Mahasiswa', $mahasiswa, 'Created');
        } catch (\Exception $e) {
            return $this->onError($e);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mahasiswa = $this->mahasiswa->find($id);
        return $this->onSuccess('Mahasiswa', $mahasiswa, 'Founded');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //
    }
        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $mahasiswa = $this->mahasiswa->where('id', $id)->update($request->all());
            $mahasiswa_data = $this->mahasiswa->find($id);
            return $this->onSuccess('Data', $mahasiswa_data, 'Updated');
            
        } catch (\Exception $e) {
            return $this->onError($e);
        }
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $mahasiswa_data = $this->mahasiswa->find($id);
            $mahasiswa = $this->mahasiswa->destroy($id);
            return $this->onSuccess('Data', $mahasiswa_data, 'Deleted');
        } catch (\Exception $e) {
            return $this->onError($e);
        }
    }
}