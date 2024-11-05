@extends("admin.posts.layouts.create-or-edit")

@section("form-action")
    {{ route("admin.posts.store") }}
@endsection

@section("form-method")
    @method("POST")
@endsection

@section("form-title")
    Create new post
@endsection
