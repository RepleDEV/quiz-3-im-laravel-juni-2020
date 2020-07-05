@extends('layouts.master')

@section('content')
    <?php
    ?>
    <form action="{{$method == "PUT" ? "/articles/$id" : "/articles"}}" method="POST">
        <?php
            if ($method == "PUT")echo "<input type='hidden' name='_method' value='PUT'>";
        ?>
        @csrf
        <div class="form-group">
        <input type="text" name="title" class="form-control" placeholder="Enter Title" value="{{$old_title ?? ''}}">
        </div>
        <div class="form-group">
            <textarea name="content" cols="132" rows="10" placeholder="Content">{{$old_content ?? ''}}</textarea>
        </div>
        <div class="form-group"><input type="text" name="tags" placeholder="Tags (optional, comma separated)" class="form-control" value="{{$old_tags ?? ''}}"></div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection