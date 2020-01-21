@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div class="pt-2">Clients</div>
                            {{--                            <div>--}}
                            {{--                                <a href="{{ route('clients.create') }}" class="btn btn-primary text-white">등록</a>--}}
                            {{--                            </div>--}}
                            <div>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    등록
                                </button>

                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Client 등록화면</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card-body">
                                                    <form method="POST" action="{{ route('clients.store') }}">
                                                        @csrf

                                                        <div class="form-group row">
                                                            <label for="name" class="col-sm-4 col-form-label">Name</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">

                                                                @error('name')
                                                                <span class="text-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror

                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="company" class="col-sm-4 col-form-label">Company</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" id="company" name="company" value="{{ old('company') }}">

                                                                @error('company')
                                                                <span class="text-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror

                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="position" class="col-sm-4 col-form-label">Position</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" id="position" name="position" value="{{ old('position') }}">

                                                                @error('position')
                                                                <span class="text-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror

                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="email" class="col-sm-4 col-form-label">Email</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">

                                                                @error('email')
                                                                <span class="text-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror

                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="mobile" class="col-sm-4 col-form-label">Mobile</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" id="mobile" name="mobile" value="{{ old('mobile') }}">

                                                                @error('mobile')
                                                                <span class="text-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror

                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="tel" class="col-sm-4 col-form-label">Tel</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" id="tel" name="tel" value="{{ old('tel') }}">

                                                                @error('tel')
                                                                <span class="text-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror

                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="fax" class="col-sm-4 col-form-label">Fax</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" id="fax" name="fax" value="{{ old('fax') }}">

                                                                @error('fax')
                                                                <span class="text-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror

                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="address" class="col-sm-4 col-form-label">Address</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">

                                                                @error('address')
                                                                <span class="text-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror

                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="company_address" class="col-sm-4 col-form-label">Company Address</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" id="company_address" name="company_address" value="{{ old('company_address') }}">

                                                                @error('company_address')
                                                                <span class="text-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror

                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="categories" class="col-sm-4 col-form-label">Category</label>
                                                            <div class="col-sm-8">
                                                                <select multiple class="form-control" id="categories" name="categories[]">

                                                                    @foreach($categories as $category)
                                                                        <a href="#" class="list-group-item list-group-item-action">
                                                                            <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                                                    @endforeach

                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="tags" class="col-sm-4 col-form-label">Tag</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" id="tags" name="tags" value="#{{ old('tags') }}">

                                                                @error('tags')
                                                                <span class="text-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror

                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="addClient()">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    {{--클라이언트 리스트 뿌리는 화면--}}
                    <div class="list-group">

                        @foreach($clients as $client)
                            {{--                                <a href="{{ route('clients.show', $client->id) }}" class="list-group-item list-group-item-action">--}}
                            <a href="#" class="list-group-item list-group-item-action" onclick="openEditClientModal({{ $client->id }})">
                                <div class="d-flex w-100 justify-content-between">
                                    <div>
                                        <h5 class="mb-1">{{ $client->id }}. {{ $client->name }}</h5>
                                        <small>{{ $client->company }}</small>
                                    </div>

                                    <small>{{ $client->created_at->diffForHumans() }}</small>
                                </div>
                            </a>
                        @endforeach

                        {{--클라이언트 상세 에이젝스리스트--}}
                        <div class="modal fade" id="exampleModaledit2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Client 수정</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card-body">
                                            <form>
                                                <div class="form-group row">
                                                    <label for="editName" class="col-sm-4 col-form-label">Name</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control  @error('name') is-invalid @enderror" id="editName" name="name" value="{{ old('name') }}">

                                                        @error('name')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="editCompany" class="col-sm-4 col-form-label">Company</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="editCompany" name="company" value="{{ old('company') }}">

                                                        @error('company')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="editPosition" class="col-sm-4 col-form-label">Position</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="editPosition" name="position" value="{{ old('position') }}">

                                                        @error('position')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="editEmail" class="col-sm-4 col-form-label">Email</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="editEmail" name="email" value="{{ old('email') }}">

                                                        @error('email')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="editMobile" class="col-sm-4 col-form-label">Mobile</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="editMobile" name="mobile" value="{{ old('mobile') }}">

                                                        @error('mobile')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="editTel" class="col-sm-4 col-form-label">Tel</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="editTel" name="tel" value="{{ old('tel') }}">

                                                        @error('tel')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="editFax" class="col-sm-4 col-form-label">Fax</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="editFax" name="fax" value="{{ old('fax') }}">

                                                        @error('fax')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="editAddress" class="col-sm-4 col-form-label">Address</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="editAddress" name="address" value="{{ old('address') }}">

                                                        @error('address')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="editCompany_Address" class="col-sm-4 col-form-label">Company Address</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="editCompany_Address" name="company_address" value="{{ old('company_address') }}">

                                                        @error('company_address')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="editCategories" class="col-sm-4 col-form-label py-0">Category</label>

                                                    <div class="col-sm-8">
                                                        <select multiple class="form-control" id="editCategories" name="categories[]">
{{--                                                            @foreach($client->categories as $category)--}}
{{--                                                                <a href="#" class="list-group-item list-group-item-action">--}}
{{--                                                                    <option value="{{$category->id}}" selected>{{$category->name}}</option></a>--}}
{{--                                                            @endforeach--}}
                                                            @foreach($categories as $category)
                                                                <option value="{{$category->id}}">{{$category->name}}</option>
{{--                                                                <option value="{{$category->editId}}" @if($client->categories->contains($category->editId)) selected @endif>{{$category->editName}}</option>--}}
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="editTags" class="col-sm-4 col-form-label">Tag</label>
                                                    <div class="col-sm-8">
{{--                                                        <input type="text" class="form-control" id="editTags" name="tags" value="#{{ old('tags') }}">--}}

{{--                                                        @error('tags')--}}
{{--                                                        <span class="text-danger" role="alert">--}}
{{--                                                            <strong>{{ $message }}</strong>--}}
{{--                                                        </span>--}}
{{--                                                        @enderror--}}
                                                        <input type="text" class="form-control" id="editTags" name="tags" value="#{{ old('tags') }}">

                                                        @error('tags')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" id="editId" value="">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-danger" onclick="deleteClient()">Delete</button>
                                        <button type="button" class="btn btn-primary" onclick="updateClient()">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--에이젝스리스트--}}

                    </div>

                </div>

                <div class="d-flex justify-content-center mt-4">
                    {{ $clients->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>

        function addClient() {
            if(confirm('Client를 등록하시겠습니까?')) {
                $.ajax({
                    method: "POST",
                    url: "/clients ",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        id: $('#id').val(),
                        name: $('#name').val(),
                        company: $('#company').val(),
                        position: $('#position').val(),
                        email: $('#email').val(),
                        mobile: $('#mobile').val(),
                        tel: $('#tel').val(),
                        fax: $('#fax').val(),
                        address: $('#address').val(),
                        company_address: $('#company_address').val(),
                        categories: $('#categories').val(),
                        tags: $('#tags').val(),
                    },
                    error: function (err) {
                        alert('잠시 후 다시 시도해 주세요.')
                        console.log(err)
                    },
                    success: function (res) {
                        window.location = '{{ route('clients.index') }}'
                    },
                })
            }
        }

        function openEditClientModal(id) {
            var categories = []
            var tags = ''

            $.ajax({
                method: "get",
                url: "/clients/" + id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {},
                error: function (err) {
                    alert('잠시 후 다시 시도해 주세요.')
                    console.log(err)
                },
                success: function (res) {
                    res.categories.map(function(category) {
                        categories.push(category.id)
                    })

                    res.tags.map(function(tag) {
                        tags = tags + '#' + tag.name + ', '
                    })

                    $('#editId').val(res.client.id)
                    $('#editName').val(res.client.name)
                    $('#editCompany').val(res.client.company)
                    $('#editPosition').val(res.client.position)
                    $('#editEmail').val(res.client.email)
                    $('#editMobile').val(res.client.mobile)
                    $('#editTel').val(res.client.tel)
                    $('#editFax').val(res.client.fax)
                    $('#editAddress').val(res.client.address)
                    $('#editCompany_Address').val(res.client.company_address)
                    $('#editCategories').val(categories)
                    $('#editTags').val(tags)

                    $('#exampleModaledit2').modal('show')
                },
            })
        }

        function deleteClient() {
            if(confirm('Client를 삭제하시겠습니까?')) {
                $.ajax({
                    method: "DELETE",
                    url: "/clients/" + $('#editId').val(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    error: function (err) {
                        alert('잠시 후 다시 시도해 주세요.')
                        console.log(err)
                    },
                    success: function (res) {
                        window.location = '{{ route('clients.index') }}'
                    },
                })
            }
        }

        function updateClient() {
            if(confirm('Client를 수정하시겠습니까?')) {
                var editId = $('#editId').val()
                $.ajax({
                    method: "PUT",
                    url: "/clients/" + editId,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        id: editId,
                        name: $('#editName').val(),
                        company: $('#editCompany').val(),
                        position: $('#editPosition').val(),
                        email: $('#editEmail').val(),
                        mobile: $('#editMobile').val(),
                        tel: $('#editTel').val(),
                        fax: $('#editFax').val(),
                        address: $('#editAddress').val(),
                        company_address: $('#editAompany_Address').val(),
                        categories: $('#editCategories').val(),
                        tags: $('#editTags').val(),
                    },
                    error: function (err) {
                        alert('잠시 후 다시 시도해 주세요.')
                        console.log(err)
                    },
                    success: function (res) {
                        window.location = '{{ route('clients.index') }}'
                    },
                })
            }
        }
    </script>
@endsection
