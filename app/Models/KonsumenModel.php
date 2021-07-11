<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KonsumenModel extends Model
{
    public function alldata()
    {
        return DB::table('tb_konsumen')->get();
    }
    public function detaildata($id_konsumen)
    {
        return  DB::table('tb_konsumen')->where('id_konsumen', $id_konsumen)->first();
    }
    public function adddata($data)
    {
        DB::table('tb_konsumen')->insert($data);

    }
    public function editdata($id_konsumen, $data)
    {
        DB::table('tb_konsumen')->where('id_konsumen', $id_konsumen)->update($data);
    }
}

