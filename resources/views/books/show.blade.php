@extends('layouts.app')

@section('title', 'Show Book')


@section('content')


<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Show Book Information
                </div>
                <div class="float-end">
                    <a href="{{ route('books.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">  
                <div class="row">
                    <div class="col-4 frame">
                        <img src="{{asset('/storage/'.$book->coverImageURL)}}" alt="Ảnh" class="img-fluid">
                    </div>
                    <div class="col-8">
                        <div class="mb-3 row">
                            <label for="id" class="col-md-4 col-form-label text-md-end text-start">bookID:</label>
                            <div class="col-md-6">                            
                                <input type="text" class="form-control" id="bookID" value="{{ $book->bookID }}" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="title" class="col-md-4 col-form-label text-md-end text-start">title</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="title" value="{{ $book->title }}" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="author" class="col-md-4 col-form-label text-md-end text-start">author</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="author" value="{{ $book->author }}" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="genre" class="col-md-4 col-form-label text-md-end text-start">genre</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="genre" value="{{ $book->genre }}" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="publicationYear" class="col-md-4 col-form-label text-md-end text-start">publicationYear</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="publicationYear" value="{{ $book->publicationYear }}" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="ISBN" class="col-md-4 col-form-label text-md-end text-start">ISBN</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="ISBN" value="{{ $book->ISBN }}" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="coverImageURL" class="col-md-4 col-form-label text-md-end text-start">coverImageURL</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="coverImageURL" value="{{ $book->coverImageURL }}" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="updated_at" class="col-md-4 col-form-label text-md-end text-start">Updated At</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="updated_at" value="{{ $book->updated_at }}" readonly>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>


@endsection

