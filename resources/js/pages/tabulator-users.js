import { createIcons, icons } from "lucide";
import TabulatorFull from "tabulator-tables";
import Swal from 'sweetalert2';

function TabulatorUser(url) {

    // Tabulator
    if ($("#tabulator-users").length) {
        // Setup Tabulator
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        let table = new TabulatorFull("#tabulator-users", {
            ajaxURL: url,
            ajaxFiltering: true,
            ajaxSorting: true,
            printAsHtml: true,
            printStyled: true,
            pagination: "remote",
            paginationSize: 10,
            paginationSizeSelector: [10, 20, 30, 40],
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
                    download: true,
                    formatter:"rownum"
                },
                {
                    title: "Nama User",
                    minWidth: 150,
                    responsive: 0,
                    field: "name",
                    vertAlign: "middle",
                    print: false,
                    download: false,
                },
                {
                    title: "Email",
                    minWidth: 150,
                    responsive: 0,
                    field: "email",
                    headerHozAlign : "left",
                    hozAlign: "left",
                    vertAlign: "middle",
                    print: false,
                    download: false,

                },
                {
                    title: "Status",
                    minWidth: 100,
                    responsive: 0,
                    field: "status",
                    headerHozAlign: "center",
                    hozAlign: "center",
                    vertAlign: "middle",
                    print: false,
                    download: true,
                    formatter(cell, formatterParams) {
                        return `<div>
                            <div class="font-medium
                                ${
                                    cell.getData().color }
                                whitespace-nowrap">${
                                cell.getData().active
                            }</div>
                        </div>`;
                    },
                },
                {
                    title: "ACTIONS",
                    minWidth: 200,
                    field: "actions",
                    responsive: 1,
                    hozAlign: "center",
                    vertAlign: "middle",
                    print: false,
                    download: false,
                    formatter(cell, formatterParams) {
                        return `<div class="flex lg:justify-center items-center">
                                    <a class="edit flex items-center mr-3" href="javascript:;">
                                        <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit
                                    </a>
                                    <a href="javascript: void(0);" class="flex items-center text-danger" onclick="deleteConfirm('delete-user-form-${cell.getData().id}')">

                                    <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete</a>

                                    <form id="delete-user-form-${cell.getData().id}" action="${cell.getData().delete_url}" method="POST">
                                    <input type="hidden" name="_token" value="${CSRF_TOKEN}">
                                    <input type="hidden" name="_method" value="delete">
                                    </form>

                                </div>`;
                    },
                },

                // For print format
                {
                    title: "No",
                    width: 75,
                    responsive: 0,
                    vertAlign: "middle",
                    visible: false,
                    print: true,
                    download: true,
                    formatter:"rownum"
                },
                {
                    title: "Nama User",
                    field: "name",
                    visible: false,
                    print: true,
                    download: true,
                },
                {
                    title: "Email",
                    field: "email",
                    visible: false,
                    print: true,
                    download: true,
                },
                {
                    title: "Status",
                    field: "remaining_stock",
                    visible: false,
                    print: true,
                    download: true,
                    formatter(cell, formatterParams) {
                        return `<div>
                            <div class="font-medium
                                ${
                                    cell.getData().color }
                                whitespace-nowrap">${
                                cell.getData().active
                            }</div>
                        </div>`;
                    },
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
            let field = $("#tabulator-html-filter-field").val();
            let type = $("#tabulator-html-filter-type").val();
            let value = $("#tabulator-html-filter-value").val();
            table.setFilter(field, type, value);
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
            $("#tabulator-html-filter-field").val("name");
            $("#tabulator-html-filter-type").val("like");
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

window.TabulatorUser = TabulatorUser;
