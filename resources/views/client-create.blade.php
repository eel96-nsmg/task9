@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Client 등록</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('clients.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">

                                    @error('name')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Content</label>
                                <div class="col-sm-10">
                                   {{-- <textarea class="form-control" id="email" name="email"></textarea>--}}
                                   <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">

                                    @error('email')
                                    <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="company" class="col-sm-2 col-form-label">Company</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="company" name="company" value="{{ old('company') }}">

                                    @error('company')
                                    <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="position" class="col-sm-2 col-form-label">position</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="position" name="position" value="{{ old('position') }}">

                                    @error('position')
                                    <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="mobile" class="col-sm-2 col-form-label">mobile</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="mobile" name="mobile" value="{{ old('mobile') }}">

                                    @error('mobile')
                                    <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="tel" class="col-sm-2 col-form-label">tel</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="tel" name="tel" value="{{ old('tel') }}">

                                    @error('tel')
                                    <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="fax" class="col-sm-2 col-form-label">fax</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="fax" name="fax" value="{{ old('fax') }}">

                                    @error('fax')
                                    <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="address" class="col-sm-2 col-form-label">address</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">

                                    @error('address')
                                    <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="company_address" class="col-sm-2 col-form-label">company_address</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="company_address" name="company_address" value="{{ old('company_address') }}">

                                    @error('company_address')
                                    <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="Category" class="col-sm-2 col-form-label">Category</label>
                                <select multiple class="form-control" id="categories" name="categories[]">

                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                    @endforeach

                                  </select>
                            </div>


                            <div class="form-group">
                                <label for="Tag" class="col-sm-2 col-form-label">Tag</label>
                                
                                {{--
                                <select multiple class="form-control" id="tags" name="tags[]">

                                    @foreach($tags as $tag)
                                        <option value="{{$tag->id}}" selected>{{$tag->name}}</option>
                                    @endforeach

                                  </select>
                                --}}
                                <input type="text" class="form-control" id="tags" name="tags" value="#{{ old('tags') }}">
                            </div>

                            <button type="submit" class="btn btn-primary">저장</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
