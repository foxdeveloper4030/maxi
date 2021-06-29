<?php

namespace App\Http\Controllers\admin;

use App\Product;
use App\UserMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.message.index', ['messages' => UserMessage::query()->orderBy('created_at')->get(), 'products' => $products]);
    }
}
