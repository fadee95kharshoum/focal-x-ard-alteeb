<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $discounts = Discount::all();
        return view('backend.discounts.index', compact('discounts'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $discounts = Discount::all();

        return view('backend.discounts.create', compact('discounts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $discount = Discount::create([
                'title' => $request->title,
                'amount' => $request->amount,
            ]);
            Alert::success('Success', 'Discount Created Successfuly');

            return redirect()->route('discounts.index');
        } catch (\Exception $th) {
            Alert::success('Error', 'Discount Created Faild');

            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $discount = Discount::findOrFail($id);
        return view('backend.discounts.show', compact('discount'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $discount = Discount::findOrFail($id);
        return view('backend.discounts.edit', compact('discount'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $discount = Discount::findOrFail($id);

        try {
            $discount->update([
                'title' => $request->title,
                'amount' => $request->amount,
            ]);
            Alert::success('Success', 'Discount Updated Successfuly');

            return redirect()->route('discounts.index');
        } catch (\Exception $th) {
            Alert::error('Error', 'Discount Updated Faild');

            return back();
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $discount = Discount::findOrFail($id);
        try {
            $discount->delete();
            Alert::success('Success', 'Discount Deleted Faild');
            return back()->with('success', 'Deleted Success');

        } catch (\Exception $th) {
            Alert::error('Error', 'Discount Deleted Faild');
            return back()->with('error', 'Faild Deleting');
        }

    }


}
