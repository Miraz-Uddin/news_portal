<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users List') }}
        </h2>
    </x-slot>
    <div class="container">
        <div class="row">
            <div class="col-12 mb-3">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <th scope="row">
                                      {{ $users->firstItem()+$loop->index }}
                                    </th>
                                    <td>
                                      @if(!is_null($user->name))
                                        {{$user->name}}
                                        @else
                                        - -
                                      @endif
                                    </td>
                                    <td>
                                      @if(!is_null($user->email))
                                        {{$user->email}}
                                        @else
                                        - -
                                      @endif
                                    </td>
                                    <td>
                                      @if(!is_null($user->created_at))
                                        {{$user->created_at->diffForHumans()}}
                                        @else
                                        - -
                                      @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
