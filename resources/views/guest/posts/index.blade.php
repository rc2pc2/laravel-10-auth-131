@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="py-3 fw-bold text-center">
                    Latest Posts:
                </h1>
            </div>
            <div class="col-12">
                <div class="row justify-content-center">
                    @forelse ( $posts as $index => $post )
                    <div class="col-12 mb-5 card">
                        <div class="card-body">

                            <h2 class="card-title">
                                {{ $post->id }} -
                                {{ $post->title }}
                            </h2>
                            <h3 class="card-subtitle">
                                {{ $post->author }}
                            </h3>
                            <p class="card-text">
                                {{ $post->content }}
                            </p>

                            <a href="{{ route("guest.posts.show", $post) }}" class="btn btn-outline-primary">Read more...</a>
                        </div>
                    </div>

                    @empty
                    <div class="col-12">
                        <h2>
                            No post are available at the moment...
                        </h2>
                    </div>
                    @endforelse
                </div>

                <div>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
