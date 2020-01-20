@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div class="pt-2">Categories</div>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#categoryCreateModal">
                                카테고리 등록
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="list-group">
                            @foreach($categories as $category)
                                <a href="#" class="list-group-item list-group-item-action" onclick="openCategoryEditModal({{ $category->id }})">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">{{ $category->name }}</h5>
                                    </div>
                                </a>
                            @endforeach
                        </div>

                        <div class="d-flex justify-content-center mt-4">
                           {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('categories.create-modal')

    @include('categories.edit-modal')

@endsection

@section('scripts')
    <script>
        function storeCategory() {
            $.ajax({
                method: "POST",
                url: "/categories",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    name: $('#createName').val(),
                },
                error: function (err) {
                    alert('잠시 후 다시 시도해 주세요.')
                    console.log(err)
                },
                success: function (res) {
                    window.location = '{{ route('categories.index') }}'
                },
            });
        }

        function deleteCategory() {
            if(confirm('Category를 삭제하시겠습니까?')) {
                $.ajax({
                    method: "DELETE",
                    url: "/categories/" + $('#editId').val(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    error: function (err) {
                        alert('잠시 후 다시 시도해 주세요.')
                        console.log(err)
                    },
                    success: function (res) {
                        window.location = '{{ route('categories.index') }}'
                    },
                })
            }
        }

        function updateCategory() {
            if(confirm('Category를 수정하시겠습니까?')) {
                var editId = $('#editId').val()

                $.ajax({
                    method: "PUT",
                    url: "/categories/" + editId,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        id: editId,
                        name: $('#editName').val(),
                    },
                    error: function (err) {
                        alert('잠시 후 다시 시도해 주세요.')
                        console.log(err)
                    },
                    success: function (res) {
                        window.location = '{{ route('categories.index') }}'
                    },
                })
            }
        }

        function openCategoryEditModal(id) {
            $.ajax({
                method: "GET",
                url: "/categories/" + id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                error: function (err) {
                    alert('잠시 후 다시 시도해 주세요.')
                    console.log(err)
                },
                success: function (res) {
                    $('#editId').val(res.id)
                    $('#editName').val(res.name)

                    $('#categoryEditModal').modal('show')
                },
            })
        }
    </script>
@endsection
