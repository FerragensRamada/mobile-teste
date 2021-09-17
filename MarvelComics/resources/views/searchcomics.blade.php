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
    </body>
</html>
