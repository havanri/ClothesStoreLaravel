<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Models\Menu;
use App\Services\MenuService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    private $service;
    public function __construct(MenuService $service)
    {
        $this->service=$service;
    }
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         //
        $menus = $this->service->all();
        return view('admin.menu.index')->with("menus",$menus);
     }
 
     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         //
         $htmlOption = $this->getCategory('');
         return view('admin.menu.create',compact('htmlOption'));
     }
 
     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request)
     {
         //
             $data = [
                 'name'=>$request->input('name'),
                 'parent_id'=>$request->input('parent_id'),
                 'slug'=>Str::slug($request->input('name'),'-')
             ];
             //save databases
             $this->service->create($data);
             return redirect(route("menu.index"));  
     }
 
     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function show($id)
     {
         //
     }
 
     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit($id)
     {
         //
        $menu = $this->service->find($id);
        $htmlOption =$this->getCategory($menu->parent_id);
        return view('admin.menu.edit',compact('htmlOption','menu'));
     }
 
     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, $id)
     {
         //
             $data=[
                'name'=>$request->input('name'),
                'parent_id'=>$request->input('parent_id'),
                'slug'=>Str::slug($request->input('name'),'-')
             ];
            if($this->service->update($id,$data)!=null){
                return redirect(route('menu.index'));
            } 
     }
 
     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
         //
         try {
             //code...
            $this->service->delete($id);
             return response()->json([
                 'code'=>200,
                 'message'=>'success'
             ],200);
 
         } catch (\Throwable $th) {
             //throw $th;
             DB::rollBack();
             Log::error('Message '.$th->getMessage().' Line '.$th->getLine());
             return response()->json([
                 'code'=>500,
                 'message'=>'fail'
             ],500);
         }
     }
     public function getCategory($parentId){
         $data = Menu::all();
         $recusive = new Recusive($data);
         $htmlOption = $recusive->modelRecusive($parentId);
         //string[]
         return $htmlOption;
     }
}
