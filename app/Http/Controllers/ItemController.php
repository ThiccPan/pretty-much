<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function latest_3()
    {
        $itemsData = Item::paginate(3);
        return view('store.home', [
            'items' => $itemsData
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $itemsData = Item::all();
        return view('admin.item', [
            'items' => $itemsData
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function user_item()
    {
        $itemsData = Item::all();
        return view('store.item', [
            'items' => $itemsData
        ]);
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
        // TODO: request verification
        $itemDTO = $request->collect();
        $itemData = new Item;

        $itemData->name = $itemDTO->get('name');
        $itemData->description = $itemDTO->get('description');
        $itemData->stock = $itemDTO->get('stock');
        $itemData->price = $itemDTO->get('price');
        $itemData->category = $itemDTO->get('category');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->storePublicly('item_image');
            $itemData->image_location = $path;
        }

        $ok = $itemData->save();

        if (!$ok) {
            return redirect(route('admin.item'), 500);
        }

        return redirect(route('admin.item'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view('store.item-detail', [
            'item' => $item,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $reqDTO = $request->all();
        foreach ($reqDTO as $key => $value) {
            if ($value != null && $key != 'image') {
                $item->update([$key => $value]);
            }
        }

        if ($request->hasFile('image')) {
            Storage::delete($item->image_location);
            $success = $item->delete();
            if (!$success) {
                Log::withContext([
                    'item' => $item,
                ]);
            }

            $path = $request->file('image')->storePublicly('item_image');
            $item->image_location = $path;
        }
        $item->save();
        
        return redirect(route('admin.item'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        Storage::delete($item->image_location);
        $success = $item->delete();
        if (!$success) {
            Log::withContext([
                'item' => $item,
            ]);
        }
        return redirect(route('admin.item'));
    }
}
