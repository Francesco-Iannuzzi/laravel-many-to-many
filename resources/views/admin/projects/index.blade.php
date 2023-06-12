@extends('layouts.admin')

@section('content')
    <div class="container py-5">
        @include('partials.session_message')

        <div class="table-responsive pt-3">
            <div class="d-flex justify-content-between">
                <h1 class="fs-4 text-secondary my-4">Projects</h1>
                <a href="{{ route('admin.projects.create') }}" class="btn btn-dark align-self-center">
                    <i class="fa-solid fa-plus px-3"></i>New Project
                </a>
            </div>
            <table class="table table-striped table-hover table-borderless table-primary align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Cover</th>
                        <th>Made By</th>
                        <th>Title</th>
                        <th>Link</th>
                        <th>Code Link</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @forelse ($projects as $project)
                        <tr class="table-light">
                            <td scope="row">{{ $project->id }}</td>
                            <td>
                                <img height="100" src="{{ asset('storage/' . $project->cover) }}"
                                    alt="{{ $project->title }}">
                            </td>
                            <td>{{ $project->made_by }}</td>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->link }}</td>
                            <td>{{ $project->code_link }}</td>
                            <td>
                                <div class="d-flex gap-1 px-2">

                                    <a href="{{ route('admin.projects.show', $project) }}" class="btn text-dark">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    {{-- view project --}}

                                    <a href="{{ route('admin.projects.edit', $project->slug) }}" class="btn text-dark">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    {{-- edit project --}}

                                    <!-- Modal trigger button -->
                                    <button type="button" class="btn text-danger" data-bs-toggle="modal"
                                        data-bs-target="#modal-{{ $project->id }}">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>

                                    <!-- Modal Body -->
                                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                    <div class="modal fade" id="modal-{{ $project->id }}" tabindex="-1"
                                        data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                        aria-labelledby="modalTitle-{{ $project->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalTitle-{{ $project->id }}">
                                                        Delete Project
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you shure you want to delete<br>
                                                    <strong>{{ $project->title }}</strong>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <form action="{{ route('admin.projects.destroy', $project) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">
                                                            DELETE
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- delete project --}}

                                </div>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td scope="row">
                                There is no project yet
                                <i class="fa-solid fa-face-frown"></i>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $projects->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
