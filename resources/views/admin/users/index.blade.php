@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="py-3 fw-bold text-center">
                    User list:
                </h1>
            </div>
            <div class="col-12">
                    {{-- <div class="mb-3">
                        <a href="{{ route("admin.posts.create") }}" class="btn btn-primary btn-lg">
                            Create new post
                        </a>
                    </div> --}}
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Mail</th>
                            {{-- <th scope="col">Number of posts</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ( $users as $index => $user )
                        <tr>
                            <td>
                                {{ $user->id }}
                            </td>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            {{-- <td>
                                {{ count($user->posts) }}
                            </td> --}}
                            {{-- <td>
                                <a href="{{ route("admin.posts.show", $post) }}" class="btn btn-sm btn-primary me-1">Show</a>
                                <a href="{{ route("admin.posts.edit", $post) }}"  class="btn btn-sm btn-success me-1">Edit</a>

                                <form class="d-inline post-destroyer" action="{{ route("admin.posts.destroy", $post) }}" method="POST" custom-data-name="{{ $post->title }}" >
                                    @method("DELETE")
                                    @csrf

                                    <button type="submit" class="btn btn-sm btn-warning me-2">
                                        Delete
                                    </button>
                                </form>
                            </td> --}}
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">No users are available at the moment...</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                {{-- <div>
                    {{ $posts->links() }}
                </div> --}}
            </div>
        </div>
    </div>
@endsection

@section("additional-scripts")
    @vite("resources/js/posts/delete-confirmation.js");
@endsection
