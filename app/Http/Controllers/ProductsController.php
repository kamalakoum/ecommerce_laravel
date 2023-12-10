<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 
use App\Models\User;

class ProductsController extends Controller
{
    public function insert_product(Request $req){
        // $product = new Product();
        // $product->name = $req->name;
        // $product->description = $req->description;
        // $product->price = $req->price;
        // $product->stock = $req->stock;
        // $product->image_url = $req->image_url;
        // $product->sold = $req->sold;
        // $product->save();
        $req->validate([
            "name" => "unique:products|min:6|max:8"
        ]);

        $product_2= Product::insert([
            "name" => $req->name,
            "description" => $req->description,
            "price" => $req->price,
            "stock" => $req->stock,
            "image_url" => $req->image_url,
        ]);
    }

    public function update_product(Request $req){
        $id_product = $req->id_product;
        $product = Product::find($id_product);
        // dd($product);
        $product_other_way = Product::where('id',$req->id_product)->first();
        // dd($product_other_way);
        $product_other_way_2 = Product::where('id',$req->id_product)->get()[0];

        $product->name = $req->name;
        $product->save();

        $product->update([
            'description' => $req->description ?? $product->description
        ]);

        return response()->json([
            "products" => $product_other_way_2
        ]);

    }

    public function get_product(){
        $product = Product::all();
        return response()->json([
            'products' => $product
        ]);
    }
    public function delete_product(Request $req){
        $id_product = $req->id;
    
        // Find the product by ID
        $product = Product::find($id_product);
    
        // Check if the product exists
        if ($product) {
            // Delete the product
            $product->delete();
    
            return response()->json([
                'message' => 'Product deleted successfully',
            ]);
        } else {
            return response()->json([
                'error' => 'Product not found',
            ], 404);
        }
    }

    // public function register(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string',
    //         'email' => 'required|email|unique:users,email',
    //         'password' => 'required|string|min:6',
    //     ]);

    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //     ]);

    //     return response()->json(['message' => 'User registered successfully'], 201);
    // }

    // public function login(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required|string',
    //     ]);

    //     if (Auth::attempt(['email' => $request->email, 'password' => $request-> bcrypt(password)])) {
    //         $user = Auth::user();
    //         $token = $user->createToken('auth_token')->plainTextToken;

    //         return response()->json(['token' => $token]);
    //     }

    //     return response()->json(['message' => 'Invalid credentials'], 401);
    // }

}
