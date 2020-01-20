@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div class="pt-2">Categories</div>
                                {{--<div>--}}
                                {{--    <a href="{{ route('categories.create') }}" class="btn btn-primary text-white">카테고리 등록</a>--}}
                                {{--</div>--}}
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                카테고리 등록
                            </button>
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Category 등록</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card">
                                                <div class="card-header">Category 등록</div>
                                                <div class="card-body">
                                                    <form method="POST" action="{{ route('categories.store') }}">
                                                        @csrf

                                                        <div class="form-group row">
                                                            <label for="name" class="col-sm-2 col-form-label">New Category</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">

                                                                    @error('name')
                                                                    <span class="text-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror

                                                            </div>
                                                        </div>

                                                        <div class="d-flex justify-content-center mt-4">
                                                            <button type="button" class="btn btn-outline-primary w-50 mt-4" onclick="addCategory()">등록</button>
                                                            <button type="button" class="btn btn-outline-secondary w-50 mt-4" data-dismiss="modal">취소</button>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            {{--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                                            {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="list-group">
                            @foreach($categories as $category)
{{--                                <a href="{{ route('categories.show', $category->id) }}" class="list-group-item list-group-item-action">--}}
{{--                                <a href="#" openEditCategoryModal({{ $category->id }})></a>--}}
                                    <a href="#" class="list-group-item list-group-item-action" onclick="openEditCategoryModal({{ $category->id }})">
                                    <div class="d-flex w-100 justify-content-between">

                                            <h5 class="mb-1">{{ $category->id }}. {{ $category->name }}</h5>
                                                {{--<a href="{{ route('categories.edit', $category->id)}}" class="btn btn-outline-success row-6">수정</a>--}}
                                                {{--<a><button type="button" class="btn btn-success w-100 mt-4" onclick="editCategory()">수정</button></a>--}}

{{--                                                <div>--}}
{{--                                                    <button type="button" class="btn btn-success w-100 mt-4" data-toggle="modal" onclick="openEditCategoryModal({{ $category->id }})">--}}
{{--                                                        수정--}}
{{--                                                    </button>--}}
{{--                                                </div>--}}
                                            {{--<form method="POST" action="{{ route('categories.destroy', $category->id) }}" class="row-6">--}}
                                            {{--    @csrf--}}
                                            {{--    @method('delete')--}}
                                            {{--    <button type="submit" class="btn btn-outline-danger w-120" onclick="deleteCategory({{ $category->id }})">삭제</button>--}}
                                            {{--</form>--}}
                                    </div>
                                </a>
                            @endforeach

                                <div class="modal fade" id="exampleModaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Category 수정</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card">
                                                    <div class="card-header">Category 수정</div>

                                                    <div class="card-body">
                                                        <form>
                                                            <div class="form-group row">
                                                                <label for="editName" class="col-sm-2 col-form-label">rename Category</label>
                                                                <div class="col-sm-10">

                                                                    <input type="text" class="form-control  @error('name') is-invalid @enderror" id="editName" name="name" value="{{ old('name') }}">

                                                                    @error('name')
                                                                    <span class="text-danger" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="d-flex justify-content-center mt-4">
                                                                <input type="hidden" id="editId" value="">
                                                                <button type="button" class="btn btn-outline-primary w-50 mt-4" onclick="editCategory()">수정</button>
                                                                <button type="button" class="btn btn-outline-secondary w-50 mt-4" data-dismiss="modal">취소</button>
{{--                                                                <button type="button" class="btn btn-outline-danger w-50 mt-4" onclick="deleteCategory({{ $category->id }})">삭제</button>--}}
                                                                <button type="button" class="btn btn-outline-danger w-50 mt-4" onclick="deleteCategory()">삭제</button>
                                                            </div>
                                                        </form>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </div>

                        <div class="d-flex justify-content-center mt-4">
                           {{ $categories->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>

        function addCategory() {
            if(confirm('Category를 등록하시겠습니까?')) {
                $.ajax({
                    method: "POST",
                    url: "/categories",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        client_id: $('#client_id').val(),
                        name: $('#name').val(),

                    }
                })
                    .done(function (msg) {
                        window.location = '{{ route('categories.index') }}'
                    });
            }
        }

        function deleteCategory() {
            if(confirm('Category를 삭제하시겠습니까?')) {
                $.ajax({
                    method: "DELETE",
                    url: "/categories/" + $('#editId').val(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                    .done(function (msg) {
                        window.location = '{{ route('categories.index') }}'
                    });
            }
        }

        function editCategory() {
            if(confirm('Category를 수정하시겠습니까?')) {
                $.ajax({
                    method: "get",
                    url: "/categories/{category}/edit",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        client_id: $('#id').val(),
                        name: $('#name').val(),
                    }
                })
                    .done(function (msg) {
                        window.location = '{{ route('categories.index') }}'
                    });
            }
        }

        function openEditCategoryModal(id) {
                $.ajax({
                    method: "get",
                    url: "/categories/" + id,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {}
                })
                    .done(function (res) {
                        $('#editId').val(res.id)
                        $('#editName').val(res.name)
                        $('#exampleModaledit').modal('show')
                    });
            }

        {{--function showCategory() {--}}
        {{--        $.ajax({--}}
        {{--            method: "DELETE",--}}
        {{--            url: "categories/{category}",--}}
        {{--            headers: {--}}
        {{--                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
        {{--            }--}}
        {{--        })--}}
        {{--            .done(function (msg) {--}}
        {{--                window.location = '{{ route('categories.show, $category->id') }}'--}}
        {{--            });--}}
        {{--}--}}

    </script>
@endsection
