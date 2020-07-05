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
    public function add_article(Request $request) {
        if (!$request->title)return redirect('/articles/create');
        if (!$request->content)return redirect('/articles/create');
        if (!$request->tags)$request->tags = "none";

        $slug = strtolower(str_replace(" ", "-", $request->title));

        $added_id = Model::insert_article(
            [
                'title'=>$request->title,
                'content'=>$request->content,
                'slug'=>$slug,
                'tag'=>$request->tags
            ]
        );

        return redirect('/articles');
    }

    public function show_article($id) {
        $article = Model::get_by_id($id);
        return view('articlepage', compact('article'));
    }

    public function show_edit_page($id){
        $old_article_contents = Model::get_by_id($id);

        $old_content = $old_article_contents->content;
        $old_title = $old_article_contents->title;
        $old_tags = $old_article_contents->tag;
        $method = "PUT";

        return view('articleform',compact('old_content', 'old_title','old_tags','method', 'id'));
    }

    public function save_article_edit(Request $req, $id) {
        Model::edit_row_by_id('title', $req->title, $id);
        Model::edit_row_by_id('content', $req->content, $id);
        Model::edit_row_by_id('tag', $req->tags, $id);

        return redirect("/articles/$id");
    }

    public function del_article($id) {
        Model::del_by_id($id);
        return redirect('/articles');
    }
}
