import { createIcons, icons } from "lucide";
import Tabulator from "tabulator-tables";
import Swal from 'sweetalert2';
import * as xlsx from 'xlsx';

function TabulatorKta(url) {

    // Tabulator
    if ($("#tabulator-kta").length) {
        // Setup Tabulator
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        let table = new Tabulator("#tabulator-kta", {
            ajaxURL: url,
            // ajaxFiltering: true,
            ajaxSorting: true,
            printAsHtml: true,
            printStyled: true,
            pagination: "remote",
            paginationSize: 10,
            paginationSizeSelector: [10, 20, 30, 40],
            filterMode:"remote",
            layout: "fitColumns",
            responsiveLayout: "collapse",
            placeholder: "No matching records found",
            columns: [
                {
                    formatter: "responsiveCollapse",
                    width: 40,
                    minWidth: 30,
                    hozAlign: "center",
                    resizable: false,
                    headerSort: false,
                },

                // For HTML table
                {
                    title: "No",
                    width: 75,
                    responsive: 0,
                    vertAlign: "middle",
                    print: false,
                    download: false,
                    formatter:"rownum"
                },
                {
                    title: "Nama Lengkap",
                    minWidth: 150,
                    responsive: 0,
                    field: "full_name",
                    vertAlign: "middle",
                    print: false,
                    download: false,
                },
                {
                    title: "Pangkat Teakhir",
                    minWidth: 150,
                    responsive: 0,
                    field: "pangkat_terakhir",
                    vertAlign: "middle",
                    print: false,
                    download: false,
                },
                {
                    title: "NIK",
                    minWidth: 150,
                    responsive: 0,
                    field: "nik",
                    vertAlign: "middle",
                    print: false,
                    download: false,
                },
                {
                    title: "Tanda Jasa Tertinggi",
                    minWidth: 150,
                    responsive: 0,
                    field: "tanda_jasa_tertinggi",
                    vertAlign: "middle",
                    print: false,
                    download: false,
                },
                {
                    title: "Action",
                    minWidth: 200,
                    field: "actions",
                    responsive: 1,
                    hozAlign: "center",
                    vertAlign: "middle",
                    print: false,
                    download: false,
                    formatter(cell, formatterParams) {
                        return `<div class="flex lg:justify-center items-center">

                                    <a href="${cell.getData().detail_url}" class="detail-sisuka flex items-center text-amber-600 mr-3" >
                                        <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit
                                    </a>
                                    <a href="javascript: void(0);" class="flex items-center text-danger" onclick="deleteConfirm('delete-kta-form-${cell.getData().id}')">

                                    <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete</a>

                                    <form id="delete-kta-form-${cell.getData().id}" action="${cell.getData().delete_url}" method="POST">
                                    <input type="hidden" name="_token" value="${CSRF_TOKEN}">
                                    <input type="hidden" name="_method" value="delete">
                                    </form>

                                </div>`;
                    },
                },

                // For print format
                {
                    title: "Nama Lengkap",
                    field: "full_name",
                    visible: false,
                    print: true,
                    download: true,
                },
                {
                    title: "Pangkat Terakhir",
                    field: "pangkat_terakhir",
                    visible: false,
                    print: true,
                    download: true,
                },
                {
                    title: "NIK",
                    field: "nik",
                    visible: false,
                    print: true,
                    download: true,
                },
                {
                    title: "Tanda Jasa Tertinggi",
                    field: "tanda_jasa_tertinggi",
                    visible: false,
                    print: true,
                    download: true,
                },
            ],
            renderComplete() {
                createIcons({
                    icons,
                    "stroke-width": 1.5,
                    nameAttr: "data-lucide",
                });
            },
        });

        // Redraw table onresize
        window.addEventListener("resize", () => {
            table.redraw();
            createIcons({
                icons,
                "stroke-width": 1.5,
                nameAttr: "data-lucide",
            });
        });

        // Filter function
        function filterHTMLForm() {
            let value = $("#tabulator-html-filter-value").val();
            table.setFilter([
              { field: 'full_name', type: 'like', value: value }
            ]);
          }


        // On submit filter form
        $("#tabulator-html-filter-form")[0].addEventListener(
            "keypress",
            function (event) {
                let keycode = event.keyCode ? event.keyCode : event.which;
                if (keycode == "13") {
                    event.preventDefault();
                    filterHTMLForm();
                }
            }
        );

        // On click go button
        $("#tabulator-html-filter-go").on("click", function (event) {
            filterHTMLForm();
        });

        // On reset filter form
        $("#tabulator-html-filter-reset").on("click", function (event) {
            $("#tabulator-html-filter-value").val("");
            filterHTMLForm();
        });

        window.deleteConfirm = function(formId)
            {
                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: "Apakah anda ingin melanjutkan proses ini?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3F72EA',
                    confirmButtonText: 'Ya, lanjutkan!',
                    cancelButtonColor: '#EC981A',
                    cancelButtonText: "Tidak!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(formId).submit();
                    }
                });
            }

        // Export
        $("#tabulator-export-csv").on("click", function (event) {
            table.download("csv", "data.csv");
        });

        $("#tabulator-export-json").on("click", function (event) {
            table.download("json", "data.json");
        });

        $("#tabulator-export-xlsx").on("click", function (event) {
            window.XLSX = xlsx;
            table.download("xlsx", "data.xlsx", {
                sheetName: "Products",
            });
        });

        $("#tabulator-export-html").on("click", function (event) {
            table.download("html", "data.html", {
                style: true,
            });
        });

        // Print
        $("#tabulator-print").on("click", function (event) {
            table.print();
        });
    }
};

window.TabulatorKta = TabulatorKta;
