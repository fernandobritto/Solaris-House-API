<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(Category $category)
    {
        $this->categ = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $var = $this->categ->paginate(10);
        return response()->json($var, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $var = $this->categ->create($request->all());
            return response()->json(['data' => [
                'msg' => 'Category successfully registered!',
                'category' => $var
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
            $var = $this->categ->findOrFail($id);
            return response()->json(['data' => $var], 200);

        } catch (\Exception $e) {
            $message = $e->getMessage();
			return response()->json($message, 401);
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
            $var = $this->categ->findOrFail($id);
            $var->update($data);

            return response()->json(['data' => [
                'msg' => 'Category updated successfully!',
                'update on' => $var
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
            $var = $this->categ->findOrFail($id);
            $var->destroy($id);
            return response()->json(['data' => [
                'msg' => 'Category removed successfully!'
            ]], 200);

        } catch (\Exception $e) {
            $message = $e->getMessage();
			return response()->json($message, 401);
        }
    }
}
