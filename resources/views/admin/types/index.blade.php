@extends('layouts.admin')

@section('content')
    <div class="container py-5">
        @include('partials.validation_errors')
        @include('partials.session_message')

        <h1 class="fs-4 text-secondary my-4">Index Types</h1>
        <div class="row">
            <div class="col-6">
                <form action="{{ route('admin.types.store') }}" method="post">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Full Stack" aria-label="Button" name="name"
                            id="name">
                        <button class="btn btn-outline-secondary" type="submit">Add</button>
                    </div>

                </form>
            </div>
            <div class="col-6">

                <div class="table-responsive-md">
                    <table class="table table-light">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Projects Count</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($types as $type)
                                <tr class="">
                                    <td scope="row">{{ $type->id }}</td>
                                    <td>
                                        <form action="{{ route('admin.types.update', $type) }}" method="post">
                                            @csrf

                                            @method('PATCH')
                                            <div class="input-group">
                                                <span class="input-group-text" id="editInput-{{ $type->id }}">
                                                    <i class="fa-solid fa-pen-to-square"
                                                        id="editInput-{{ $type->id }}"></i>
                                                </span>
                                                <input type="text" class="form-control" name="name" id="name"
                                                    aria-describedby="editInput-{{ $type->id }}"
                                                    value="{{ $type->name }}">
                                            </div>
                                            <small>Click enter to Update the TYPE</small>
                                        </form>
                                    </td>
                                    <td>
                                        <span class="badge bg-primary">{{ $type->projects->count() }}</span>

                                    </td>
                                    <td>
                                        <form action="{{ route('admin.types.destroy', $type) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger">
                                                DELETE
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr class="">
                                    <td scope="row"> Add Types</td>
                                </tr>
                            @endforelse


                        </tbody>
                    </table>
                </div>


            </div>

        </div>
    </div>
@endsection
