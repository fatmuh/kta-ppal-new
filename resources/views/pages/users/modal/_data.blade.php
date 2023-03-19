<form action="{{ route('users.update', $data->id) }}" id="edit_user_form" method="POST" enctype="multipart/form-data" class="d-inline-block">
    @csrf
    <div class="grid grid-cols-12 gap-4 modal-body gap-y-3">
        <div class="col-span-12">
            <div>
                <label for="" class="form-label">Nama User</label> <code class="text-danger">*</code>
                <div class="">
                    <input id="edit_users_name" type="text" name="edit_users_name" class="form-control" value="{{ $data->name }}">
                </div>
            </div>
        </div>

        <div class="col-span-12 mt-1">
            <div>
                <label for="" class="form-label">Email</label> <code class="text-danger">*</code>
                <div class="">
                    <input id="edit_users_email" type="email" name="edit_users_email" class="form-control" value="{{ $data->email }}">
                </div>
            </div>
        </div>

        <div class="col-span-12 mt-1">
            <div>
                <label for="" class="form-label">Status</label> <code class="text-danger">*</code>
                <div class="">
                    <select id="edit_users_status" name="edit_users_status" data-placeholder="Select your favorite actors" class="form-control">
                        @if ($data->active == 0)
                        <option value="{{ $data->active }}">{{
                            ($data->active == 0) ? 'Not Active' :
                            (($data->active == 1) ? 'Active' : '')
                        }} (Current)</option>
                        <option value="1">Active</option>

                        @else
                        <option value="{{ $data->active }}">{{
                            ($data->active == 0) ? 'Not Active' :
                            (($data->active == 1) ? 'Active' : '')
                        }} (Current)</option>
                        <option value="0">Not Active</option>
                        @endif
                    </select>
                    {{-- <input id="edit_users_email" type="email" name="edit_users_email" class="form-control" value="
                    {{
                        ($data->active == 0) ? 'Not Active' :
                        (($data->active == 1) ? 'Active' : '')
                    }}"> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="px-5 pb-8 text-right">
        <button type="submit" class="w-24 btn btn-primary">Simpan</button>
    </div>
</form>
