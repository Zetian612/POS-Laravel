    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('inventory.products.store') }}" method="POST" id="formAdd" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control form-control-border" id="name" name="name"
                                placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select class="form-control form-control-border" id="category_id" name="category_id" required>
                                <option>Select...</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control form-control-border" id="description" name="description" rows="3"
                                placeholder="Enter description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control form-control-border" id="price" name="price"
                                placeholder="Enter price">
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" id="image" name="image" accept="image/png">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal edit -->
@push('scripts')
<script>
    $(function () {
    // $.validator.setDefaults({
    //     submitHandler: function () {
    //     alert( "Form successful submitted!" );
    //     }
    // });
    $('#formAdd').validate({
        rules: {
        name: {
            required: true,
            minlength: 2,
            maxlength: 40
        },
        description: {
            required: true,
            minlength: 10,
            maxlength: 100

        },
        price: {
            required: true,
            min: 0,
        },
        },
        messages: {
        name: {
            required: "Please enter a name",
            minlength: "Your name must consist of at least 2 characters",
            maxlength: "Your name must consist of at most 40 characters"
        },
        description: {
            required: "Please provide a description",
            minlength: "Your description must be at least 10 characters long",
            maxlength: "Your description must be at most 100 characters long"
        },
        price: {
            required: "Please enter a price",
            minlegth: "Please enter a price greater than 0",
        }  
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
        }
    });
    });
</script>
@endpush