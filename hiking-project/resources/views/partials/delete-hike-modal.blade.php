<div class="btn-group" role="group" aria-label="Basic mixed styles example">
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete Hike</button>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete "{{ $hike->name }}"</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to delete this hike ?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <form id="delete-hike-form" action="{{ route('delete-hike', ['id' => $hike->id]) }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a href="{{ route('delete-hike', ['id' => $hike->id]) }}" onclick="event.preventDefault(); document.getElementById('delete-hike-form').submit();">
                <button type="button" class="btn btn-danger">Confirm Delete</button>
            </a>
        </div>
        </div>
    </div>
</div>
