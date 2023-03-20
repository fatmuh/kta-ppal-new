@extends('../layout/' . $layout)

@section('subhead')
    <title>List KTA - KTA PPAL</title>
@endsection

@section('subcontent')
    <div class="flex flex-col items-center mt-8 intro-y sm:flex-row">
        <h2 class="mr-auto text-lg font-medium">List KTA</h2>
        <div class="flex w-full mt-4 sm:w-auto sm:mt-0">
            <div class="flex w-full mt-4 sm:w-auto sm:mt-0">
                <button data-tw-toggle="modal" data-tw-target="#superlarge-modal-add-kta" class="mr-2 shadow-md btn btn-primary"> <i data-lucide="plus" class="w-4 h-4 mr-1"></i>Tambah KTA</button>
            </div>
        </div>
    </div>
    <!-- BEGIN: HTML Table Data -->
    <div class="p-5 mt-5 intro-y box">
        <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
            <form id="tabulator-html-filter-form" class="xl:flex sm:mr-auto" >
                <div class="items-center mt-2 sm:flex sm:mr-4 xl:mt-0">
                    <input id="tabulator-html-filter-value" type="text" class="mt-2 form-control sm:w-40 2xl:w-full sm:mt-0"  placeholder="Cari Berdasarkan Nama">
                </div>
                <div class="mt-2 xl:mt-0">
                    <button id="tabulator-html-filter-go" type="button" class="w-full btn btn-primary sm:w-16" >Go</button>
                    <button id="tabulator-html-filter-reset" type="button" class="w-full mt-2 btn btn-secondary sm:w-16 sm:mt-0 sm:ml-1" >Reset</button>
                </div>
            </form>
            <div class="flex mt-5 sm:mt-0">
                <button id="tabulator-print" class="w-1/2 mr-2 btn btn-outline-secondary sm:w-auto">
                    <i data-lucide="printer" class="w-4 h-4 mr-2"></i> Print
                </button>
            </div>
            <div class="w-1/2 dropdown sm:w-auto">
                <button class="w-full dropdown-toggle btn btn-outline-secondary sm:w-auto" aria-expanded="false" data-tw-toggle="dropdown">
                    <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export <i data-lucide="chevron-down" class="w-4 h-4 ml-auto sm:ml-2"></i>
                </button>
                <div class="w-40 dropdown-menu">
                    <ul class="dropdown-content">
                        <li>
                            <a id="tabulator-export-csv" href="javascript:;" class="dropdown-item">
                                <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export CSV
                            </a>
                        </li>
                        <li>
                            <a id="tabulator-export-json" href="javascript:;" class="dropdown-item">
                                <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export JSON
                            </a>
                        </li>
                        <li>
                            <a id="tabulator-export-xlsx" href="javascript:;" class="dropdown-item">
                                <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export XLSX
                            </a>
                        </li>
                        <li>
                            <a id="tabulator-export-html" href="javascript:;" class="dropdown-item">
                                <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export HTML
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="overflow-x-auto scrollbar-hidden">
            <div id="tabulator-kta" class="mt-5 table-report table-report--tabulator"></div>
        </div>
    </div>
    <!-- END: HTML Table Data -->
    @include('pages.kta.modal._add')
    @include('pages.kta.modal._depan')
    @include('pages.kta.modal._belakang')
@endsection

@section('script')
    <script src="{{ mix('dist/js/tabulator-kta.js') }}"></script>
    <script type="module">
        TabulatorKta("{{ route('kta.tabulator') }}")
    </script>

    {!! JsValidator::formRequest('App\Http\Requests\KtaRequest', '#kta-form'); !!}
@endsection
