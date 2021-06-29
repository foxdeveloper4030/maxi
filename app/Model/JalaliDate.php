<?php
/**
 * Created by PhpStorm.
 * User: Arsi
 * Date: 10/21/2019
 * Time: 5:49 PM
 */

namespace App\Model;


use Carbon\Carbon;

class JalaliDate extends Date
{
public function timetodate($time,$format){
    return $this->jdate($format,$time);
}
public function datetodate($time,$format){
    $t=(new Carbon($time))->timestamp;
    return $this->timetodate($t,$format);
}

}