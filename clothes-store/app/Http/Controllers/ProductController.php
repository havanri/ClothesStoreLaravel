<?php

namespace App\Http\Controllers;

use App\Components\GetAttributeOptionForProduct;
use App\Components\GetOptionByAttribute;
use App\Components\GetTaxonomyOptionForProduct;
use App\Components\Recusive;
use App\Http\Requests\ProductRequest;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\Tag;
use App\Models\TaxonomyAttribute;
use App\Services\AttributeService;
use App\Services\ProductImageService;
use App\Services\ProductService;
use App\Services\TagService;
use App\Services\TaxonomyService;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    use StorageImageTrait;
    private $productService;
    private $taxonomyService;
    private $attributeService;
    private $tagService;
    private $productImageService;

    public function __construct(ProductService $productService,TagService $tagService,TaxonomyService $taxonomyService,AttributeService $attributeService,ProductImageService $productImageService)
    {
        $this->productService= $productService;
        $this->taxonomyService= $taxonomyService;
        $this->attributeService= $attributeService;
        $this->tagService= $tagService;
        $this->productImageService= $productImageService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = $this->productService->all();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Category
        $htmlOption = $this->getCategory('');
        //Attribute all
        $attributes = $this->attributeService->all();
        //
        return view('admin.product.create',compact('htmlOption','attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
            //code...
        $dataUpload =  $this->storageTraitUpload($request,'feature_image','product');
        $data =[
            'name'=>$request->input('name'),
            'slug'=>Str::slug($request->input('name'),'-'),
            'price'=>$request->input('price'),
            'feature_image'=>$dataUpload['file_name'],
            'feature_image_path'=>$dataUpload['file_path'],
            'content'=>$request->input('content'),
            'user_id'=>auth()->id(),
            'category_id'=>$request->input('category_id')
        ];
        $product = $this->productService->create($data);
        //Insert data to product_images (Image_detail)
        if($request->hasFile('image_path')){
            foreach($request->image_path as $fileItem){
                $dataProductImageDetail=$this->storageTraitUploadMultiple($fileItem,'product');
                $product->listProductImage()->create([
                    'image_name'=>$dataProductImageDetail['file_name'],
                    'image_path'=>$dataProductImageDetail['file_path'],
                ]);
                //DB::connection()->enableQueryLog();
                //$query = DB::getQueryLog();
                //dd($query);
            }
        }
        //Insert data to tag
        if(!empty($request->tags)){
            foreach($request->tags as $tagItem){
                $tagInstance=Tag::firstOrCreate(['name' => $tagItem]);
                $tagId[]=$tagInstance->id;
            }
            $product->tags()->attach($tagId); 
        }
        //Insert data taxonomy
        if(!empty($request->attribute_values)){
            foreach($request->attribute_values as $taxonomyItem){ 
                $taxonomyInstance=TaxonomyAttribute::firstOrCreate(['id' => $taxonomyItem]);
                $taxonomyId[]=$taxonomyInstance->id;
            }
            $product->productTaxonomyAttributes()->sync($taxonomyId); 
        } 
        return redirect(route("product.index"));
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
        $product = $this->productService->find($id);
        //Category
        $htmlOption = $this->getCategory($product->category->id);
        //Attribute all
        $attributes = $this->attributeService->all();

        $taxonomyOfProduct = $product->productTaxonomyAttributes()->get();
        //lay danh sach thuoc tinh cua san pham
        $listAttributeOfProduct = [];
        foreach($taxonomyOfProduct as $taxonomyItem){
            $check =false;
            $check = $this->findAllWithId($listAttributeOfProduct,$taxonomyItem->attribute()->first()->id);

            if($check==false){
                array_push($listAttributeOfProduct,$taxonomyItem->attribute()->first());
            }
        }
        $gao = new GetAttributeOptionForProduct($listAttributeOfProduct,$attributes);
        $htmlAttributeOption=$gao->returnOption();
        // dd($htmlAttributeOption);
        //Lay danh chung loai theo thuoc tinh
        $taxonomyConvertArray = [];
        foreach($taxonomyOfProduct as $item){
            array_push($taxonomyConvertArray,$item);
        }
        $gto =new GetTaxonomyOptionForProduct($listAttributeOfProduct,$taxonomyConvertArray);
        $htmlTaxonomyOption=$gto->returnOption();
        return view('admin.product.edit',compact('product','htmlOption','htmlAttributeOption','htmlTaxonomyOption'));
    }
    public function findAllWithId($objects, $id) {
        return array_filter($objects, function($toCheck) use ($id) { 
            return $toCheck->id == $id; 
        });
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        //
            $dataProductUpdate=[
                'name'=>$request->input('name'),
                'slug'=>Str::slug($request->input('name'),'-'),
                'price'=>$request->input('price'),
                'content'=>$request->input('content'),
                'user_id'=>auth()->id(),
                'category_id'=>$request->input('category_id')
            ];
        if($request->hasFile('feature_image')){
            $dataUpload =  $this->storageTraitUpload($request,'feature_image','product');

            $dataProductUpdate['feature_image']=$dataUpload['file_name'];
            $dataProductUpdate['feature_image_path']=$dataUpload['file_path'];
        }   
        
        
        $product = $this->productService->update($id,$dataProductUpdate);

        //Insert data to product_images (Image_detail)
        if($request->hasFile('image_path')){
            ProductImage::where('product_id',$id)->delete();
            foreach($request->image_path as $fileItem){
                $dataProductImageDetail=$this->storageTraitUploadMultiple($fileItem,'product');
                $product->listProductImage()->create([
                    'image_name'=>$dataProductImageDetail['file_name'],
                    'image_path'=>$dataProductImageDetail['file_path'],
                ]);
                //DB::connection()->enableQueryLog();
                //$query = DB::getQueryLog();
                //dd($query);
            }
        }
        //Insert data to tag
        if(!empty($request->tags)){
            foreach($request->tags as $tagItem){
                //create tag 
                //$tagInstance=$this->tags::firstOrCreate(['name' => $tagItem]);
                //insert bang trung gian 
                // ProductTag::create([
                //     'product_id'=>$product->id,
                //     'tag_id'=>$tagInstance->id
                // ]);
    
                $tagInstance=Tag::firstOrCreate(['name' => $tagItem]);
                $tagId[]=$tagInstance->id;
            }
            $product->tags()->sync($tagId); 
        }
        //Insert data taxonomy
        if(!empty($request->attribute_values)){
            foreach($request->attribute_values as $taxonomyItem){ 
                $taxonomyInstance=TaxonomyAttribute::firstOrCreate(['id' => $taxonomyItem]);
                $taxonomyId[]=$taxonomyInstance->id;
            }
            $product->productTaxonomyAttributes()->sync($taxonomyId); 
        } 
        return redirect(route("product.index"));
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
            $this->productService->delete($id);
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
        $data = Category::all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->modelRecusive($parentId);
        //string[]
        return $htmlOption;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $attributeId
     * @return \Illuminate\Http\Response
     */
    public function OptionTaxonomies($attributeId)
    {
            $htmlOption = "";
            $attribute = Attribute::find($attributeId);
            $TaxonomyListByAttributeId = $attribute->listTaxonomyAttributes()->get();

            //convert htmlOption list taxonomy of attribute -> ajax
            $go = new GetOptionByAttribute($TaxonomyListByAttributeId);
            $htmlOption = $go->returnOption(null);

            return $htmlOption;
            
    }
}
