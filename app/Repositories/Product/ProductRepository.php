<?php

namespace App\Repositories\Product;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getAllProduct()
    {
        return $this->product->orderBy('created_at', 'desc')->paginate(15);
    }
    
    public function getProductById($id)
    {
        return $this->product->findOrFail($id);
    }
}

?>