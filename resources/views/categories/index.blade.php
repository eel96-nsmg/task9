@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div class="pt-2">Categories</div>
                            <div>
                                <a href="{{ route('categories.create') }}" class="btn btn-primary text-white">카테고리 등록</a>
                            </div>                            
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="list-group">

                            @foreach($categories as $category)
                                <a href="{{ route('categories.show', $category->id) }}" class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between">
                                        
                                            <h5 class="mb-1">{{ $category->id }}. {{ $category->name }}</h5>
                                            <a href="{{ route('categories.edit', $category->id)}}" class="btn btn-success row-6">수정</a>
                                            <form method="POST" action="{{ route('categories.destroy', $category->id) }}" class="row-6">
                                                @csrf
                                                @method('delete')
                
                                                <button type="submit" class="btn btn-danger w-120">삭제</button>
                                            </form>
                                        
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
@endsection
