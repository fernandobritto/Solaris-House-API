<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(Product $product)
    {
        $this->prod = $product;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->prod->paginate(10);
        return response()->json($products, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        try {
            $product = $this->prod->create($data);

            if(isset($data['category']) && count($data['category'])){
                $product->category()->sync($data['category']);
            }

            return response()->json(['data' => [
                'msg' => 'Product successfully registered!',
                'add' => $product
            ], 200]);

        } catch (\Exception $e) {
            $message = $e->getMessage();
			return response()->json($message, 401);
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
        try {
            $products = $this->prod->findOrFail($id);
            return response()->json(['data' => $products], 200);

        } catch (\Exception $e) {
            $message = $e->getMessage();
			return response()->json($message, 402);
        }
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
        $data = $request->all();

        try {
            $product = $this->prod->findOrFail($id);
            $product->update($data);

            return response()->json(['data' => [
                'msg' => 'Product updated successfully!',
                'update on' => $product
            ]],200);

        } catch (\Exception $e) {
            $message = $e->getMessage();
			return response()->json($message, 401);
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
        try {
            $product = $this->prod->findOrFail($id);
            $product->destroy($id);
            return response()->json(['data' => [
                'msg' => 'Product removed successfully!'
            ]], 200);

        } catch (\Exception $e) {
            $message = $e->getMessage();
			return response()->json($message, 401);
        }
    }
}
