<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class ArticleModel {
    public static function insert_article($data) {
        DB::table('article')->insert($data);
    }
    public static function get_all_articles() {
        return DB::table('article')->get();
    }
    public static function get_by_id($id) {
        return DB::table('articles')->where('id',$id)->get();
    }
}
