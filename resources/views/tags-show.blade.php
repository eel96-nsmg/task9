@extends('layouts.app')

@section('content')
    <div class="container">
        
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div class="pt-2">{{ $tag->name }}에 태그한 분들</div>
                        </div>
                    </div>

                    <div class="col-sm-10">
                        @foreach($tag->clients as $client)

                            <a href="{{ route('clients.show', $client->id) }}"><span>{{ $client->name }}</span></a><br>

                        @endforeach
                    </div>
                    

                </div>

            </div>
        </div>

    </div>
@endsection