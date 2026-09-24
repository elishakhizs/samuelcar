<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function index()
    {
        $basket = session()->get('basket', []);
        return view('basket', compact('basket'));
        
    }

    public function add(Request $request)
    {
        $basket = session()->get('basket', []);

        $type = $request->type;

        // 🎟 NORMAL TICKET
        if ($type === 'ticket') {

            $basket[] = [
                'type' => 'ticket',
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => $request->quantity ?? 1
            ];
        }

        // 🎁 BUNDLE (fixed)
        elseif ($type === 'bundle') {

            $basket[] = [
                'type' => 'bundle',
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => 1 // ALWAYS 1
            ];
        }

        // 🛒 SHOP ITEM
        elseif ($type === 'shop') {

            $product = Product::findOrFail($request->id);
            $image = $product->media->first();
            $basket[] = [
                'type' => 'shop',
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $image ? $image->path : null, // 👈 STORE IMAGE PATH
            ];
        }

        session()->put('basket', $basket);

        return redirect()->route('basket.index');
    
    }

    public function update(Request $request, $index)
    {
        $basket = session()->get('basket', []);

        if (isset($basket[$index])) {

            // ❌ bundles cannot change
            if ($basket[$index]['type'] !== 'bundle') {
                $basket[$index]['quantity'] = max(1, (int)$request->quantity);
            }

        session()->put('basket', $basket);
        }

    return redirect()->back();
    }

    
    public function remove($index)
    {
        $basket = session()->get('basket', []);

        if (isset($basket[$index])) {
            unset($basket[$index]);
            session()->put('basket', array_values($basket)); // reindex
        }

        return redirect()->back();
    }
}
