@extends("layouts.app")

@section("content")
    <section class="container">
        <div class="row">
            <div class="col-12 p-4">

                <h1 class="fw-bold">
                    {{ $post->title }}
                </h1>

                <img width="300" src="{{ asset("/storage/" . $post->image) }}" alt="{{ $post->title }}'s image">

                <h2 class="">
                    {{ $post->category->name }}
                </h2>
                <h3 class="">
                    {{ $post->user->name }} - {{ $post->user->email }}
                </h3>
                <h4>
                    @forelse ($post->tags as $tag)
                    <span class="badge text-bg-primary">
                        #{{ strtolower($tag->name) }}
                    </span>
                    @empty
                        <span>No tags</span>
                    @endforelse
                </h4>
                <p class="fs-4">
                    {{ $post->content }}
                </p>
            </div>
        </div>
    </section>
@endsection
