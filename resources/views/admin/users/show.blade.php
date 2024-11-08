@extends("layouts.app")

@section("content")
    <section class="container">
        <div class="row">
            <div class="col-12 p-4">
                <h1 class="fw-bold">
                    {{ $user->name }}
                </h1>
                <h2 class="">
                    {{ $user->email }}
                </h2>
                <h3 class="">
                    {{ $user->id }}
                </h3>
                <h4>
                    {{  $user->userDetail->country }} - {{  $user->userDetail->city }}
                </h4>
                <img src="{{ $user->userDetail->image }}" alt="">
                <p>
                    {{  $user->userDetail->bio }}
                </p>
            </div>
            {{-- <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <h2 class="py-5">
                            Posts from this user:
                        </h2>
                    </div>
                    @foreach ($user->posts as $post )
                        <div class="col-12 p-4">
                            <h1 class="fw-bold">
                                {{ $post->title }}
                            </h1>
                            <h2 class="fw-bold">
                                {{ $post->user->name }}
                            </h2>
                            <p class="fs-4">
                                {{ $post->content }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div> --}}
        </div>
    </section>
@endsection
