@extends("admin.posts.layouts.create-or-edit")

@section("form-action")
    {{ route("admin.posts.update", $post) }}
@endsection

@section("form-method")
    @method("PUT")
@endsection

@section("form-title")
    Updating {{ $post->title }}
@endsection
