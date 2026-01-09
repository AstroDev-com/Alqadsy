<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardApiController extends Controller
{
    /**
     * Get dashboard statistics
     */
    public function statistics()
    {
        $data = [
            'products_count' => Product::count(),
            'categories_count' => Category::count(),
            'users_count' => User::count(),
            // Add other relevant statistics here
            'active_products_count' => Product::where('status', 1)->count(),
        ];

        return response()->json([
            'success' => true,
            'data' => $data,
        ], 200);
    }
}
