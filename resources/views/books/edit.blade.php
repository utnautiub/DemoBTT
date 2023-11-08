@extends('layouts.app')

@section('title', 'Edit Author')


@section('content')

@foreach ($errors->all() as $error)
<div class="alert alert-danger">{{ $error }}</div>
@endforeach

<div class="row justify-content-center mt-3">
  <div class="col-md-7">

    <div class="card">
      <div class="card-header">
        <div class="float-start">
          Edit Book Information
        </div>
        <div class="float-end">
          <a href="{{ route('books.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
        </div>
      </div>
      <div class="card-body">
        <form action="{{ route('books.update', $book->bookID) }}" enctype="multipart/form-data" method="post">
          @csrf
          {{csrf_field()}}
          @method("PUT")

          <div class="row">
            <div class="col-4 frame">
              <img id="image-upload" src="{{asset('/storage/'.$book->coverImageURL)}}" alt="Ảnh" class="img-fluid">
            </div>
            <div class="col-8">
              <div class="mb-3 row">
                <label for="id" class="col-md-3 col-form-label text-md-end text-start">bookID</label>
                <div class="col-md-7">
                  <input type="text" class="form-control @error('id') is-invalid @enderror" id="bookID" name="bookID"
                    value="{{ $book->bookID }}" readonly>
                </div>
              </div>

              <div class="mb-3 row">
                <label for="bookName" class="col-md-3 col-form-label text-md-end text-start">title</label>
                <div class="col-md-7">
                  <input type="text" class="form-control @error('bookName') is-invalid @enderror" id="title"
                    name="title" value="{{ $book->title }}">
                </div>
              </div>

              <div class="mb-3 row">
                <label for="bookYear" class="col-md-3 col-form-label text-md-end text-start">author</label>
                <div class="col-md-7">
                  <input type="text" class="form-control @error('bookYear') is-invalid @enderror" id="author"
                    name="author" value="{{ $book->author }}">
                </div>
              </div>

              <div class="mb-3 row">
                <label for="authorId" class="col-md-3 col-form-label text-md-end text-start">genre</label>
                <div class="col-md-7">
                  <input type="text" class="form-control @error('authorId') is-invalid @enderror" id="genre"
                    name="genre" value="{{ $book->genre }}">
                </div>
              </div>

              <div class="mb-3 row">
                <label for="authorId" class="col-md-3 col-form-label text-md-end text-start">publicationYear</label>
                <div class="col-md-7">
                  <input type="text" class="form-control @error('authorId') is-invalid @enderror" id="publicationYear"
                    name="publicationYear" value="{{ $book->publicationYear }}">
                </div>
              </div>

              <div class="mb-3 row">
                <label for="authorId" class="col-md-3 col-form-label text-md-end text-start">ISBN</label>
                <div class="col-md-7">
                  <input type="text" class="form-control @error('authorId') is-invalid @enderror" id="ISBN" name="ISBN"
                    value="{{ $book->ISBN }}">
                </div>
              </div>

              <div class="mb-3 row">
                <label for="authorId" class="col-md-3 col-form-label text-md-end text-start">coverImageURL</label>
                <div class="col-md-7">
                  <input type="file" accept="image/jpeg, image/png, image/svg, image/gif" id="coverImageURL"
                    name="coverImageURL">
                  <p>accept: jpeg, png</p>
                </div>
              </div>
            </div>
          </div>

          <div class="mb-3 row">
            <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update">
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