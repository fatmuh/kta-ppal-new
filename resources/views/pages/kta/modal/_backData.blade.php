<style>
    .nama-istri-suami {
        top: 70px;
        left: 260px;
    }

    .nik-istri-suami {
        top: 113px;
        left: 260px;
    }

    .alamat1 {
        top: 154px;
        left: 260px;
    }

    .alamat2 {
        top: 197px;
        left: 260px;
    }

    .wil-rayon {
        top: 243px;
        left: 260px;
    }
</style>
    <div id="imgDiv" class="relative modal-body">
        <h1 class="absolute text-2xl font-bold text-black nama-istri-suami">{{ $data->nama_istri_suami }}</h1>
        <h1 class="absolute text-2xl font-bold text-black nik-istri-suami">{{ $data->nik_istri_suami }}</h1>
        <h1 class="absolute text-2xl font-bold text-black alamat1">{{ $data->alamat1 }}</h1>
        <h1 class="absolute text-2xl font-bold text-black alamat2">{{ $data->alamat2 }}</h1>
        <h1 class="absolute text-2xl font-bold text-black wil-rayon">{{ $data->wil_rayon }}</h1>
        <img src="{{ asset('assets/images/ktabelakang.jpg') }}" class="w-full">
    </div>
    <div class="px-5 pb-8 text-right">
        <button id="btn" class="w-24 btn btn-primary">Download</button>
    </div>
@section('script')
<script type="text/javascript">
    $(document).ready(function () {
        // canvas生成图片
        $("#btn").on("click", function () {
            var getPixelRatio = function (context) { // 获取设备的PixelRatio
                var backingStore = context.backingStorePixelRatio ||
                    context.webkitBackingStorePixelRatio ||
                    context.mozBackingStorePixelRatio ||
                    context.msBackingStorePixelRatio ||
                    context.oBackingStorePixelRatio ||
                    context.backingStorePixelRatio || 0.5;
                return (window.devicePixelRatio || 0.5) / backingStore;
            };
            //生成的图片名称
            var imgName = "{{$data->full_name}}_belakang.png";
            var shareContent = document.getElementById("imgDiv");
            var width = shareContent.offsetWidth; // Menggunakan lebar konten sebagai lebar canvas
            var height = shareContent.offsetHeight; // Menggunakan tinggi konten sebagai tinggi canvas
            var canvas = document.createElement("canvas");
            var context = canvas.getContext('2d');
            canvas.width = width;
            canvas.height = height;
            var opts = {
                canvas: canvas,
                width: width,
                height: height,
                dpi: window.devicePixelRatio,
                backgroundColor: "transparent"
            };
            html2canvas(shareContent, opts).then(function (canvas) {
                context.imageSmoothingEnabled = false;
                context.webkitImageSmoothingEnabled = false;
                context.msImageSmoothingEnabled = false;
                context.imageSmoothingEnabled = false;
                var dataUrl = canvas.toDataURL('image/png', 1.0);
                dataURIToBlob(imgName, dataUrl, callback);
            });
        });
    })
    // edited from https://developer.mozilla.org/en-US/docs/Web/API/HTMLCanvasElement/toBlob#Polyfill
    var dataURIToBlob = function (imgName, dataURI, callback) {
        var binStr = atob(dataURI.split(',')[1]),
            len = binStr.length,
            arr = new Uint8Array(len);
        for (var i = 0; i < len; i++) {
            arr[i] = binStr.charCodeAt(i);
        }
        callback(imgName, new Blob([arr]));
    }
    var callback = function (imgName, blob) {
        var triggerDownload = $("<a>").attr("href", URL.createObjectURL(blob)).attr("download", imgName).appendTo(
            "body").on("click", function () {
            if (navigator.msSaveBlob) {
                return navigator.msSaveBlob(blob, imgName);
            }
        });
        triggerDownload[0].click();
        triggerDownload.remove();
    };
</script>
