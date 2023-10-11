<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BoardController extends Controller
{
    public function list()
    {
        $boards = Board::get();
        return Inertia::render('Admin/Board/List', compact('boards'));
    }
}
