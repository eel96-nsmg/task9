@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div class="pt-2">{{ strtoupper($client->name) }} 님 </div>
                            <div>
                                <form method="POST" action="{{ route('clients.likes', $client->id) }}">
                                    @csrf

                                    @if(auth()->user()->likes->contains($client->id))
                                        <button type="submit" class="btn btn-outline-secondary">좋아요 취소</button>
                                    @else
                                        <button type="submit" class="btn btn-outline-secondary">좋아요!</button>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form>
                            <div class="form-group row">
                                <label for="title" class="col-sm-4 col-form-label py-0">Name</label>
                                <div class="col-sm-8">
                                    <p class="mb-0">{{ $client->name }}</p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-sm-4 col-form-label py-0">Company</label>
                                <div class="col-sm-8">
                                    <p class="mb-0">{{ $client->company }}</p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-sm-4 col-form-label py-0">Position</label>
                                <div class="col-sm-8">
                                    <p class="mb-0">{{ $client->position }}</p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-sm-4 col-form-label py-0">Eamil</label>
                                <div class="col-sm-8">
                                    <p class="mb-0">{{ $client->email }}</p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-sm-4 col-form-label py-0">Mobile</label>
                                <div class="col-sm-8">
                                    <p class="mb-0">{{ $client->mobile }}</p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-sm-4 col-form-label py-0">Tel</label>
                                <div class="col-sm-8">
                                    <p class="mb-0">{{ $client->tel }}</p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-sm-4 col-form-label py-0">Fax</label>
                                <div class="col-sm-8">
                                    <p class="mb-0">{{ $client->fax }}</p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-sm-4 col-form-label py-0">Address</label>
                                <div class="col-sm-8">
                                    <p class="mb-0">{{ $client->address }}</p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-sm-4 col-form-label py-0">Company Address</label>
                                <div class="col-sm-8">
                                    <p class="mb-0">{{ $client->company_address }}</p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Category" class="col-sm-4 col-form-label py-0">Category</label>

                                <div class="col-sm-8">
                                    @foreach($client->categories as $category)
                                        <a href="{{ route('categories.show', $category->id) }}"><span>{{ $category->name }}</span></a><br>
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Tag" class="col-sm-4 col-form-label py-0">Tag</label>

                                <div class="col-sm-8">
                                    @foreach($client->tags as $tag)
                                        <a href="{{ route('tags.show', $tag->id) }}"><span>#{{ $tag->name }}</span></a><br>
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-sm-4 col-form-label py-0">Created At</label>
                                <div class="col-sm-8">
                                    <p class="mb-0">{{ $client->created_at }}</p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-sm-4 col-form-label py-0">Updated At</label>
                                <div class="col-sm-8">
                                    <p class="mb-0">{{ $client->updated_at }}</p>
                                </div>
                            </div>
                        </form>

                        <div class="row">
                            <a href="{{ route('clients.edit', $client->id)}}" class="btn btn-success col-6">수정</a>

                            <form method="POST" action="{{ route('clients.destroy', $client->id) }}" class="col-6">
                                @csrf
                                @method('delete')

                                <button type="submit" class="btn btn-danger w-100">삭제</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                       <form method="POST" action="{{ route('histories.store') }}">
                            @csrf
                            <input type="hidden" name="client_id" value="{{ $client->id }}">

                            <label for="content" class="col-form-label">댓글</label>

                            <textarea class="form-control w-100" id="content" name="content"></textarea>

                            <button type="submit" class="btn btn-primary w-100 mt-2">댓글달기</button>
                       </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <p class="pt-2">{{ strtoupper($client->name) }}님에 대한 댓글 ({{ $client->histories->count() }})</p>

                        @foreach($client->histories()->orderByDesc('id')->get() as $history)
                            <div class="form-group">
                                <form method="POST" action="{{ route('histories.update', $history->id) }}">
                                    @csrf
                                    @method('put')

                                    <p class="text-right mb-0">
                                        <span class="text-muted">by</span> {{ $history->user->name }}, {{ $history->updated_at->diffForHumans() }}
                                    </p>
                                    <textarea class="form-control w-100" id="content" name="content">{{ $history->content }}</textarea>

                                    <button type="submit" class="btn btn-success mt-2">수정</button>
                                </form>

                                <form method="POST" action="{{ route('histories.destroy', $history->id) }}">
                                    @csrf
                                    @method('delete')

                                    <button type="submit" class="btn btn-danger mt-2">삭제</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
