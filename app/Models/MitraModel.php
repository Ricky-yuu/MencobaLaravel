<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MitraModel extends Model
{
    public function alldata()
    {
        return DB::table('tb_mitra')->get();
    }
    public function detaildata($id_mitra)
    {
        return  DB::table('tb_mitra')->where('id_mitra', $id_mitra)->first();
    }
    public function adddata($data)
    {
        DB::table('tb_mitra')->insert($data);

    }
    public function editdata($id_mitra, $data)
    {
        DB::table('tb_mitra')->where('id_mitra', $id_mitra)->update($data);
    }
}
