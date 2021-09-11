<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <form method="GET" action="/reinsertcomic">
          @csrfcd 
          <label for="id">Add Comic Id</label>
          <input type="text" id="id" name="id" >

          <label for="title">Add Comics Title</label>
          <input type="text" id="title" name="title" >

          <label for="description">Add Comics Description</label>
          <input type="text" id="description" name="description" >

          <label for="ean">Add Comics ean</label>
          <input type="text" id="ean" name="ean" >

          <label for="price">Add Comics Price</label>
          <input type="text" id="price" name="price" >

          <input type="submit" value="Submit">
        </form>
    </body>
</html>
