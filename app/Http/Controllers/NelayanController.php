<?php

namespace App\Http\Controllers;
use App\Models\NelayanModel;
use Illuminate\Http\Request;

class NelayanController extends Controller
{
    public function __construct()
    {
        $this->NelayanModel = new NelayanModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'nelayan' => $this->NelayanModel->alldata(),
        ];
        return view('v_nelayan', $data);
    }
    public function detail($id_nelayan)
    {
        if (!$this->NelayanModel->detaildata($id_nelayan))
        {
            abort(404);
        }
        $data = [
            'nelayan' => $this->NelayanModel->detaildata($id_nelayan),
        ];
        return view('v_detailnelayan', $data);
    }
    public function add()
    {
        return view('v_addnelayan');
    }
    public function insert()
    {
        Request()->validate([
            'username' => 'required|unique:tb_nelayan,username|min:4|max:5',
            'nama_nelayan' => 'required',
            'password' => 'required',
            'foto_nelayan' => 'required|mimes:jpg,jpeg,bmp,png|max:5000',
        ],[
            'username.required' => 'wajib isi!!!',
            'username.unique' => 'username ini sudah ada!!!',
            'username.min' => 'min 4 karakter!!!',
            'username.max' => 'max 5 karakter!!!',
            'nama_nelayan.required' => 'wajib isi!!!',
            'password.required' => 'wajib isi!!!',
            'foto_nelayan.required' => 'wajib isi!!!',

        ]); 
        $file = request()->foto_nelayan;
        $filename = request()->username . '.' . $file->extension();
        $file->move(public_path('foto_nelayan'), $filename);

        //upload gambar
        $data = [
            'username' => request()->username,
            'nama_nelayan' => request()->nama_nelayan,
            'password' => request()->password,
            'foto_nelayan' => $filename,
        ];
        $this->NelayanModel->adddata($data);
        return redirect()->route('nelayan')->with('pesan','data berhasil ditambahkan');
     

       
    }
    public function edit($id_nelayan)
    {
        
        if (!$this->NelayanModel->detaildata($id_nelayan))
        {
            abort(404);
        }
        $data = [
            'nelayan' => $this->NelayanModel->detaildata($id_nelayan),
        ];
        return view('v_editnelayan',$data);
    }
    public function update($id_nelayan)
    {
        Request()->validate([
            'username' => 'required|min:4|max:5',
            'nama_nelayan' => 'required',
            'password' => 'required',
            'foto_nelayan' => 'mimes:jpg,jpeg,bmp,png|max:5000',
        ],[
            'username.required' => 'wajib isi!!!',
            'username.min' => 'min 4 karakter!!!',
            'username.max' => 'max 5 karakter!!!',
            'nama_nelayan.required' => 'wajib isi!!!',
            'password.required' => 'wajib isi!!!',
        ]); 

        if (request()->foto_nelayan <> "")  {
            $file = request()->foto_nelayan;
        $filename = request()->username . '.' . $file->extension();
        $file->move(public_path('foto_nelayan'), $filename);

        //upload gambar
        $data = [
            'username' => request()->username,
            'nama_nelayan' => request()->nama_nelayan,
            'password' => request()->password,
            'foto_nelayan' => $filename,
        ]; $this->NelayanModel->editdata($id_nelayan, $data);

        } else {
            $data = [
                'username' => request()->username,
                'nama_nelayan' => request()->nama_nelayan,
                'password' => request()->password,
            ]; $this->NelayanModel->editdata($id_nelayan, $data);
        }

        
        
        return redirect()->route('nelayan')->with('pesan','data berhasil diupdate');
     

       
    }
}
