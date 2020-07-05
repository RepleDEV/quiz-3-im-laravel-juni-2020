<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class ArticleModel {
    public static function insert_article($data) {
        DB::table('article')->insert($data);
        return DB::table('article')->where('content',$data['content'])->get()[0]->id;
    }
    public static function get_all_articles() {
        return DB::table('article')->get();
    }
    public static function get_by_id($id) {
        return DB::table('article')->where('id',$id)->get()[0];
    }
    public static function edit_row_by_id($column, $data, $id)  {
        DB::table('article')->where('id', $id)->update([$column => $data]);
    }
    public static function del_by_id($id){
        DB::table('article')->where('id', $id)->delete();
    }
}
