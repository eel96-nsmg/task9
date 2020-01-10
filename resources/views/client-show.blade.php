@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $client->name }}님 </div>

                    <div class="card-body">
                        <form>

                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="title" value="{{ $client->name }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="content" class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="content">{{ $client->image }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="title" value="{{ $client->email }}">
                                </div>
                            </div>
  
                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">Company</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="title" value="{{ $client->company }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">Position</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="title" value="{{ $client->position }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">Mobile</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="title" value="{{ $client->mobile }}">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">Tel</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="title" value="{{ $client->tel }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">Fax</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="title" value="{{ $client->fax }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="title" value="{{ $client->address }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">Company_Address</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="title" value="{{ $client->company_address }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Category" class="col-sm-2 col-form-label">Category</label>
                                
                                <div class="col-sm-10">
                                    @foreach($client->categories as $category)

                                        <a href="{{ route('categories.show', $category->id) }}"><span>{{ $category->name }}</span></a><br>

                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Tag" class="col-sm-2 col-form-label">Tag</label>
                                
                                <div class="col-sm-10">
                                    @foreach($client->tags as $tag)

                                        <a href="{{ route('tags.show', $tag->id) }}"><span>#{{ $tag->name }}</span></a><br>

                                    @endforeach
                                </div>
                                
                            </div>

                    </form>
                
                </div>

                <form method="POST" action="{{ route('clients.destroy', $client->id) }}">
                    @csrf
                    @method('delete')

                    <button type="submit" class="btn btn-danger">삭제</button>
                    <a href="{{ route('clients.edit', $client->id)}}" class="btn btn-warning">수정</a>
                </form>

                

                <form method="POST" action="{{ route('clients.likes', $client->id) }}" class="mt-4">
                    @csrf

                    @if(auth()->user()->likes->contains($client->id))
                        <button type="submit" class="btn btn-warning">좋아요 취소</button>
                    @else
                        <button type="submit" class="btn btn-primary">좋아요!</button>
                    @endif
                </form>

                </div>
            </div>
        </div>

<br>
<br>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div class="pt-2">{{ $client->name }}님에 대한 댓글</div>
                            <div>

                                <br>
                                <br>


                               {{-- <textarea class="form-control" id="email" name="email" value=""></textarea>--}}

                               <form method="POST" action="{{ route('histories.store') }}">
                                @csrf
                                <input type="hidden" name="client_id" value="{{ $client->id }}">
                                    <textarea class="form-control" id="content" name="content"></textarea>
                                
    
                                <button type="submit" class="btn btn-success">댓글달기</button>

                               </form>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @foreach($client->histories as $history)
                        <div class="form-group row">

                            <label for="title" class="col-sm-2 col-form-label">{{$history->id}}</label>

                            <form method="POST" action="{{ route('histories.update', $history->id) }}">
                                @csrf
                                @method('put')
                                
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="content" name="content">{{ $history->content }}</textarea>
                                    <button type="submit" class="btn btn-success">수정</button>
                                </div>
                            </form>

                          {{--  <label for="content" class="col-sm-2 col-form-label">{{$history->content}}</label> --}}
                                    
                            
                            <form method="POST" action="{{ route('histories.destroy', $history->id) }}">
                                @csrf
                                @method('delete')
                                
                                <button type="submit" class="btn btn-danger">삭제</button>
                                
                            </form>

                        </div>
                        @endforeach
                        
                    </div>   

                </div>

            </div>
        </div>

    </div>
@endsection