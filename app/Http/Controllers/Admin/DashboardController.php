<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ContactMessage;

class DashboardController extends Controller
{
    public function index()
    {
        $productCount = Product::count();
        $messageCount = ContactMessage::count();

        return view('admin.dashboard', compact(
            'productCount',
            'messageCount'
        ));
    }
}