<?php 

namespace App\Repositories\Product;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

interface ProductRepositoryInterface 
{
    public function getAllProduct();

    public function getProductById($id);
}

?>