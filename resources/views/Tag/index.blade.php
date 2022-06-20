<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Tags</title>
    </head>
    <body>
        <h1>Tags</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>name</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tags as $tag)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$tag->name}}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No Tags Available!!!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </body>
</html>
