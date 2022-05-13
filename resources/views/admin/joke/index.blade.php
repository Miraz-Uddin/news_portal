<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jokes') }}
        </h2>
    </x-slot> --}}

    <div class="container">
        <div class="row">
            <div class="col-12">
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-9">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('jokes.store') }}" method="POST" novalidate>
                            @csrf
                            <div class="form-floating @error('joke_title') @else mb-3 @enderror">
                                <input type="text" class="form-control @error('joke_title') is-invalid @enderror"
                                    id="joke_title" placeholder="Joke Title 1" name="joke_title">
                                <label for="joke_title">Joke Title</label>
                            </div>
                            @error('joke_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <div class="mb-3">
                                <input type="submit" class="form-control btn btn-success btn-sm" id="joke_submit"
                                    value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
