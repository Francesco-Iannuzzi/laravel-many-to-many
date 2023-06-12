@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card mt-5 mb-3 shadow">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('storage/' . $project->cover) }}" class="img-fluid rounded" alt="{{ $project->title }}">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="card-top">
                            <div>
                                <h2 class="card-title">{{ $project->title }}</h2>
                                <h5><strong>Author: </strong>{{ $project->made_by }}</h5>
                                <small><strong>Date: </strong>{{ $project->creation_date }}</small>
                            </div>

                            <div class="badge_types">
                                <span class="badge bg-primary">{{ $project->type?->name }}</span>
                            </div>

                            @foreach ($project->technologies as $technology)
                                <div class="badge_technologies">
                                    <span class="badge bg-secondary">
                                        {{ $technology->name }}
                                    </span>
                                </div>
                            @endforeach

                        </div>
                        <div class="card-bottom">
                            <div>
                                <p class="card-text"><strong>Description: </strong>{{ $project->description }}</p>
                                <p class="card-text"><strong>Trace: </strong>{{ $project->trace }}</p>
                            </div>
                            <div class="btn-group">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="triggerId"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Links
                                </button>
                                <div class="dropdown-menu dropdown-menu-start" aria-labelledby="triggerId">
                                    <a class="dropdown-item" href="{{ $project->link }}">Link</a>
                                    <a class="dropdown-item" href="{{ $project->code_link }}">Code's Link</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
