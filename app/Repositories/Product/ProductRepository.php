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
        return $this->product->all();
    }
    
    public function getProductById($id)
    {
        return $this->product->findOrFail($id);
    }
}

?>