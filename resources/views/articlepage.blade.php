@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>{{$article->title}}</h1>
        <p class="small">Tags</p>
        <?php
            $tags = explode(", ",$article->tag);
            foreach ($tags as $tag) {
                echo "<button class='btn btn-primary mr-1'>$tag</button>";
            }
        ?>
        <hr>
        <p>{{$article->content}}</p>
        <hr>
    </div>
    <div class="container">
        <button class="btn btn-primary" onclick="window.location.href+='/edit'">Edit</button>
        <form action="" class="float-right" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            @csrf
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
@endsection