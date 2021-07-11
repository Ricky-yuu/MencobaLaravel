<?php

namespace App\Http\Controllers;
use App\Models\KonsumenModel;
use Illuminate\Http\Request;

class KonsumenController extends Controller
{
    public function __construct()
    {
        $this->KonsumenModel = new KonsumenModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'konsumen' => $this->KonsumenModel->alldata(),
        ];
        return view('v_konsumen', $data);
    }
    public function detail($id_konsumen)
    {
        if (!$this->KonsumenModel->detaildata($id_konsumen))
        {
            abort(404);
        }
        $data = [
            'konsumen' => $this->KonsumenModel->detaildata($id_konsumen),
        ];
        return view('v_detailkonsumen', $data);
    }
    public function add()
    {
        return view('v_addkonsumen');
    }
    public function insert()
    {
        Request()->validate([
            'username' => 'required|unique:tb_konsumen,username|min:4|max:5',
            'nama_konsumen' => 'required',
            'password' => 'required',
            'foto_konsumen' => 'required|mimes:jpg,jpeg,bmp,png|max:5000',
        ],[
            'username.required' => 'wajib isi!!!',
            'username.unique' => 'username ini sudah ada!!!',
            'username.min' => 'min 4 karakter!!!',
            'username.max' => 'max 5 karakter!!!',
            'nama_konsumen.required' => 'wajib isi!!!',
            'password.required' => 'wajib isi!!!',
            'foto_konsumen.required' => 'wajib isi!!!',

        ]); 
        $file = request()->foto_konsumen;
        $filename = request()->username . '.' . $file->extension();
        $file->move(public_path('foto_konsumen'), $filename);

        //upload gambar
        $data = [
            'username' => request()->username,
            'nama_konsumen' => request()->nama_konsumen,
            'password' => request()->password,
            'foto_konsumen' => $filename,
        ];
        $this->KonsumenModel->adddata($data);
        return redirect()->route('konsumen')->with('pesan','data berhasil ditambahkan');
     

       
    }
    public function edit($id_konsumen)
    {
        
        if (!$this->KonsumenModel->detaildata($id_konsumen))
        {
            abort(404);
        }
        $data = [
            'konsumen' => $this->KonsumenModel->detaildata($id_konsumen),
        ];
        return view('v_editkonsumen',$data);
    }
    public function update($id_konsumen)
    {
        Request()->validate([
            'username' => 'required|min:4|max:5',
            'nama_konsumen' => 'required',
            'password' => 'required',
            'foto_konsumen' => 'mimes:jpg,jpeg,bmp,png|max:5000',
        ],[
            'username.required' => 'wajib isi!!!',
            'username.min' => 'min 4 karakter!!!',
            'username.max' => 'max 5 karakter!!!',
            'nama_konsumen.required' => 'wajib isi!!!',
            'password.required' => 'wajib isi!!!',
        ]); 

        if (request()->foto_konsumen <> "")  {
            $file = request()->foto_konsumen;
        $filename = request()->username . '.' . $file->extension();
        $file->move(public_path('foto_konsumen'), $filename);

        //upload gambar
        $data = [
            'username' => request()->username,
            'nama_konsumen' => request()->nama_konsumen,
            'password' => request()->password,
            'foto_konsumen' => $filename,
        ]; $this->KonsumenModel->editdata($id_konsumen, $data);

        } else {
            $data = [
                'username' => request()->username,
                'nama_konsumen' => request()->nama_konsumen,
                'password' => request()->password,
            ]; $this->KonsumenModel->editdata($id_konsumen, $data);
        }

        
        
        return redirect()->route('konsumen')->with('pesan','data berhasil diupdate');
     

       
    }
}
