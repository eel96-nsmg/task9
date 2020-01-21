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
