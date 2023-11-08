@extends('layouts.app')

@section('title', 'Add Book')


@section('content')


@foreach ($errors->all() as $error)
<div class="alert alert-danger">{{ $error }}</div>
@endforeach

<div class="row d-flex justify-content-center align-items-center my-5">
  <div class="col-md-9 d-flex justify-content-center">

    <div class="card w-75 ">
      <div class="card-header">
        <div class="float-start">
          Add New Book
        </div>
        <div class="float-end">
          <a href="{{ route('books.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
        </div>
      </div>
      <div class="card-body ">
        <form action="{{ route('books.store') }}" enctype="multipart/form-data" method="post">
          @csrf
          <div class="row ">
            <div class="col-4">
              <img id="image-upload" src="{{ asset('/img/error.PNG')}}" alt="Ảnh" class="img-fluid image-upload"
                width="100%">
            </div>
            <div class="col-8">
              <div class="mb-4 row">
                <label for="bookName"
                  class="col-md-3 col-form-label text-md-center text-decoration-underline ">title</label>
                <div class="col-md-9">
                  <input type="text" name="title" class="form-control" required>
                </div>
              </div>

              <div class="mb-4 row">
                <label for="bookYear"
                  class="col-md-3 col-form-label text-md-center text-decoration-underline ">author</label>
                <div class="col-md-9">
                  <input type="text" name="author" class="form-control" required>
                </div>
              </div>

              <div class="mb-4 row">
                <label for="authorId"
                  class="col-md-3 col-form-label text-md-center text-decoration-underline ">genre</label>
                <div class="col-md-9">
                  <input type="text" name="genre" class="form-control" required>
                </div>
              </div>

              <div class="mb-4 row">
                <label for="authorId"
                  class="col-md-3 col-form-label text-md-center text-decoration-underline ">publicationYear</label>
                <div class="col-md-9">
                  <input type="text" name="publicationYear" class="form-control" required>
                </div>
              </div>

              <div class="mb-4 row">
                <label for="authorId"
                  class="col-md-3 col-form-label text-md-center text-decoration-underline ">ISBN</label>
                <div class="col-md-9">
                  <input type="text" name="ISBN" class="form-control" required>
                </div>
              </div>

              <div class="mb-4 row">
                <label for="authorId"
                  class="col-md-3 col-form-label text-md-center text-decoration-underline ">coverImageURL</label>
                <div class="col-md-9">
                  <input id="coverImageURL" type="file" accept="image/jpeg, image/png, image/svg, image/gif"
                    name="image" class="form-control" required>
                </div>
              </div>

            </div>
          </div>
          <div class="mb-4 row">
            <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add New Book">
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

@endsection


<script>
document.addEventListener("DOMContentLoaded", function() {
  const image = document.querySelector('#image-upload');
  const inputImage = document.querySelector('#coverImageURL');

  inputImage.addEventListener('change', (e) => {
    const files = e.target.files;
    const fileImage = files[0];

    const url = URL.createObjectURL(fileImage);

    image.src = url;
  })
});
</script>