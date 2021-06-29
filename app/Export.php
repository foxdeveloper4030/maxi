<?php
/**
 * Created by PhpStorm.
 * User: Abolfazl
 * Date: 5/21/2020
 * Time: 11:15 AM
 */

namespace App;


use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Excel;

class Export implements FromCollection {

    /**
     * @return Collection
     */
    use Exportable;
    public function collection()
    {

       return Category::all();

    }
}