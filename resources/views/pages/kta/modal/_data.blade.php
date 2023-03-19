<style>
    .kta {
        top: 116px;
        left: 540px;
    }

    .name {
        top: 154px;
        left: 500px;
    }

    .ttl {
        top: 184px;
        left: 500px;
    }

    .agama {
        top: 212px;
        left: 500px;
    }

    .gol-darah {
        top: 241px;
        left: 500px;
    }

    .pangkat-terakhir {
        top: 270px;
        left: 500px;
    }

    .nik {
        top: 300px;
        left: 500px;
    }

    .tanda-jasa {
        top: 342px;
        left: 500px;
    }

    .foto {
        top: 240px;
        left: 68px;
    }

    .ttd {
        top: 505px;
        left: 275px;
    }
</style>
    <div id="imgDiv" class="relative modal-body">
        <h1 class="absolute text-2xl font-bold text-black kta">{{ $data->no_kta }}</h1>
        <h1 class="absolute text-2xl font-bold text-black name">{{ $data->full_name }}</h1>
        <h1 class="absolute text-2xl font-bold text-black ttl">{{ $data->ttl }}</h1>
        <h1 class="absolute text-2xl font-bold text-black agama">{{ $data->agama }}</h1>
        <h1 class="absolute text-2xl font-bold text-black gol-darah">{{ $data->gol_darah }}</h1>
        <h1 class="absolute text-2xl font-bold text-black pangkat-terakhir">{{ $data->pangkat_terakhir }}</h1>
        <h1 class="absolute text-2xl font-bold text-black nik">{{ $data->nik }}</h1>
        <h1 class="absolute text-2xl font-bold text-black tanda-jasa">{{ $data->tanda_jasa_tertinggi }}</h1>
        <p class="absolute foto">
            @if ($data->foto)
                <img src="{{ asset('storage/foto/'. $data->foto) }}" width="172px">
            @else
                <img src="https://i.pinimg.com/originals/fd/14/a4/fd14a484f8e558209f0c2a94bc36b855.png" width="172px">
            @endif
        </p>
        <p class="absolute ttd">
            @if ($data->ttd)
                <img src="{{ asset('storage/ttd/'. $data->ttd) }}" width="172px">
            @else
                <img src="https://i.pinimg.com/originals/fd/14/a4/fd14a484f8e558209f0c2a94bc36b855.png" width="172px">
            @endif
        </p>
        <img src="{{ asset('assets/images/ktadepan.jpg') }}" class="w-full">
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
            var imgName = "{{$data->full_name}}_depan.png";
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
