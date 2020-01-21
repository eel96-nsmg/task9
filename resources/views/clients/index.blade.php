@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div class="pt-2">Clients</div>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    등록
                                </button>
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
                    </div>
                </div>

                <div class="d-flex justify-content-center mt-4">
                    {{ $clients->links() }}
                </div>

            </div>
        </div>
    </div>

    @include('clients.create-modal')
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
