@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="py-3 fw-bold text-center">
                    Post list:
                </h1>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <a href="{{ route("admin.posts.create") }}" class="btn btn-primary btn-lg">
                        Create new post
                    </a>
                </div>
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Author</th>
                            <th scope="col">Title</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ( $posts as $index => $post )
                        <tr>
                            <td>
                                {{ $post->id }}
                            </td>
                            <td>
                                {{ $post->author }}
                            </td>
                            <td>
                                {{ $post->title }}
                            </td>
                            <td>
                                <a href="{{ route("admin.posts.show", $post) }}" class="btn btn-sm btn-primary me-2">Show</a>
                                {{-- <a href="{{ route("post.edit", $post->id) }}"  class="btn btn-sm btn-success me-2">Edit</a> --}}

                                {{-- <form class="d-inline env-destroyer" action="{{ route("admin.posts.delete", $post->id) }}" method="POST" custom-data-name="{{ $post->name }}" >
                                    @method("DELETE")
                                    @csrf

                                    <button type="submit" class="btn btn-sm btn-warning me-2">
                                        Delete
                                    </button>
                                </form> --}}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">No post are available at the moment...</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section("additional-scripts")
    @vite("resources/js/posts/delete-confirmation.js");
@endsection
