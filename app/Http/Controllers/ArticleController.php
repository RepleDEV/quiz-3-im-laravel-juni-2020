<?php

namespace App\Http\Controllers;

// Models
use App\Models\ArticleModel as Model;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index() {
        $table_contents = Model::get_all_articles();
        return view('articles', compact('table_contents'));
    }
}
