@extends("layouts.app")

@section("content")
<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="@yield("form-action")" method="POST" enctype="multipart/form-data">
                @yield("form-method")
                @csrf

                <div class="mb-3">
                    <h1 class="text-center fw-bold">
                        @yield("form-title")
                    </h1>
                </div>

                <div class="mb-3">
                    <label for="post-title" class="form-label">Post Title:</label>
                    <input type="text" name="title" id="post-title" class="form-control" value="{{ old("title", $post->title) }}">
                    @error("title")
                        @include("partials.single-name-error-message")
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="post-category_id" class="form-label">Category:</label>
                    <select name="category_id" id="post-category_id" class="form-control">
                        {{-- <option value="">Select a category</option> --}}
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{-- ! guarda che quando la option che stai scrivendo --}}
                                    @if($category->id == old("category_id", $post->category_id))
                                        selected
                                    @endif
                                >
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>

                    @error("category_id")
                        @include("partials.single-name-error-message")
                    @enderror
                </div>

                <div class="mb-3 ">
                    <label for="post-tags" class="form-label">Tags:</label>
                    @foreach ( $tags as $tag )
                        <div class="form-check">

                            <input type="checkbox" name="tags[]" id="post-tags" class="form-check-input" value="{{ $tag->id }}"
                                    {{-- @if( in_array($tag->id, old("tags", $post->tags->pluck("id")->toArray())))
                                        checked
                                    @endif --}}
                                    @checked(in_array($tag->id, old("tags", $post->tags->pluck("id")->toArray())))
                                >
                            <label type="checkbox" name="tags[]" id="post-tags" class="form-check-label">
                                {{ $tag->name  }}
                            </label>
                        </div>
                    @endforeach


                    @error("tags")
                        @include("partials.single-name-error-message")
                    @enderror

                    @error("tags.*")
                        @include("partials.single-name-error-message")
                    @enderror
                </div>

                <div class="mb-3">
                    <input type="file" name="image" id="post-image" class="form-control">

                    @error("image")
                        @include("partials.single-name-error-message")
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="post-content" class="form-label">Content:</label>
                    <textarea name="content" id="post-content" cols="30" rows="10" class="form-control">{{ old("content", $post->content) }}</textarea>
                    @error("content")
                        @include("partials.single-name-error-message")
                    @enderror
                </div>

                <button type="submit" class="btn btn-lg btn-primary">@yield("form-title")</button>
                <button type="reset" class="btn btn-lg btn-warning">Reset fields</button>
            </form>
        </div>
    </div>
</div>
@endsection
