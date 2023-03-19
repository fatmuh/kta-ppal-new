@extends('../layout/' . $layout)

@section('subhead')
    <title>Detail User - KTA PPAL</title>
@endsection

@section('subcontent')
    <div class="flex items-center mt-8 intro-y">
        <h2 class="mr-auto text-lg font-medium">Detail User ~ {{ $data->full_name }} - {{ $data->no_kta }}</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5 intro-y">
        <div class="col-span-12 lg:col-span-4">
            <!-- BEGIN: Data User -->
            <div class="intro-y box">
                <div class="flex flex-col items-center p-5 border-b sm:flex-row border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="mr-auto text-base font-medium">Data User</h2>
                </div>
                <div class="p-5">
                    <div class="col-span-12">
                        <div class="grid grid-cols-12 gap-2">
                            <div class="col-span-6">
                                <button class="w-full px-3 mb-2 mr-1 btn btn-sm btn-primary">No. KTA</button>
                            </div>

                            <div class="col-span-6">
                                <button class="w-full mb-2 mr-1 btn btn-sm btn-outline-secondary">{{ $data->no_kta }}</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-12 mt-1">
                        <div class="grid grid-cols-12 gap-2">
                            <div class="col-span-6">
                                <button class="w-full px-3 mb-2 mr-1 btn btn-sm btn-primary">Nama Lengkap</button>
                            </div>

                            <div class="col-span-6">
                                <button class="w-full mb-2 mr-1 btn btn-sm btn-outline-secondary">{{ $data->full_name }}</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-12 mt-1">
                        <div class="grid grid-cols-12 gap-2">
                            <div class="col-span-6">
                                <button class="w-full px-3 mb-2 mr-1 btn btn-sm btn-primary">Pangkat Terakhir</button>
                            </div>

                            <div class="col-span-6">
                                <button class="w-full mb-2 mr-1 btn btn-sm btn-outline-secondary">{{ $data->pangkat_terakhir }}</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-12 mt-1">
                        <div class="grid grid-cols-12 gap-2">
                            <div class="col-span-6">
                                <button class="w-full px-3 mb-2 mr-1 btn btn-sm btn-primary">Nomor Induk Kependudukan</button>
                            </div>

                            <div class="col-span-6">
                                <button class="w-full mb-2 mr-1 btn btn-sm btn-outline-secondary">{{ $data->nik }}</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-12 mt-1">
                        <div class="grid grid-cols-12 gap-2">
                            <div class="col-span-6">
                                <button class="w-full px-3 mb-2 mr-1 btn btn-sm btn-primary">Tanda Jasa Tertinggi</button>
                            </div>

                            <div class="col-span-6">
                                <button class="w-full mb-2 mr-1 btn btn-sm btn-outline-secondary">{{ $data->tanda_jasa_tertinggi }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Data User -->
        </div>
        <div class="col-span-12 lg:col-span-8">
            <!-- BEGIN: Edit Data User -->
            <div class="intro-y box">
                <div class="flex flex-col items-center p-5 border-b sm:flex-row border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="mr-auto text-base font-medium">Edit Data User</h2>
                </div>
                <div class="px-3">
                    <form action="{{ route('kta.update', $data->id) }}" id="kta-form" method="POST" enctype="multipart/form-data" class="d-inline-block">
                        @csrf
                        <div class="grid grid-cols-12 gap-4 modal-body gap-y-3">

                            <div class="col-span-12 mt-3">
                                <div class="grid grid-cols-12 gap-2">
                                    <div class="col-span-6">
                                        <label for="" class="form-label">No. KTA</label> <code class="text-danger">*</code>
                                        <div class="">
                                            <input id="no_kta" type="text" name="no_kta" class="form-control" placeholder="XIV-004-7-0002" value="{{ $data->no_kta }}">
                                        </div>
                                    </div>

                                    <div class="col-span-6">
                                        <label for="" class="form-label">Nama Lengkap</label> <code class="text-danger">*</code>
                                        <div class="">
                                            <input id="full_name" type="text" name="full_name" class="form-control" placeholder="John Doe" value="{{ $data->full_name }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-span-12 mt-3">
                                <div class="grid grid-cols-12 gap-2">
                                    <div class="col-span-6">
                                        <label for="" class="form-label">Tempat, Tanggal Lahir</label> <code class="text-danger">*</code>
                                        <div class="">
                                            <input id="ttl" type="text" name="ttl" class="form-control" placeholder="Masukan Tempat, Tanggal Lahir" value="{{ $data->ttl }}">
                                        </div>
                                    </div>

                                    <div class="col-span-6">
                                        <label for="" class="form-label">Agama</label> <code class="text-danger">*</code>
                                        <div class="">
                                            <input id="agama" type="text" name="agama" class="form-control" placeholder="Masukan Agama" value="{{ $data->agama }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-span-12 mt-3">
                                <div class="grid grid-cols-12 gap-2">
                                    <div class="col-span-6">
                                        <label for="" class="form-label">Golongan Darah</label> <code class="text-danger">*</code>
                                        <div class="">
                                            <select class="form-control" id="gol_darah" name="gol_darah" required="">
                                                <option value="{{ $data->gol_darah }}">{{ $data->gol_darah }} (Current)</option>
                                                <option value="A">A</option>
                                                <option value="A+">A+</option>
                                                <option value="B">B</option>
                                                <option value="B+">B+</option>
                                                <option value="AB">AB</option>
                                                <option value="AB+">AB+</option>
                                                <option value="O">O</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-span-6">
                                        <label for="" class="form-label">Pangkat Terakhir</label> <code class="text-danger">*</code>
                                        <div class="">
                                            <input id="pangkat_terakhir" type="text" name="pangkat_terakhir" class="form-control" placeholder="Masukan Pangkat Terakhir" value="{{ $data->pangkat_terakhir }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-span-12 mt-3">
                                <div class="grid grid-cols-12 gap-2">
                                    <div class="col-span-6">
                                        <label for="" class="form-label">NIK</label> <code class="text-danger">*</code>
                                        <div class="">
                                            <input id="nik" type="text" name="nik" class="form-control" placeholder="Nomor Induk Kependudukan" value="{{ $data->nik }}">
                                        </div>
                                    </div>

                                    <div class="col-span-6">
                                        <label for="" class="form-label">Tanda Jasa Teringgi</label> <code class="text-danger">*</code>
                                        <div class="">
                                            <input id="tanda_jasa_tertinggi" type="text" name="tanda_jasa_tertinggi" class="form-control" placeholder="Masukan Tanda Jasa Tertinggi" value="{{ $data->tanda_jasa_tertinggi }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-span-12 mt-3">
                                <div class="grid grid-cols-12 gap-2">
                                    <div class="col-span-12">
                                        <label for="" class="form-label">Tanggal Cetak</label> <code class="text-danger">*</code>
                                        <div class="">
                                            <input id="tanggal_cetak" type="text" name="tanggal_cetak" class="form-control" placeholder="Masukkan Tanggal Cetak" value="{{ $data->tanggal_cetak }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-span-12 mt-3">
                                <div class="grid grid-cols-12 gap-2">
                                    <div class="col-span-6">
                                        <label for="" class="form-label">Foto 2x3</label> <code class="text-danger">*</code>
                                        <div class="">
                                            <input id="foto" type="text" name="foto" class="form-control" placeholder="Masukan Foto" value="{{ $data->foto }}">
                                        </div>
                                    </div>

                                    <div class="col-span-6">
                                        <label for="" class="form-label">Tanda Tangan</label> <code class="text-danger">*</code>
                                        <div class="">
                                            <input id="ttd" type="text" name="ttd" class="form-control" placeholder="John Doe" value="{{ $data->ttd }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-span-12 mt-3">
                                <div class="grid grid-cols-12 gap-2">
                                    <div class="col-span-6">
                                        <label for="" class="form-label">Istri / Suami</label> <code class="text-danger">*</code>
                                        <div class="">
                                            <select class="form-control" id="istri_suami" name="istri_suami" required="">

                                                @if ($data->istri_suami == "Istri")
                                                    <option value="{{ $data->istri_suami }}">{{ $data->istri_suami }} (Current)</option>
                                                    <option value="Suami">Suami</option>

                                                @else
                                                    <option value="{{ $data->istri_suami }}">{{ $data->istri_suami }} (Current)</option>
                                                    <option value="Istri">Istri</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-span-6">
                                        <label for="" class="form-label">Nama Istri / Suami</label> <code class="text-danger">*</code>
                                        <div class="">
                                            <input id="nama_istri_suami" type="text" name="nama_istri_suami" class="form-control" placeholder="Masukan Nama Istri / Suami" value="{{ $data->nama_istri_suami }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-span-12 mt-3">
                                <div class="grid grid-cols-12 gap-2">
                                    <div class="col-span-6">
                                        <label for="" class="form-label">NIK Istri / Suami</label> <code class="text-danger">*</code>
                                        <div class="">
                                            <input id="nik_istri_suami" type="text" name="nik_istri_suami" class="form-control" placeholder="Masukkan Nomor Induk Kependudukan" value="{{ $data->nik_istri_suami }}">
                                        </div>
                                    </div>

                                    <div class="col-span-6">
                                        <label for="" class="form-label">Wilayah / Rayon</label> <code class="text-danger">*</code>
                                        <div class="">
                                            <input id="wil_rayon" type="text" name="wil_rayon" class="form-control" placeholder="Masukkan Wilayah / Rayon" value="{{ $data->wil_rayon }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-span-12 mt-3">
                                <div class="grid grid-cols-12 gap-2">
                                    <div class="col-span-6">
                                        <label for="" class="form-label">Alamat 1</label> <code class="text-danger">*</code>
                                        <div class="">
                                            <input id="alamat1" type="text" name="alamat1" class="form-control" placeholder="Masukan Alamat" value="{{ $data->alamat1 }}">
                                        </div>
                                    </div>

                                    <div class="col-span-6">
                                        <label for="" class="form-label">Alamat 2</label> <code class="text-danger">*</code>
                                        <div class="">
                                            <input id="alamat2" type="text" name="alamat2" class="form-control" value="{{ $data->alamat2 }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="px-5 pb-4 text-right">
                            <a href="{{ route('kta.index') }}" class="w-24 mr-1 btn btn-secondary">Back</a>
                            <button type="submit" class="w-24 btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END: Edit Data User -->
        </div>
    </div>
@endsection
