<?php

namespace App\Http\Controllers;

use App\HttpResponse;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductWithCategoriesResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller implements HasMiddleware
{
    use HttpResponse;
    public static function middleware()
    {
        return [
            new Middleware("can:create products",only:['store']),
            new Middleware("can:delete any products",only:['destroy']),
        ];
    }
    public function index()
    {
        try {
            return $this->success(ProductResource::collection(Product::paginate(10)));
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }

    public function store(StoreProductRequest $request)
    {
        try{
            DB::beginTransaction();
            $temp=$request->validated();
            $product = Product::create([
                'seller'=>Auth::user()->id,
                'name'=>$temp['name'],
                'price'=>$temp['price'],
                'description'=>$temp['description'],
                'quantity'=>$temp['quantity']
            ]);
            if($request->has('category_ids')){
                $product->categories()->attach($request->category_ids);
            }
            DB::commit();
            return $this->success(new ProductWithCategoriesResource($product), 'Product created successfully', 201);
        }catch(\Throwable $th){
            DB::rollBack();
            return $this->error($th->getMessage());
        }
    }

    public function show(Product $product)
    {
        try {
            return $this->success(new ProductResource($product));
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }
    public function update(UpdateProductRequest $request, Product $product)
    {
        try{
            Gate::authorize('update', $product);
            DB::beginTransaction();
            $temp=$request->safe()->except('category_ids');
            $product->update($temp);
            if($request->has('category_ids')){
                $product->categories()->sync($request->category_ids);
            }
            DB::commit();
            return $this->success(new ProductWithCategoriesResource($product), 'Product updated successfully');
        }catch(\Throwable $th){
            DB::rollBack();
            return $this->error($th->getMessage());
        }
    }
    public function destroy(Product $product)
    {
        try{
            Gate::authorize('delete', $product);
            $product->delete();
            return $this->success(null,'Product deleted successfully');
        }catch(\Throwable $th){
            return $this->error($th->getMessage());
        }
    }
    public function productCategory(Product $product){
        try {
            $categories = $product->categories;
            return $this->success(CategoryResource::collection($categories));
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }
}
