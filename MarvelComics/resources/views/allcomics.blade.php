<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <table>
        @foreach ($comics as $comic)
        <tr>
            <td><p>{{ $comic->id }}</p></td>
            <td><p>{{ $comic->title }}</p></td>
            <td><p>{{ $comic->description }}</p></td>
            <td><p>{{ $comic->ean }}</p></td>
            <td><p>{{ $comic->price }}</p></td>
            <td><img src='{{ $comic->imageurl }}'></img></td>
        </tr>
        @endforeach
        </table>
    </body>
</html>
