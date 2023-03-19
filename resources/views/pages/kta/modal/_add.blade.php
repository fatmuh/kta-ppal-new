 <!-- BEGIN: Super Large Modal Content -->
 <div id="superlarge-modal-add-kta" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="mr-auto text-base font-medium">
                    Tambah KTA
                </h2>
                <a data-tw-dismiss="modal" href="javascript:;"> <i data-lucide="x" class="w-8 h-8 text-slate-400"></i> </a>
            </div>
            <div class="p-0 modal-body">
                <form action="{{ route('kta.store') }}" id="kta-form" method="POST" enctype="multipart/form-data" class="d-inline-block">
                    @csrf
                    <div class="grid grid-cols-12 gap-4 modal-body gap-y-3">

                        <div class="col-span-12 mt-3">
                            <div class="grid grid-cols-12 gap-2">
                                <div class="col-span-6">
                                    <label for="" class="form-label">No. KTA</label> <code class="text-danger">*</code>
                                    <div class="">
                                        <input id="no_kta" type="text" name="no_kta" class="form-control" placeholder="XIV-004-7-0002" value="{{ old('no_kta') }}">
                                    </div>
                                </div>

                                <div class="col-span-6">
                                    <label for="" class="form-label">Nama Lengkap</label> <code class="text-danger">*</code>
                                    <div class="">
                                        <input id="full_name" type="text" name="full_name" class="form-control" placeholder="John Doe" value="{{ old('full_name') }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-12 mt-3">
                            <div class="grid grid-cols-12 gap-2">
                                <div class="col-span-6">
                                    <label for="" class="form-label">Tempat, Tanggal Lahir</label> <code class="text-danger">*</code>
                                    <div class="">
                                        <input id="ttl" type="text" name="ttl" class="form-control" placeholder="Masukan Tempat, Tanggal Lahir" value="{{ old('ttl') }}">
                                    </div>
                                </div>

                                <div class="col-span-6">
                                    <label for="" class="form-label">Agama</label> <code class="text-danger">*</code>
                                    <div class="">
                                        <input id="agama" type="text" name="agama" class="form-control" placeholder="Masukan Agama" value="{{ old('agama') }}">
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
                                            <option value="-">-</option>
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
                                        <input id="pangkat_terakhir" type="text" name="pangkat_terakhir" class="form-control" placeholder="Masukan Pangkat Terakhir" value="{{ old('pangkat_terakhir') }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-12 mt-3">
                            <div class="grid grid-cols-12 gap-2">
                                <div class="col-span-6">
                                    <label for="" class="form-label">NIK</label> <code class="text-danger">*</code>
                                    <div class="">
                                        <input id="nik" type="text" name="nik" class="form-control" placeholder="Nomor Induk Kependudukan" value="{{ old('nik') }}">
                                    </div>
                                </div>

                                <div class="col-span-6">
                                    <label for="" class="form-label">Tanda Jasa Teringgi</label> <code class="text-danger">*</code>
                                    <div class="">
                                        <input id="tanda_jasa_tertinggi" type="text" name="tanda_jasa_tertinggi" class="form-control" placeholder="Masukan Tanda Jasa Tertinggi" value="{{ old('tanda_jasa_tertinggi') }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-12 mt-3">
                            <div class="grid grid-cols-12 gap-2">
                                <div class="col-span-12">
                                    <label for="" class="form-label">Tanggal Cetak</label> <code class="text-danger">*</code>
                                    <div class="">
                                        <input id="tanggal_cetak" type="text" name="tanggal_cetak" class="form-control" placeholder="Masukkan Tanggal Cetak" value="{{ date('d M Y'); }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-12 mt-3">
                            <div class="grid grid-cols-12 gap-2">
                                <div class="col-span-6">
                                    <label for="" class="form-label">Foto 2x3</label>
                                    <div class="">
                                        <img class="w-20 foto-preview">
                                        <input name="foto" id="foto" type="file" class="form-control   w-full px-3  py-1.5  text-base  font-normal text-gray-700 bg-white bg-clip-paddingborder border-solid border-gray-300  rounded  ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" onchange="previewImage()">
                                    </div>
                                </div>

                                <div class="col-span-6">
                                    <label for="" class="form-label">Tanda Tangan</label>
                                    <div class="">
                                        <img class="w-20 ttd-preview">
                                        <input name="ttd" id="ttd" type="file" class="form-control   w-full px-3  py-1.5  text-base  font-normal text-gray-700 bg-white bg-clip-paddingborder border-solid border-gray-300  rounded  ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" onchange="previewTtd()">
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
                                            <option value="">Pilih Salah Satu</option>
                                            <option value="Istri">Istri</option>
                                            <option value="Suami">Suami</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-span-6">
                                    <label for="" class="form-label">Nama Istri / Suami</label>
                                    <div class="">
                                        <input id="nama_istri_suami" type="text" name="nama_istri_suami" class="form-control" placeholder="Masukan Nama Istri / Suami" value="{{ old('nama_istri_suami') }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-12 mt-3">
                            <div class="grid grid-cols-12 gap-2">
                                <div class="col-span-6">
                                    <label for="" class="form-label">NIK Istri / Suami</label>
                                    <div class="">
                                        <input id="nik_istri_suami" type="text" name="nik_istri_suami" class="form-control" placeholder="Masukkan Nomor Induk Kependudukan" value="{{ old('nik_istri_suami') }}">
                                    </div>
                                </div>

                                <div class="col-span-6">
                                    <label for="" class="form-label">Wilayah / Rayon</label> <code class="text-danger">*</code>
                                    <div class="">
                                        <input id="wil_rayon" type="text" name="wil_rayon" class="form-control" placeholder="Masukkan Wilayah / Rayon" value="{{ old('wil_rayon') }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-12 mt-3">
                            <div class="grid grid-cols-12 gap-2">
                                <div class="col-span-6">
                                    <label for="" class="form-label">Alamat 1</label> <code class="text-danger">*</code>
                                    <div class="">
                                        <input id="alamat1" type="text" name="alamat1" class="form-control" placeholder="Masukan Alamat" value="{{ old('alamat1') }}">
                                    </div>
                                </div>

                                <div class="col-span-6">
                                    <label for="" class="form-label">Alamat 2</label>
                                    <div class="">
                                        <input id="alamat2" type="text" name="alamat2" class="form-control" value="{{ old('alamat2') }}">
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
