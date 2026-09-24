<?php

use Livewire\Volt\Component;
use App\Models\Product;
use Livewire\WithFileUploads;

new class extends Component {

    use WithFileUploads;

    public $search = '';
    public $showModal = false;

    public $productId;
    public $name, $price, $stock, $description;
    public $images = [];
    public $video;

    public function create()
    {
        $this->resetForm();
        $this->showModal = true;
    }

    public function edit($id)
    {
        $p = Product::findOrFail($id);

        $this->productId = $p->id;
        $this->name = $p->name;
        $this->price = $p->price;
        $this->stock = $p->stock;
        $this->description = $p->description;

        $this->showModal = true;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'images.*' => 'image|max:2048', // 🔥 ADD THIS
        ]);

        $product = Product::updateOrCreate(
            ['id' => $this->productId],
            [
                'name' => $this->name,
                'price' => $this->price,
                'stock' => $this->stock,
                'video' => $this->video,
                'image' => $this->images[0] ?? null, // TEMP
                'description' => $this->description,
            ]
        );

        foreach ($this->images as $img) {
            $product->media()->create([
                'type' => 'image',
                'path' => $img->store('products', 'public'),
            ]);
        }
        
        $this->dispatch('toast', message: 'Product saved!');
        $this->showModal = false;
        $this->resetForm();
    }

    public function delete($id)
    {
        Product::find($id)?->delete();
        $this->dispatch('toast', message: 'Deleted');
    }

    public function updatePrice($id, $value)
    {
        Product::find($id)?->update(['price' => $value]);
    }

    public function resetForm()
    {
        $this->reset(['productId','name','price','stock','description','images','video']);
    }

    public function with(): array
    {
        $products = Product::where('name', 'like', "%{$this->search}%")->get();

        return [
            'products' => $products,
            'count' => Product::count(),
            'lowStock' => Product::where('stock', '<', 5)->count(),
        ];
    }
};?>

<div x-data="{ toast: false, message: '' }"
     x-on:toast.window="toast=true; message=$event.detail.message; setTimeout(()=>toast=false,2000)"
     class="flex min-h-screen bg-gray-50">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-white border-r p-6 flex flex-col justify-between">
        <div>
            <h1 class="text-2xl font-bold mb-10">ShopAdmin</h1>

            <nav class="space-y-4 text-gray-600">
                <a class="flex items-center gap-2 font-semibold text-black">📦 Products</a>
                <a class="flex items-center gap-2 hover:text-black">🧾 Orders</a>
                <a class="flex items-center gap-2 hover:text-black">📊 Analytics</a>
            </nav>
        </div>

        <!-- USER -->
        <div class="mt-10 text-sm text-gray-500">
            <p>Logged in</p>
            <p class="font-semibold text-black">Admin</p>
        </div>
    </aside>

    <!-- MAIN -->
    <main class="flex-1 p-8">

        <!-- TOP BAR -->
        <div class="flex justify-between items-center mb-6">

            <div class="relative w-1/2">
                <input
                    wire:model.live="search"
                    placeholder="Search products..."
                    class="w-full pl-10 p-3 border rounded-xl shadow-sm focus:ring-2 focus:ring-black"
                >
                <span class="absolute left-3 top-3 text-gray-400">🔍</span>
            </div>

            <button wire:click="create"
                class="bg-black text-white px-5 py-2 rounded-xl shadow hover:scale-105 transition flex items-center gap-2">
                ➕ Product
            </button>

        </div>

        <!-- STATS -->
        <div class="grid grid-cols-3 gap-6 mb-6">

            <div class="bg-white p-5 rounded-2xl shadow flex justify-between items-center">
                <div>
                    <p class="text-gray-500">Products</p>
                    <h2 class="text-3xl font-bold">{{ $count }}</h2>
                </div>
                <div class="text-3xl">📦</div>
            </div>

            <div class="bg-white p-5 rounded-2xl shadow flex justify-between items-center">
                <div>
                    <p class="text-gray-500">Low Stock</p>
                    <h2 class="text-3xl font-bold text-red-500">{{ $lowStock }}</h2>
                </div>
                <div class="text-3xl">⚠️</div>
            </div>

            <div class="bg-white p-5 rounded-2xl shadow flex justify-between items-center">
                <div>
                    <p class="text-gray-500">Revenue</p>
                    <h2 class="text-3xl font-bold">R0</h2>
                </div>
                <div class="text-3xl">💰</div>
            </div>

        </div>

        <!-- GRID -->
        <div class="grid grid-cols-4 gap-6">

            @forelse($products as $product)
                <div class="bg-white rounded-2xl shadow hover:shadow-2xl transition p-4 group">

                    <!-- IMAGE -->
                    <div class="h-40 bg-gray-100 rounded-xl mb-3 overflow-hidden">
                        @if($product->media()->exists())
                            <img src="{{ asset('storage/'.$product->media->first()->path) }}"
                            class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-400">
                                No Image
                            </div>
                        @endif
                    </div>

                    <h3 class="font-semibold text-lg">{{ $product->name }}</h3><br>
                    <p class="text-gray-400 text-sm">#{{ $product->id }}</p><br><br><br>

                    <div class="flex items-center justify-between mt-2">
                        <span class="text-lg font-bold">${{ $product->price }}</span>

                        @if($product->stock < 5)
                            <span class="bg-red-100 text-red-500 text-xs px-2 py-1 rounded-full">
                                Low stock
                            </span>
                        @endif
                    </div>

                    <!-- INLINE EDIT -->
                    <input type="number"
                        value="{{ $product->price }}"
                        wire:change="updatePrice({{ $product->id }}, $event.target.value)"
                        class="w-full mt-3 border rounded-lg p-2 text-sm focus:ring-2 focus:ring-black"
                    >

                    <div class="flex justify-between mt-4 text-sm">
                        <button wire:click="edit({{ $product->id }})" class="text-blue-500 hover:underline">
                            Edit
                        </button>
                        <button wire:click="delete({{ $product->id }})" class="text-red-500 hover:underline">
                            Delete
                        </button>
                    </div>

                </div>
            @empty
                <!-- EMPTY STATE -->
                <div class="col-span-4 flex flex-col items-center justify-center py-20 text-gray-400">
                    <div class="text-5xl mb-3">📦</div>
                    <p class="text-lg">No products yet</p>
                    <button wire:click="create"
                        class="mt-4 bg-black text-white px-4 py-2 rounded-lg">
                        Add your first product
                    </button>
                </div>
            @endforelse

        </div>

        <!-- MODAL -->
        <div x-show="$wire.showModal"
             x-transition
             class="fixed inset-0 bg-black/40 flex items-center justify-center">

            <div class="bg-white w-[600px] p-6 rounded-2xl shadow-xl">

                <h2 class="text-xl font-bold mb-4">Product</h2>

                <input wire:model="name" placeholder="Name"
                    class="w-full p-3 border rounded-lg mb-3 focus:ring-2 focus:ring-black">

                <input wire:model="price" placeholder="Price"
                    class="w-full p-3 border rounded-lg mb-3 focus:ring-2 focus:ring-black">

                <input wire:model="stock" placeholder="Stock"
                    class="w-full p-3 border rounded-lg mb-3 focus:ring-2 focus:ring-black">

                <textarea wire:model="description"
                    class="w-full p-3 border rounded-lg mb-3 focus:ring-2 focus:ring-black"></textarea>

                <!-- IMAGE PREVIEW -->
                <div class="grid grid-cols-3 gap-2 mb-3">
                    @foreach($images as $img)
                        <img src="{{ $img->temporaryUrl() }}" class="h-20 rounded object-cover">
                    @endforeach
                </div>

                <input type="file" wire:model="images" multiple class="mb-3">

                <div class="flex justify-end gap-2">
                    <button @click="$wire.showModal=false"
                        class="px-4 py-2 bg-gray-200 rounded-lg">
                        Cancel
                    </button>

                    <button wire:click="save"
                        wire:loading.attr="disabled"
                        class="px-4 py-2 bg-black text-white rounded-lg">
                        Save
                    </button>
                </div>

            </div>
        </div>

        <!-- TOAST -->
        <div x-show="toast"
             x-transition
             class="fixed bottom-5 right-5 bg-black text-white px-4 py-2 rounded shadow">
            <span x-text="message"></span>
        </div>

    </main>
</div>