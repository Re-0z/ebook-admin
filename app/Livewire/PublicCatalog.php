<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Book;
use App\Models\Category;

class PublicCatalog extends Component
{
    use WithPagination;
    public $search = '';
    public array $activeCategories = [];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function toggleCategory($categoryId)
    {
        if (in_array($categoryId, $this->activeCategories))
            {
                $this->activeCategories = array_diff($this->activeCategories, [$categoryId]);
            }
            else
                {
                    $this->activeCategories[] = $categoryId;
                }
                $this->resetPage();
    }
    public function render()
    {
        $query = Book::where('title', 'like', '%' . $this->search .'%');

        if (!empty($this->activeCategories))
            {
                $query->whereHas('categories', function ($q)
                {
                    $q->whereIn('categories.id', $this->activeCategories);
                });
            }
        
        return view('livewire.public-catalog', [
            'books'=> $query->paginate(8),
            'categories'=> Category::all(),
        ]);
    }
}