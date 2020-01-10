@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                {{ $category->name }} <span class="text-muted">카테고리의 Clients</span>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="list-group">

                            @foreach($category->clients as $client)
                                <a href="{{ route('clients.show', $client->id) }}" class="list-group-item list-group-item-action">
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
                </div>
            </div>
        </div>
    </div>
@endsection
