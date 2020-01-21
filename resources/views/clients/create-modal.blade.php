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
