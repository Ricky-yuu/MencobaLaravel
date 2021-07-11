<?php

namespace App\Http\Controllers;
use App\Models\MitraModel;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    public function __construct()
    {
        $this->MitraModel = new MitraModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'mitra' => $this->MitraModel->alldata(),
        ];
        return view('v_mitra', $data);
    }
    public function detail($id_mitra)
    {
        if (!$this->MitraModel->detaildata($id_mitra))
        {
            abort(404);
        }
        $data = [
            'mitra' => $this->MitraModel->detaildata($id_mitra),
        ];
        return view('v_detailmitra', $data);
    }
    public function add()
    {
        return view('v_addmitra');
    }
    public function insert()
    {
        Request()->validate([
            'username' => 'required|unique:tb_mitra,username|min:4|max:5',
            'nama_mitra' => 'required',
            'password' => 'required',
            'foto_mitra' => 'required|mimes:jpg,jpeg,bmp,png|max:5000',
        ],[
            'username.required' => 'wajib isi!!!',
            'username.unique' => 'username ini sudah ada!!!',
            'username.min' => 'min 4 karakter!!!',
            'username.max' => 'max 5 karakter!!!',
            'nama_mitra.required' => 'wajib isi!!!',
            'password.required' => 'wajib isi!!!',
            'foto_mitra.required' => 'wajib isi!!!',

        ]); 
        $file = request()->foto_mitra;
        $filename = request()->username . '.' . $file->extension();
        $file->move(public_path('foto_mitra'), $filename);

        //upload gambar
        $data = [
            'username' => request()->username,
            'nama_mitra' => request()->nama_mitra,
            'password' => request()->password,
            'foto_mitra' => $filename,
        ];
        $this->MitraModel->adddata($data);
        return redirect()->route('mitra')->with('pesan','data berhasil ditambahkan');
     

       
    }
    public function edit($id_mitra)
    {
        
        if (!$this->MitraModel->detaildata($id_mitra))
        {
            abort(404);
        }
        $data = [
            'mitra' => $this->MitraModel->detaildata($id_mitra),
        ];
        return view('v_editmitra',$data);
    }
    public function update($id_mitra)
    {
        Request()->validate([
            'username' => 'required|min:4|max:5',
            'nama_mitra' => 'required',
            'password' => 'required',
            'foto_mitra' => 'mimes:jpg,jpeg,bmp,png|max:5000',
        ],[
            'username.required' => 'wajib isi!!!',
            'username.min' => 'min 4 karakter!!!',
            'username.max' => 'max 5 karakter!!!',
            'nama_mitra.required' => 'wajib isi!!!',
            'password.required' => 'wajib isi!!!',
        ]); 

        if (request()->foto_mitra <> "")  {
            $file = request()->foto_mitra;
        $filename = request()->username . '.' . $file->extension();
        $file->move(public_path('foto_mitra'), $filename);

        //upload gambar
        $data = [
            'username' => request()->username,
            'nama_mitra' => request()->nama_mitra,
            'password' => request()->password,
            'foto_mitra' => $filename,
        ]; $this->MitraModel->editdata($id_mitra, $data);

        } else {
            $data = [
                'username' => request()->username,
                'nama_mitra' => request()->nama_mitra,
                'password' => request()->password,
            ]; $this->MitraModel->editdata($id_mitra, $data);
        }

        
        
        return redirect()->route('mitra')->with('pesan','data berhasil diupdate');
     

       
    }
}

