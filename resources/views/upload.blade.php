<form class="" enctype="multipart/form-data" action="/details" method="post">
  @csrf
  <input required type="file" class="form-control" name="images[]" placeholder="address" multiple>
  <input type="submit" name="" value="Submit">
</form>
