@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card mt-5 mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ $project->cover }}" class="img-fluid rounded" alt="{{ $project->title }}">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="card-top">
                            <h2 class="card-title">{{ $project->title }}</h2>
                            <h5><strong>Author: </strong>{{ $project->made_by }}</h5>
                            <small><strong>Date: </strong>{{ $project->creation_date }}</small>
                            <div class="meta">
                                <span class="badge bg-primary">{{ $project->type?->name }}</span>
                            </div>
                        </div>
                        <div class="card-bottom">
                            <p class="card-text"><strong>Description: </strong>{{ $project->description }}</p>
                            <p class="card-text"><strong>Trace: </strong>{{ $project->trace }}</p>
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
