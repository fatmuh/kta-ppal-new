 <!-- BEGIN: Super Large Modal Content -->
 <div id="superlarge-modal-add-user" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="mr-auto text-base font-medium">
                    Tambah User
                </h2>
                <a data-tw-dismiss="modal" href="javascript:;"> <i data-lucide="x" class="w-8 h-8 text-slate-400"></i> </a>
            </div>
            <div class="p-0 modal-body">
                <form action="{{ route('users.store') }}" id="users-form" method="POST" enctype="multipart/form-data" class="d-inline-block">
                    @csrf
                    <div class="grid grid-cols-12 gap-4 modal-body gap-y-3">

                        <div class="col-span-12 mt-3">
                            <div class="grid grid-cols-12 gap-2">
                                <div class="col-span-12">
                                    <label for="" class="form-label">Nama</label> <code class="text-danger">*</code>
                                    <div class="">
                                        <input id="name" type="text" name="name" class="form-control" placeholder="John Doe" value="{{ old('name') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-2">
                                <div class="col-span-12 mt-3">
                                    <label for="" class="form-label">Email</label> <code class="text-danger">*</code>
                                    <div class="">
                                        <input id="email" type="email" name="email" class="form-control" placeholder="example@gmail.com" value="{{ old('email') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-12 gap-2">
                                <div class="col-span-12 mt-3">
                                    <label for="" class="form-label">Password</label> <code class="text-danger">*</code>
                                    <div class="">
                                        <input id="password" type="password" name="password" class="form-control" placeholder="******" value="{{ old('password') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-5 pb-8 text-right">
                        <button type="submit" class="w-24 btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END: Super Large Modal Content -->
