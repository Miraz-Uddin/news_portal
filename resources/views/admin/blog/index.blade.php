<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blogs') }}
            <span class="float-end">
                <a href="{{ route('blogs.create') }}" class="btn btn-sm btn-primary">Add New +</a>
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
        <div class="row">
            <div class="col-12 mb-3">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Publishing Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Created</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogs as $blog)
                                    <tr>
                                        <th scope="row">
                                            {{ $blogs->firstItem()+$loop->index }}
                                        </th>
                                        <td>
                                            @if (!is_null($blog->blog_title))
                                                {{ $blog->blog_title }}
                                            @else
                                                - -
                                            @endif
                                        </td>
                                        <td>
                                            @if (!is_null($blog->blog_author))
                                                {{ $blog->blog_author }}
                                            @else
                                                - -
                                            @endif

                                        </td>
                                        <td>
                                            @if (!is_null($blog->publish_date))
                                                {{ Carbon\Carbon::parse($blog->publish_date)->toDateString() }}
                                            @else
                                                - -
                                            @endif
                                        </td>
                                        <td>
                                            @if (!is_null($blog->blog_status))
                                                {{ $blog->blog_status }}
                                            @else
                                                - -
                                            @endif
                                        </td>
                                        <td>
                                            @if(!is_null($blog->created_at))
                                                {{Carbon\Carbon::parse($blog->created_at)->diffForHumans()}}
                                                @else
                                                - -
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-outline-info btn-sm">Edit</button>
                                            <button type="button" class="btn btn-outline-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $blogs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
