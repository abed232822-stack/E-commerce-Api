<?php

namespace App\Http\Controllers;

use App\HttpResponse;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;


class CategoryController extends Controller implements HasMiddleware
{
    use HttpResponse;
    public static function middleware()
    {
        return [
            new Middleware("can:create categories",only:['store']),
            new Middleware("can:edit categories",only:['update']),
            new Middleware("can:delete categories",only:['destroy']),
        ];
    }
    public function index()
    {
        try{
            return $this->success(CategoryResource::collection(Category::paginate(10)));
        }catch(\Throwable $th){
            return $this->error($th->getMessage());
        }
    }

    public function store(StoreCategoryRequest $request)
    {
        try {
            $temp=$request->validated();
            $path = $request->hasFile('image') 
            ? $request->file('image')->store('categories', 'public') 
            : null;             
            $temp['image']=$path;
            $Category=Category::create($temp);
            return $this->success(new CategoryResource($Category), 'Category created successfully', 201);  
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }

    public function show(Category $category)
    {
        try {
            return $this->success(new CategoryResource($category));
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        try {
            $temp=$request->validated();
            $category->update($temp);
            return $this->success(new CategoryResource($category),'The category was updated successfully');
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try{
            $category->delete();
            return $this->success(null,'The category was deleted successfully');
        }catch(\Throwable $th){
            return $this->error($th->getMessage());
        }   
    }
    public function categoryProducts(Category $category){
        try {
            $products = $category->products()->paginate(10);
            return $this->success(ProductResource::collection($products));
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }
}
