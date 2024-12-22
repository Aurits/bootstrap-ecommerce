<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product as ProductModel;

class Product extends Component
{
    use WithPagination;

    public $category = 'All Categories';
    public $priceRange = 1000;
    public $sortBy = 'Newest';

    protected $queryString = [
        'category' => ['except' => 'All Categories'],
        'priceRange' => ['except' => 1000],
        'sortBy' => ['except' => 'Newest'],
    ];

    public function filter()
    {
        // Reset pagination whenever a filter or sort changes
        $this->resetPage();
    }


    public function render()
    {
        $query = ProductModel::query();

        // Apply category filter
        if ($this->category !== 'All Categories') {
            $query->where('category', $this->category);
        }

        // Apply price range filter
        $query->where('price', '<=', $this->priceRange);

        // Apply sorting
        switch ($this->sortBy) {
            case 'Price: Low to High':
                $query->orderBy('price', 'asc');
                break;
            case 'Price: High to Low':
                $query->orderBy('price', 'desc');
                break;
            case 'Newest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'Popular':
                $query->orderByRaw("CASE WHEN is_featured = 'Yes' THEN 1 ELSE 0 END DESC");
                break;
        }

        $products = $query->paginate(9);

        return view('livewire.product', compact('products'));
    }
}
