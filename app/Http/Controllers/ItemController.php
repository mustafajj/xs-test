<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ContentFormat;
use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $content_formats = ContentFormat::all();

        $items = Item::query();

        if ($request->has('categories')) {
            $items->whereIn('category_id', $request->categories);
        }
    
        if ($request->has('content_formats')) {
            $items->whereIn('content_format_id', $request->content_formats);
        }

        $items = $items->paginate(6);

        return view('items', compact('categories', 'content_formats', 'items'));
    }
}
