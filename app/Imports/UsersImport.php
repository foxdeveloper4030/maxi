<?php

namespace App\Imports;

use App\Exmodel;
use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
      //  session(['excel'=>$row]);
        return new Exmodel(['name'=>$row[1]]);


        //$ex->delete();

    }
}
