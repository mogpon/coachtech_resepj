<form action="{{route('image.store')}}" method="POST" enctype="multipart/form-data">
  @csrf

  店名<input type="text" class="shop_name" name="shop_name"><br>
  地域<input type="text" class="area_id" name="area_id"><br>
  ジャンル<input type="text" class="genre_id" name="genre_id"><br>
  詳細<input type="textarea" name="description"><br>
  写真<input type="file" class="form-control" name="file"><br>
  <input type="submit">
</form>

@foreach($images as $image)
<div>
  <p>{{$image->created_at}} {{$image->file_comment}}</p>
  <a href="storage/{{$image->file_path}}" target=blank>
    <img src="storage/{{$image->file_path}}" width="240" alt="" title="">
  </a>
</div>
@endforeach