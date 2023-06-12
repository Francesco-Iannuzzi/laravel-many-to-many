@extends('layouts.admin')

@section('content')
    <div class="container py-5">
        @include('partials.validation_errors')

        <form action="{{ route('admin.projects.update', $project) }}" method="post" enctype="multipart/form-data"
            class="pt-3">
            @csrf

            @method('PUT')
            <h1 class="fs-4 text-secondary my-4">Edit {{ $project->title }}</h1>
            <div class="mb-5">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                    placeholder="Add title" aria-describedby="helpTitle" value="{{ old('title', $project->title) }}">
                <small id="helpTitle" class="text-muted">Insert Title of the project here</small>
            </div>

            @error('title')
                <div class="alert alert-danger" role="alert">
                    <strong>Error:</strong> {{ $message }}
                </div>
            @enderror
            {{-- form title --}}

            <div class="mb-5">
                <label for="type_id" class="form-label">Select Type</label>
                <select class="form-select @error('type_id') is-invalid @enderror" name="type_id" id="type_id">
                    <option value="">Select Types</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}"
                            {{ $type->id == old('type_id', $project->type?->id) ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            {{-- form select types --}}

            <div class='form-group mb-5'>
                <label class="form-label">Select Technologies</label>
                @foreach ($technologies as $technology)
                    <div class="form-check @error('technologies') is-invalid @enderror">
                        <label class='form-check-label'>
                            @if ($errors->any())
                                {{-- 1 (if) --}}
                                <input name="technologies[]" id="technologies[]" type="checkbox"
                                    value="{{ $technology->id }}" class="form-check-input"
                                    {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>
                            @else
                                {{-- 2 (else) --}}
                                <input name='technologies[]' type='checkbox' value='{{ $technology->id }}'
                                    class='form-check-input'
                                    {{ $project->technologies->contains($technology) ? 'checked' : '' }}>
                            @endif
                            {{ $technology->name }}
                        </label>
                    </div>
                @endforeach
                @error('technologies')
                    <div class='invalid-feedback'>{{ $message }}</div>
                @enderror
            </div>
            {{-- form check technologies --}}

            <div class="mb-5">
                <label for="made_by" class="form-label">Author</label>
                <input type="text" name="made_by" id="made_by"
                    class="form-control @error('made_by') is-invalid @enderror" placeholder="Add Author"
                    aria-describedby="helpMadeBy" value="{{ old('made_by', $project->made_by) }}">
                <small id="helpMadeBy" class="text-muted">Insert Author of the project</small>
            </div>

            @error('made_by')
                <div class="alert alert-danger" role="alert">
                    <strong>Error:</strong> {{ $message }}
                </div>
            @enderror
            {{-- form made_by --}}

            <div class="d-flex mb-5 gap-4">
                <img height="100" src="{{ asset('storage/' . $project->cover) }}" class="rounded">

                <div class="w-100">
                    <label for="cover" class="form-label">Cover</label>
                    <input type="file" name="cover" id="cover"
                        class="form-control @error('cover') is-invalid @enderror">
                    <small id="helpCover" class="text-muted">Choose Cover of the project</small>
                </div>
            </div>

            @error('cover')
                <div class="alert alert-danger" role="alert">
                    <strong>Error:</strong> {{ $message }}
                </div>
            @enderror
            {{-- form cover --}}

            <div class="mb-5">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                    aria-describedby="helpDescription" rows="3">{{ old('description', $project->description) }}</textarea>
                <small id="helpDescription" class="text-muted">Insert a Description of the project</small>
            </div>

            @error('description')
                <div class="alert alert-danger" role="alert">
                    <strong>Error:</strong> {{ $message }}
                </div>
            @enderror
            {{-- form description --}}

            <div class="mb-5">
                <label for="trace" class="form-label">Trace</label>
                <textarea class="form-control @error('trace') is-invalid @enderror" name="trace" id="trace"
                    aria-describedby="helpTrace" rows="3">{{ old('trace', $project->trace) }}</textarea>
                <small id="helpTrace" class="text-muted">Insert initial Trace of the project</small>
            </div>

            @error('trace')
                <div class="alert alert-danger" role="alert">
                    <strong>Error:</strong> {{ $message }}
                </div>
            @enderror
            {{-- form trace --}}

            <div class="mb-5">
                <label for="creation_date" class="form-label">Creation Date</label>
                <input type="date" name="creation_date" id="creation_date"
                    class="form-control @error('creation_date') is-invalid @enderror" placeholder="Add date Project"
                    aria-describedby="helpCreationDate" value="{{ old('creation_date', $project->creation_date) }}">
                <small id="helpCreationDate" class="text-muted">Insert Creation Date of the project</small>
            </div>

            @error('creation_date')
                <div class="alert alert-danger" role="alert">
                    <strong>Error:</strong> {{ $message }}
                </div>
            @enderror
            {{-- form creation_date --}}

            <div class="mb-5">
                <label for="link" class="form-label">Link</label>
                <input type="text" name="link" id="link"
                    class="form-control @error('link') is-invalid @enderror" placeholder="Add link"
                    aria-describedby="helpLink" value="{{ old('link', $project->link) }}">
                <small id="helpLink" class="text-muted">Insert Link of the project here</small>
            </div>

            @error('link')
                <div class="alert alert-danger" role="alert">
                    <strong>Error:</strong> {{ $message }}
                </div>
            @enderror
            {{-- form link --}}

            <div class="mb-5">
                <label for="code_link" class="form-label">Code's Link</label>
                <input type="text" name="code_link" id="code_link"
                    class="form-control @error('code_link') is-invalid @enderror" placeholder="Add code_link"
                    aria-describedby="helpCodeLink" value="{{ old('code_link', $project->code_link) }}">
                <small id="helpCodeLink" class="text-muted">Insert code_link of the project here</small>
            </div>

            @error('code_link')
                <div class="alert alert-danger" role="alert">
                    <strong>Error:</strong> {{ $message }}
                </div>
            @enderror
            {{-- form code_link --}}

            <button type="submit" class="btn btn-primary w-100 mt-4 py-2 px-4">Update</button>


        </form>
    </div>
@endsection
