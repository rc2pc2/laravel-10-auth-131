@extends("layouts.app")

@section("content")
    <section class="p-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="fw-bold text-center">
                        Contact us!
                    </h1>
                </div>
            </div>

            <div class="row justify-content-center">
                <form action="{{ route("guest.leads.store") }}" method="POST" class="col-12 col-md-8 col-lg-6">
                    @method("POST")
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">
                            Type your name:
                        </label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">
                            Type your email:
                        </label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">
                            Type your message:
                        </label>
                        <textarea name="message" id="message" cols="30" rows="10" class="form-control">
                        </textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Send new contact
                    </button>
                </form>
            </div>

        </div>
    </section>

@endsection
