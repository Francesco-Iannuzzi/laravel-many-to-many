@if (session('message'))
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>
            <i class="fa-solid fa-thumbs-up"></i>
        </strong>
        {{ session('message') }}
    </div>
@endif
