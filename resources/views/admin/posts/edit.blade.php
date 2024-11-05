@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{ route("admin.posts.update", $post) }}" method="POST">
                    @method("PUT")
                    @csrf

                    <div class="mb-3">
                        <label for="post-title" class="form-label">Title:</label>
                        <input type="text" name="title" id="post-title" class="form-control" value="{{ old("title", $post->title) }}">
                        @error("title")
                            <div class="alert alert-warning">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="post-author" class="form-label">Author:</label>
                        <input type="text" name="author" id="post-author" class="form-control" value="{{ old("author", $post->author) }}">
                        @error("author")
                            <div class="alert alert-warning">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="post-content" class="form-label">Content:</label>
                        <textarea name="content" id="post-content" cols="30" rows="10" class="form-control">{{ old("content", $post->content) }}
                        </textarea>
                        @error("content")
                            <div class="alert alert-warning">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-lg btn-primary">Update {{ $post->title }}</button>
                    <button type="reset" class="btn btn-lg btn-warning">Reset fields</button>
                </form>
            </div>
        </div>
    </div>
@endsection
