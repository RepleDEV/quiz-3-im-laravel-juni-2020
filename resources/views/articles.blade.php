@extends('layouts.master')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($table_contents as $row) {
                    echo "<tr onclick='window.location.href=`/articles/$row->id`'>";
                    echo "<td>$row->title</td>";
                    echo "</tr>";
                }
                ?>
        </tbody>
    </table>
@endsection