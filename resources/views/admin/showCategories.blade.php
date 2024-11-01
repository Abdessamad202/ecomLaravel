<x-layout title="Show Categories">
    @include('partial.nav')

    {{-- Success Message --}}
    @session('success')
    <div class="alert alert-success container my-3" role="alert">
        <strong>{{$value}}</strong>
    </div>
@endsession
    {{-- Error Message --}}
    @session('error')
    <div class="alert alert-danger container my-3" role="alert">
        <strong>{{$value}}</strong>
    </div>
@endsession
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="container my-3">
        {{-- Add Category Button --}}
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">
            Add Category
        </button>

        {{-- Add Category Modal --}}
        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Add Category</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="category-name" class="col-form-label">Category Name:</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                    id="category-name">
                            </div>
                            <div class="mb-3">
                                <label for="category-description" class="col-form-label">Category Description:</label>
                                <textarea class="form-control" name="description" id="category-description">{{ old('description') }}</textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Categories Table --}}
        <table class="table text-center mt-3">
            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ Str::limit($category->description, 50) }}</td>
                        <td class="d-flex align-items-center justify-content-center gap-2">
                            {{-- Update Category Button --}}
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#updateModal" data-bs-id="{{ $category->id }}"
                                data-bs-name="{{ $category->name }}"
                                data-bs-description="{{ $category->description }}">Update
                            </button>

                            {{-- Delete Category Button --}}
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal" data-bs-id="{{ $category->id }}"
                                data-bs-name="{{ $category->name }}">Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if (!$categories->isEmpty())
            <button type="submit" class="btn btn-danger w-100" data-bs-toggle="modal"
                data-bs-target="#deleteAllModal">Delete All</button>
        @endif

        {{-- Delete Category Modal --}}
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="deleteModalLabel">Delete Category</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">Do you want to delete this item?</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <form id="delete"  method="POST">
                            @csrf
                            @method('DELETE')
                            {{-- <input type="hidden" name="id" id="delete"> --}}
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Delete All Categories Modal --}}
        <div class="modal fade" id="deleteAllModal" tabindex="-1" aria-labelledby="deleteAllModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="deleteAllModalLabel">Delete All Categories</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">Do you want to delete all categories?</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <form action="{{ route('categories.deleteAll') }}" method="POST">
                            @csrf
                            {{-- @method('DELETE')i --}}
                            <button type="submit" class="btn btn-danger w-100">Delete All</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Update Category Modal --}}
        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="updateModalLabel">Update Category</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="update" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="update-category-name" class="col-form-label">Category Name</label>
                                <input type="text" name="name" class="form-control" id="update-category-name">
                            </div>
                            <div class="mb-3">
                                <label for="update-category-description" class="col-form-label">Category
                                    Description:</label>
                                <textarea class="form-control" name="description" id="update-category-description"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <input type="hidden" id="update-category-id" name="id">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Populate Update Modal
const updateModal = document.getElementById('updateModal');
if (updateModal) {
    updateModal.addEventListener('show.bs.modal', event => {
        const button = event.relatedTarget;  // Button that triggered the modal
        const id = button.getAttribute('data-bs-id');  // Extract info from data-bs-* attributes
        const name = button.getAttribute('data-bs-name');
        const description = button.getAttribute('data-bs-description');

        // Set the form action to update route with category id
        updateModal.querySelector('#update').setAttribute("action", "{{ route('categories.update', ':id') }}".replace(':id', id));

        // Update modal title with category name
        updateModal.querySelector('.modal-title').textContent = `Update Category: ${name}`;

        // Fill in the form fields with the current category data
        updateModal.querySelector('#update-category-id').value = id;
        updateModal.querySelector('#update-category-name').value = name;
        updateModal.querySelector('#update-category-description').textContent = description;
    });
}

// Populate Delete Modal
const deleteModal = document.getElementById('deleteModal');
if (deleteModal) {
    deleteModal.addEventListener('show.bs.modal', event => {
        const button = event.relatedTarget;  // Button that triggered the modal
        const id = button.getAttribute('data-bs-id');  // Extract info from data-bs-* attributes
        const name = button.getAttribute('data-bs-name');

        // Set the form action to delete route with category id
        deleteModal.querySelector('#delete').setAttribute("action", "{{ route('categories.destroy', ':id') }}".replace(':id', id));

        // Update modal title with category name
        deleteModal.querySelector('.modal-title').textContent = `Delete Category: ${name}`;
    });
}

        </script>
    </div>
</x-layout>
