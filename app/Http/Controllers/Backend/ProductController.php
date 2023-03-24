<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Traits\UploadImageTrait;
use App\Models\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    use UploadImageTrait;       
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('backend.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public $paths = array();

    public function store(Request $request)
    {

        //validete request

       try {
            $file = $request->hasFile('images');
            if ($file) {
                $images =  $this->uploadImage($request, 'products');

                $product = Product::create([
                    'name' => $request->name,
                    'type' => $request->type,
                    'components' => $request->components,
                    'first_smell' => $request->first_smell,
                    'second_smell' => $request->second_smell,
                    'last_smell' => $request->last_smell,
                    'price' => $request->price,
                    'images' => $images,
                ]);
            Alert::success('Success', 'Product Added Successfuly');
            return redirect()->route('products.index');
        };
        Alert::error('Error', 'Product Added Faild');
            return back();
        } catch (\Exception $th) {
            Alert::error('Error', 'Product Added Faild');
            return back();
        }
        Alert::error('Error', 'SomeThing Wrong Try Again');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product  = Product::findOrFail($id);
        return view('backend.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('backend.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        try {
            $product->update([

                // All request

            ]);
            Alert::success('Success', 'Product Updated Successfuly');

            return redirect()->route('products.index');
        } catch (\Exception $th) {
            Alert::error('Error', 'Product Updated Faild');
            return back();
        }

        Alert::error('Error', 'Something Wrong Please Refresh Page');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        try {
            $product->delete();
        } catch (\Exception $th) {
            Alert::error('Error', 'Product Deleted Faild');
            return back();
        }
        Alert::error('Error', 'Something Wrong Please Refresh Page');
        return back();
    }

}
