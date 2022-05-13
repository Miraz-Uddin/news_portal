<x-app-layout>
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
            <div class="col-md-12 col-lg-9 mb-3">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Joke Title</th>
                                    <th scope="col">Stored</th>
                                    <th scope="col">Edited</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jokes as $joke)
                                <tr>
                                    <th scope="row">
                                      {{ $jokes->firstItem()+$loop->index }}
                                    </th>
                                    <td>
                                      @if(!is_null($joke->joke_title))
                                        {{$joke->joke_title}}
                                        @else
                                        - -
                                      @endif
                                    </td>
                                    <td>
                                      @if(!is_null($joke->created_at))
                                        {{$joke->created_at->diffForHumans()}}
                                        @else
                                        - -
                                      @endif
                                    </td>
                                    <td>
                                      @if(!is_null($joke->updated_at))
                                        {{$joke->updated_at}}
                                        @else
                                        - - 
                                      @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $jokes->links() }}
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-3 mb-3">
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
                                    value="Add Joke">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
