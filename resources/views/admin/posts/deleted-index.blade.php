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

                @include("partials.session-message")

                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Author</th>
                            <th scope="col">Tags</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ( $posts as $index => $post )
                        <tr>
                            <td>
                                {{ $post->id }}
                            </td>
                            <td>
                                {{ $post->title }}
                            </td>
                            <td>
                                @if(isset($post->category))
                                    {{ $post->category->name }}
                                @else
                                    No category
                                @endif
                            </td>
                            <td>
                                {{ $post->user->name }}
                            </td>
                            <td>
                                @forelse ($post->tags as $tag)
                                    <span class="badge text-bg-primary">
                                        #{{ strtolower($tag->name) }}
                                    </span>
                                @empty
                                    <span>No tags</span>
                                @endforelse
                                {{-- {{ $post->tags }} --}}
                            </td>
                            <td>
                                <a href="{{ route("admin.posts.show", $post) }}" class="btn btn-sm btn-primary me-1">Show</a>
                                <form class="d-inline post-destroyer" action="{{  route("admin.posts.restore", $post) }}" method="POST" custom-data-name="{{ $post->title }}" >
                                    @method("PATCH")
                                    @csrf

                                    <button type="submit" class="btn btn-sm btn-warning me-1">
                                        Restore
                                    </button>
                                </form>

                                <form class="d-inline post-destroyer" action="{{ route("admin.posts.force-delete", $post) }}" method="POST" custom-data-name="{{ $post->title }}" >
                                    @method("DELETE")
                                    @csrf

                                    <button type="submit" class="btn btn-sm btn-danger me-2">
                                        Permanent Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">No soft-removed posts are available at the moment...</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <div>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section("additional-scripts")
    @vite("resources/js/posts/delete-confirmation.js");
@endsection
