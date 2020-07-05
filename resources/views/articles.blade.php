@extends('layouts.master')

@section('content')
    <script>
        Swal.fire({
            title: 'Berhasil!',
            text: 'Memasangkan script sweet alert',
            icon: 'success',
            confirmButtonText: 'Cool'
        })
    </script>

    <button class="btn btn-primary float-right" onclick="window.location.href+=`/create`">Create Article</button>
    <h1>Articles List</h1>
    <table class="table table-hover">
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