<x-layout title="Show Products">
    @include('partial.nav')

    {{-- Success Message --}}
    @if (session('success'))
        <div class="alert alert-success container my-3" role="alert">
            <strong>{{ session('success') }}</strong>
        </div>
    @endif

    {{-- Error Message --}}
    @if (session('error'))
        <div class="alert alert-danger container my-3" role="alert">
            <strong>{{ session('error') }}</strong>
        </div>
    @endif

    {{-- Main Content --}}
    <div class="container my-3">
        {{-- Add Product Button --}}
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">Add
            Product</button>

        {{-- Add Product Modal --}}
        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Add Product</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="product-name" class="col-form-label">Product Name:</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                    id="product-name">
                            </div>
                            <div class="mb-3">
                                <label for="product-price" class="col-form-label">Product Price:</label>
                                <input type="text" name="price" value="{{ old('price') }}" class="form-control"
                                    id="product-price">
                            </div>
                            <div class="mb-3">
                                <label for="product-discount" class="col-form-label">Product Discount:</label>
                                <input type="text" name="discount" value="{{ old('discount') }}" class="form-control"
                                    id="product-discount">
                            </div>
                            <div class="mb-3">
                                <select class="form-select form-select-md" name="category_id"
                                    aria-label="Small select example">
                                    <option selected disabled>Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="product-description" class="col-form-label">Description:</label>
                                <textarea class="form-control" name="description" id="product-description">{{ old('description') }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="product-image" class="col-form-label">Image:</label>
                                <input type="file" class="form-control" name="image" id="product-image">
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

        {{-- Products Table --}}
        <table class="table text-center mt-3">
            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td><img style="width: 50px; height: 50px;" src="{{ Storage::url($product->image) }}"
                                alt=""></td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->discount }}</td>
                        <td>{{ $product->category }}</td>
                        <td>{{ Str::limit($product->description, 50) }}</td>
                        <td class="d-flex align-items-center justify-content-center gap-2">
                            {{-- Update Product Button --}}
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#updateModal" data-bs-id="{{ $product->id }}"
                                data-bs-name="{{ $product->name }}" data-bs-price="{{ $product->price }}"
                                data-bs-discount="{{ $product->discount }}"
                                data-bs-category="{{ $product->category }}"
                                data-bs-description="{{ $product->description }}">
                                Update
                            </button>

                            {{-- Delete Product Button --}}
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal" data-bs-id="{{ $product->id }}"
                                data-bs-name="{{ $product->name }}">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Delete All Button --}}
        @if (!$products->isEmpty())
            <button type="submit" class="btn btn-danger w-100" data-bs-toggle="modal"
                data-bs-target="#deleteAllModal">Delete All</button>
        @endif

        {{-- Delete Product Modal --}}
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="deleteModalLabel">Delete Product</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this product?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <form action="" method="POST" id="delete-product-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Delete All Products Modal --}}
        <div class="modal fade" id="deleteAllModal" tabindex="-1" aria-labelledby="deleteAllModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="deleteAllModalLabel">Delete All Products</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete all products?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <!-- Delete All Products Button -->
                        <form action="{{route('products.deleteall')}}" method="POST">
                            @csrf
                            {{-- @method('delete') --}}
                            {{-- <input type="hidden" name="_method" value="DELETE"> --}}
                            <button type="submit" class="btn btn-danger w-100">Delete All Products</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        {{-- Update Product Modal --}}
        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="updateModalLabel">Update Product</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="update-product-form" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="update-product-name" class="col-form-label">Product Name:</label>
                                <input type="text" name="name" class="form-control" id="update-product-name">
                            </div>
                            <div class="mb-3">
                                <label for="update-product-price" class="col-form-label">Product Price:</label>
                                <input type="text" name="price" class="form-control" id="update-product-price">
                            </div>
                            <div class="mb-3">
                                <label for="update-product-discount" class="col-form-label">Product Discount:</label>
                                <input type="text" name="discount" class="form-control"
                                    id="update-product-discount">
                            </div>
                            <div class="mb-3">
                                <select class="form-select form-select-md" name="category_id"
                                    aria-label="Small select example">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="update-product-description" class="col-form-label">Description:</label>
                                <textarea class="form-control" name="description" id="update-product-description"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="update-product-image" class="col-form-label">Image:</label>
                                <input type="file" class="form-control" name="image" id="update-product-image">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal Event Handlers --}}
        <script>
            const updateModal = document.getElementById('updateModal');
            if (updateModal) {
                updateModal.addEventListener('show.bs.modal', event => {
                    const button = event.relatedTarget;
                    const id = button.getAttribute('data-bs-id');
                    const name = button.getAttribute('data-bs-name');
                    const price = button.getAttribute('data-bs-price');
                    const category = button.getAttribute('data-bs-category');
                    const discount = button.getAttribute('data-bs-discount');
                    const description = button.getAttribute('data-bs-description');

                    const options = updateModal.querySelectorAll('.form-select option');
                    options.forEach(option => {
                        option.selected = option.innerHTML === category;
                    });

                    const form = updateModal.querySelector('#update-product-form');
                    form.setAttribute('action', "{{ route('products.update', ':id') }}".replace(':id', id));

                    updateModal.querySelector('#update-product-name').value = name;
                    updateModal.querySelector('#update-product-price').value = price;
                    updateModal.querySelector('#update-product-discount').value = discount;
                    updateModal.querySelector('#update-product-description').textContent = description;
                });
            }

            const deleteModal = document.getElementById('deleteModal');
            if (deleteModal) {
                deleteModal.addEventListener('show.bs.modal', event => {
                    const button = event.relatedTarget;
                    const id = button.getAttribute('data-bs-id');
                    const name = button.getAttribute('data-bs-name');

                    const form = deleteModal.querySelector('#delete-product-form');
                    form.setAttribute('action', "{{ route('products.destroy', ':id') }}".replace(':id', id));

                    deleteModal.querySelector('.modal-title').textContent = `Delete ${name}`;
                });
            }
        </script>
    </div>
</x-layout>
