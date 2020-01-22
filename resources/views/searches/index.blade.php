@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="GET" action="{{ route('search.index') }}">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="search" placeholder="검색어를 입력해 주세요." aria-label="Search" value="{{ $search }}">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit">Search</button>
                        </div>
                    </div>
                </form>

                <div class="card">
                    <div class="card-header">
                        Client 검색결과
                    </div>
                    <div class="card-body">

                        @if($clients->count())
                            <div class="list-group">
                                @foreach($clients as $client)
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
                            </div>
                        @else
                            <h4 class="text-center">검색된 Client가 없습니다.</h4>
                        @endif

                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-header">
                        Category 검색결과
                    </div>
                    <div class="card-body">

                        @if($categories->count())
                            <div class="list-group">
                                @foreach($categories as $category)
                                    <a href="{{ route('search.category', $category->id) }}" class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <div>
                                                <h5 class="mb-0">{{ $category->name }}</h5>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @else
                            <h4 class="text-center">검색된 Category가 없습니다.</h4>
                        @endif

                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-header">
                        Tag 검색결과
                    </div>
                    <div class="card-body">

                        @if($tags->count())
                            <div class="list-group">
                                @foreach($tags as $tag)
                                    <a href="{{ route('search.tag', $tag->id) }}" class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <div>
                                                <h5 class="mb-0">#{{ $tag->name }}</h5>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @else
                            <h4 class="text-center">검색된 Tag가 없습니다.</h4>
                        @endif

                    </div>
                </div>

            </div>
        </div>
    </div>

    @include('clients.edit-modal')

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

