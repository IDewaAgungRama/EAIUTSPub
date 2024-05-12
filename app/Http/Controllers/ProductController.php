<?php

namespace App\Http\Controllers;

use App\PublisherProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'category' => 'required|string',
            'description' => 'required|string',
            'price' => 'required',
        ]);

        $body = [
            'id' => $id,
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
            'price' => $request->price,
        ];

        $dataEncode = json_encode($body);
        $publisher = new PublisherProductService();
        $publisher->productUpdate($dataEncode);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{  
            $body = [
                'id' => $id,
            ];
            $dataEncode = json_encode($body);
            $publisher = new PublisherProductService();
            $publisher->productDelete($dataEncode);

            return redirect()->back();
            
        }catch(\Exception $e){
            return redirect()->back();
        }
    }
}
