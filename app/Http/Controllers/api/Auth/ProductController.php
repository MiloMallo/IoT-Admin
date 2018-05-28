<?php

namespace App\Http\Controllers\api\Auth;

use App\Product;
use App\Http\Controllers\Controller;
class ProductController extends Controller
{
    public function products($starte,$num)
    {
        return Product::offset($starte)->limit($num)->get();
    }
}

