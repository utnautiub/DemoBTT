@extends('layouts.app')

@section('title', 'Books')

@section('content')

@if (session('success'))
<div class="alert alert-success" id="success-alert">
  {{ session('success') }}
</div>
@endif



<a href="{{route('books.create')}}">
  <button type="button" class="btn btn-success">Add New book</button>
</a>

<table class="table text-center">
  <thead>
    <tr>
      <th scope="col">bookID</th>
      <th scope="col">title</th>
      <th scope="col">author</th>
      <th scope="col">genre</th>
      <th scope="col">publicationYear</th>
      <th scope="col">ISBN</th>
      <th scope="col">Image</th>
      <th scope="col">coverImageURL</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($books as $book)

    <tr>
      <td>{{$book->bookID}}</td>
      <td>{{$book->title}}</td>
      <td>{{$book->author}}</td>
      <td>{{$book->genre}}</td>
      <td>{{$book->publicationYear}}</td>
      <td>{{$book->ISBN}}</td>
      <td>
        <img src="{{ asset('/storage/' . $book->coverImageURL) }}" alt="Ảnh" class="img-fluid" width="80px"
          height="80px" onerror="handleImageError(this)">
      </td>
      <td>{{$book->coverImageURL}}</td>
      <td class="long-column">
        <a href="{{ route('books.show', $book->bookID) }}" class="btn btn-secondary btn-sm"><i
            class="fa-solid fa-eye"></i></a>
        <a href="{{ route('books.edit', $book->bookID) }}" class="btn btn-primary btn-sm"><i
            class="fa-solid fa-pen-to-square"></i></a>
        <button type="button" class="btn btn-danger btn-sm fs-7" data-bs-toggle="modal"
          data-bs-target="#deleteModal-{{ $book->bookID }}">
          <i class="fa-solid fa-trash"></i>
        </button>
      </td>
      <!-- model delete -->
      <!-- Modal -->
      <div class="modal fade" id="deleteModal-{{ $book->bookID }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Delete Confirmation</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Are you sure you want to delete the book with id {{ $book->bookID }}?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <form action="{{ route('books.destroy', $book->bookID) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </tr>
    @endforeach
  </tbody>
</table>

{{ $books->links() }}

@endsection

<script>
function handleImageError(image) {
  image.onerror = null; // Ngăn chặn việc gọi lại nếu xảy ra lỗi lần thứ hai
  image.src = "{{ asset('/img/error.PNG')}}";
}
</script>