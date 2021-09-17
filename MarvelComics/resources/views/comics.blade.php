<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <form method="GET" action="/searchtitle">
          @csrf
          <label for="title">Comics Seach by title</label>
          <input type="text" id="title" name="title" >
          <input type="submit" value="Submit">
        </form>
        <form method="GET" action="/searchid">
          @csrf
          <label for="id">Comics Seach by Id</label>
          <input type="text" id="id" name="id" >
          <input type="submit" value="Submit">
        </form>
        <table>
        @foreach ($comics as $comic)
        <tr>
            <td><p>{{ $comic->id }}</p></td>
            <td><p>{{ $comic->title }}</p></td>
            <td><p>{{ $comic->description }}</p></td>
            <td><p>{{ $comic->ean }}</p></td>
            <td><p>{{ $comic->prices[0]->price }}</p></td>
            <td><img src='{{ $comic->thumbnail->path }}'></img></td>
            <td><p>delete</p><form method="POST" action='/deletecomic'><input type="submit" value='{{ $comic->id }}' name="delete"></form></td>
        </tr>
        @endforeach
        </table>
    </body>
</html>
