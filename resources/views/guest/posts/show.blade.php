@extends("layouts.app")

@section("content")
    <section class="container">
        <div class="row">
            <div class="col-12 p-4">
                <h1 class="fw-bold">
                    {{ $post->title }}
                </h1>
                <h2 class="">
                    {{ $post->author }}
                </h2>
                <p class="fs-4">
                    {{ $post->content }}
                </p>
            </div>
        </div>
    </section>
@endsection
