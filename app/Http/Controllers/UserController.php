<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\CartResource;
use App\Http\Resources\OrderResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\UserResource;
use App\HttpResponse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller implements HasMiddleware
{
    use HttpResponse;
    public static function middleware()
    {
        return [
            new Middleware("can:view users list",only:['index']),
            new Middleware("can:create users",only:['store']),
            new Middleware("can:edit any user",only:['update']),
            new Middleware("can:delete user",only:['destroy']),
        ];
    }
    use HttpResponse;
    public function index()
    {
        try {
            return $this->success(UserResource::collection(User::paginate(10)));
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }

    public function store(RegisterRequest $request)
    {
        try {
            $user = User::create($request->validated());
            return $this->success($user);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }

    public function show(User $user)
    {
        try {
            Gate::authorize('viewOwnProfile', $user);
            return $this->success(new UserResource($user));
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }
    public function update(UpdateUserRequest $request, User $user)
    {
        try {
            Gate::authorize('update', $user);
            $user->update($request->validated());
            return $this->success($user);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return $this->success(null,'The User was deleted successfully');
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }

    public function userProducts(User $user){
        try {
            $products = $user->products()->paginate(10);
            return $this->success(ProductResource::collection($products));
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }
    public function userOrders(User $user){
        try {
            $orders = $user->orders()->paginate(10);
            return $this->success(OrderResource::collection($orders));
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }
    public function userCart(User $user){
        try {
            $cart = $user->cart()->with('products')->firstOrCreate([
                'status'=>'active',
                'user_id'=>$user->id,
            ]);
            return $this->success(new CartResource($cart));
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }
}