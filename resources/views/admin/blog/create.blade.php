<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blogs') }}
            <span class="float-end">
                <button class="btn btn-sm btn-primary">
                    <- Go Back </button>
            </span>
        </h2>
    </x-slot>
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
        <div class="row mt-4">
            <div class="col-6 mb-3 mx-auto">
                <div class="card shadow">
                    <div class="card-header text-center">
                        <h3>Blog Create</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('blogs.store') }}" method="POST" novalidate>
                            @csrf
                            <div class="form-floating @error('blog_title') @else mb-3 @enderror">
                                <input type="text" class="form-control @error('blog_title') is-invalid @enderror"
                                    id="blog_title" placeholder="Blog Title 1" name="blog_title">
                                <label for="blog_title">Blog Title</label>
                            </div>
                            @error('blog_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <div class="form-floating @error('blog_author') @else mb-3 @enderror">
                                <input type="text" class="form-control @error('blog_author') is-invalid @enderror"
                                    id="blog_author" placeholder="Blog Title 1" name="blog_author">
                                <label for="blog_author">Author Name</label>
                            </div>
                            @error('blog_author')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <div class="form-floating @error('blog_description') @else mb-3 @enderror">
                                <textarea type="text" class="form-control @error('blog_description') is-invalid @enderror" id="blog_description"
                                    placeholder="Blog Title 1" name="blog_description"></textarea>
                                <label for="blog_description">Blog Description</label>
                            </div>
                            @error('blog_description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <div class="form-floating @error('publish_date') @else mb-3 @enderror">
                                {{-- <input type="text" class="form-control @error('publish_date') is-invalid @enderror"
                                    id="publish_date" placeholder="Blog Title 1" name="publish_date"> --}}
                                    <input type="date" name="publish_date" id="publish_date" class="form-control" style="width: 100%; display: inline;">
                                <label for="publish_date">Publish Date</label>
                            </div>
                            @error('publish_date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <div class="form-floating @error('blog_status') @else mb-3 @enderror">
                                <select class="form-select" id="blog_status" name="blog_status">
                                    <option value="Active" selected>Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                                <label for="blog_status">Status</label>
                            </div>
                            @error('blog_status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <div class="mb-3">
                                <input type="submit" class="form-control btn btn-success btn-sm" id="blog_submit"
                                    value="Add">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
