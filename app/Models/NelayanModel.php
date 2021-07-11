<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class NelayanModel extends Model
{
    public function alldata()
    {
        return DB::table('tb_nelayan')->get();
    }
    public function detaildata($id_nelayan)
    {
        return  DB::table('tb_nelayan')->where('id_nelayan', $id_nelayan)->first();
    }
    public function adddata($data)
    {
        DB::table('tb_nelayan')->insert($data);

    }
    public function editdata($id_nelayan, $data)
    {
        DB::table('tb_nelayan')->where('id_nelayan', $id_nelayan)->update($data);
    }
}