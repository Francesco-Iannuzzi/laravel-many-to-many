@extends('layouts.admin')

@section('content')
    <div class="container py-5">
        @include('partials.validation_errors')
        @include('partials.session_message')

        <h1 class="fs-4 text-secondary my-4">Technologies Index</h1>
        <div class="row">
            <div class="col-6">
                <form action="{{ route('admin.technologies.store') }}" method="post">
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

                            @forelse ($technologies as $technology)
                                <tr class="">
                                    <td scope="row">{{ $technology->id }}</td>
                                    <td>
                                        <form action="{{ route('admin.technologies.update', $technology) }}" method="post">
                                            @csrf

                                            @method('PATCH')
                                            <div class="input-group">
                                                <span class="input-group-text" id="editInput-{{ $technology->id }}">
                                                    <i class="fa-solid fa-pen-to-square"
                                                        id="editInput-{{ $technology->id }}"></i>
                                                </span>
                                                <input type="text" class="form-control" name="name" id="name"
                                                    aria-describedby="editInput-{{ $technology->id }}"
                                                    value="{{ $technology->name }}">
                                            </div>
                                            <small>Click enter to Update the TECHNOLOGY</small>
                                        </form>
                                    </td>
                                    <td>
                                        <span class="badge bg-primary">{{ $technology->projects->count() }}</span>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.technologies.destroy', $technology) }}"
                                            method="post">
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
                                    <td scope="row"> Add Technologies</td>
                                </tr>
                            @endforelse


                        </tbody>
                    </table>
                </div>


            </div>

        </div>
    </div>
@endsection
