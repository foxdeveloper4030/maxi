<?php

namespace App\Http\Controllers\admin;

use App\Cariar;
use App\Province;
use App\Province_Cariar;
use App\PublicModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CariarController extends Controller
{
    public function index(){
        return view('admin.cariar.index');
    }
    public function show($id){
       $cariar=Cariar::query()->find($id);

       return view('admin.cariar.show',['cariar'=>$cariar]);
    }
    public function create(){
        return view('admin.cariar.cariar_create');
    }
    public function store(Request $request){
       $cariar=new Cariar();

       $cariar->name=$request->name;
       $cariar->start_time=explode(':',$request->time_start)[0];
       $cariar->start_time_m=explode(':',$request->time_start)[1];
       $cariar->end_time=explode(':',$request->time_end)[0];
       $cariar->end_time_m=explode(':',$request->time_end)[1];
       $cariar->text=$request->text;
       $cariar->time_hi=$request->time_hi;
       $cariar->time_low=$request->time_low;
       $cariar->price=$request->price;
       $cariar->free=$request->off;
       if (isset($request->icon)){
           $public=new PublicModel();
          try{
              $move=$public->image($request,'public/assets/img/cariar','icon');
              if ($move)
                  $cariar->icon=$public->image($request,'public/assets/img/cariar','icon');
          }
          catch (\Exception $exception){

          }
       }
       if ($cariar->save())
       foreach (Province::all() as $province){
           $new_province=new Province_Cariar();
           if (isset($request['city'.$province->id]))
               if ($request['city'.$province->id]=='on'){
                   $new_province->province_id=$province->id;
                   $new_province->cariar_id=$cariar->id;
                   $new_province->save();
               }

       }
       $cariar->save();
       return redirect(route('admin.cariar.index'));
    }
    public function edite($id,Request $request){
        $cariar=Cariar::query()->find($id);
        $cariar->name=$request->name;
        $cariar->start_time=explode(':',$request->time_start)[0];
        $cariar->start_time_m=explode(':',$request->time_start)[1];
        $cariar->end_time=explode(':',$request->time_end)[0];
        $cariar->end_time_m=explode(':',$request->time_end)[1];
        $cariar->text=$request->text;
        $cariar->time_hi=$request->time_hi;
        $cariar->time_low=$request->time_low;
        $cariar->price=$request->price;
        $cariar->free=$request->off;
        if (isset($request->icon)){
            $public=new PublicModel();
            try{
                $move=$public->image($request,'public/assets/img/cariar','icon');
                if ($move)
                    $cariar->icon=$public->image($request,'public/assets/img/cariar','icon');
            }
            catch (\Exception $exception){

            }
        }
        if ($cariar->save())
            foreach (Province::all() as $province){
                $new_province=new Province_Cariar();
                DB::delete('DELETE FROM `province__cariars` WHERE `cariar_id`='.$cariar->id.' AND `province_id`='.$province->id);
                if (isset($request['city'.$province->id]))
                    if ($request['city'.$province->id]=='on'){
                        $new_province->province_id=$province->id;
                        $new_province->cariar_id=$cariar->id;
                        $new_province->save();
                    }

            }
        $cariar->save();
        return redirect(route('admin.cariar.show',['id'=>$cariar->id]));

    }
}
