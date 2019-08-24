<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::with('childrens')->whereNull('parent_id')->get();
        return view('menus.builder', compact('menus'));
    }
}
