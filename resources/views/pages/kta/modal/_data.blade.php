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
<form action="" id="edit_user_form" method="POST" enctype="multipart/form-data" class="d-inline-block">
    @csrf
    <div class="relative modal-body">
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
        {{-- <button type="submit" class="w-24 btn btn-primary">Download</button> --}}
    </div>
</form>
