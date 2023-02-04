<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\TaxonomyAttribute;
use App\Services\AttributeService;
use App\Services\BaseIService;
use App\Services\TaxonomyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TaxonomyAttributeController extends Controller
{
    private $attributeService;
    private $taxonomyService;
    public function __construct(TaxonomyService $taxonomyService,AttributeService $attributeService)
    {
        $this->taxonomyService=$taxonomyService;
        $this->attributeService = $attributeService;
    }
    /**
     *
     * @param  int  $attributeId
     * @return \Illuminate\Http\Response
     */
    public function index($attributeId)
    {
        //
        $taxonomyAttributes = $this->taxonomyService->all();
        $attribute = $this->attributeService->find($attributeId);
        return view('admin.taxonomy-attribute.index',compact('taxonomyAttributes','attribute'));
    }

    /**
     *
     * @param  int  $attributeId
     * @return \Illuminate\Http\Response
     */
    public function create($attributeId)
    {
        //
        $attribute_id = $attributeId;
        return view('admin.taxonomy-attribute.create',compact('attribute_id'));
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
            'name' => $request->input('name'),
            'attribute_id' => $request->input('attribute_id'),
        ];
            $taxonomyAttribute = $this->taxonomyService->create($data);
            //save databases
            return redirect(route("taxonomyattribute.index",['attributeId'=>$request->input('attribute_id')]));
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
        $taxonomyAttribute = $this->taxonomyService->find($id);
        return view('admin.taxonomy-attribute.edit',compact('taxonomyAttribute'));
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
        $data = [
            'name' => $request->input('name'),
        ];
            $this->taxonomyService
            ->update($id,$data);
            return redirect(route("taxonomyattribute.index",["attributeId"=>$request->input('attribute_id')]));
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
            $this->taxonomyService->delete($id);
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
