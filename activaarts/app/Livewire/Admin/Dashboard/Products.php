<?php

namespace App\Livewire\Admin\Dashboard;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Livewire\WithPagination;


#[Layout('layouts.admin')]
class Products extends Component
{

    use WithFileUploads;
    use WithPagination;

    public $name, $productId, $sku, $category, $price, $stock, $description, $image, $is_featured = false;

    public function store()
    {

        // Handle image upload
        $imagePath = $this->image ? $this->image->store('products', 'public') : null;

        // Create product
        Product::create([
            'name' => $this->name,
            'sku' => $this->sku,
            'category' => $this->category,
            'price' => $this->price,
            'stock' => $this->stock,
            'description' => $this->description,
            'is_featured' => $this->is_featured,
            'image' => $imagePath,
        ]);

        // Reset form
        $this->resetForm();

        // Flash message
        session()->flash('message', 'Product added successfully!');
    }

    public function resetForm()
    {
        $this->name = '';
        $this->sku = '';
        $this->category = '';
        $this->price = '';
        $this->stock = '';
        $this->description = '';
        $this->image = null;
        $this->is_featured = false;
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $this->productId = $product->id;
        $this->name = $product->name;
        $this->sku = $product->sku;
        $this->category = $product->category;
        $this->price = $product->price;
        $this->description = $product->description;
        $this->stock = $product->stock;
        $this->is_featured  = $product->is_featured;
    }

    public function update()
    {

        $product = Product::findOrFail($this->productId);
        $product->update([
            'name' => $this->name,
            'sku' => $this->sku,
            'category' => $this->category,
            'price' => $this->price,
            'description' => $this->description,
            'stock' => $this->stock,
            'is_featured' => $this->is_featured,
        ]);

        // Clear form fields
        $this->resetForm();

        session()->flash('message', 'Product updated successfully.');
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        if ($product->image) Storage::disk('public')->delete($product->image);
        $product->delete();

        session()->flash('message', 'Product deleted successfully!');
    }

    public $filterCategory = '';
    public $filterStockStatus = '';
    public $filterSearch = '';

    public function applyFilters()
    {
        $this->resetPage(); // Reset to page 1 when filters are applied
    }

    public function render()
    {
        $query = Product::query();

        // Apply filters
        if ($this->filterCategory) {
            $query->where('category', $this->filterCategory);
        }

        if ($this->filterStockStatus) {
            $query->where('stock', $this->filterStockStatus === 'Low Stock' ? '<=' : '>', 5);
        }

        if ($this->filterSearch) {
            $query->where(function ($subQuery) {
                $subQuery->where('name', 'like', '%' . $this->filterSearch . '%')
                    ->orWhere('sku', 'like', '%' . $this->filterSearch . '%');
            });
        }

        // Paginate filtered results
        $products = $query->paginate(10);

        return view('livewire.admin.dashboard.products', compact('products'));
    }
}