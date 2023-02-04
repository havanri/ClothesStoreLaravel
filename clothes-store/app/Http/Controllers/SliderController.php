<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Services\BaseIService;
use App\Services\SliderService;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SliderController extends Controller
{
    private $service;
    use StorageImageTrait;
    public function __construct(SliderService $service)
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
        //dd('index');
        $sliders = $this->service->all();
        return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.slider.create');
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

            //code...
            $dataUpload =  $this->storageTraitUpload($request,'image_name','slider');
            $data = [
                'name'=>$request->input('name'),
                'description'=>$request->input('description'),
                'image_path'=>$dataUpload['file_path'],
                'image_name'=>$dataUpload['file_name'],        
            ];
            if($this->service->create($data)!=null){
                return redirect(route('slider.index'));
            }      
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
        $slider=$this->service->find($id);
        return view('admin.slider.edit',compact('slider'));
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
            //code...
            $dataUpdate = [
                'id'=>$id,
                'name'=>$request->input('name'),
                'description'=>$request->input('description'),
            ];
            $dataUpload =  $this->storageTraitUpload($request,'image_name','slider');
            if(!empty($dataUpload)){
                $dataUpdate['image_path']=$dataUpload['file_path'];
                $dataUpdate['image_name']=$dataUpload['file_name'];
            }  
            if($this->service->update($id,$dataUpdate)!=null){
                return redirect(route('slider.index'));
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
}
