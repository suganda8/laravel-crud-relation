@extends('layouts.main')

@section('title')
Edit
@endsection

@section('content')
<div class="col-md-8 mx-auto my-4">
    <div class="card">
    <div class="card-header">
        Edit Data Mahasiswa
    </div>
    <div class="card-body">
        <!-- <h5 class="card-title"></h5> -->
        <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a> -->
        <a href="{{route('index')}}"><button class="btn btn-primary mt-1 mb-4">Kembali</button></a>

        <form action="{{route('update')}}" method="POST">
            @csrf
            <div class="form-group">
                <input type="hidden" class="form-control" id="id" name="id" value="{{$mhs->id}}">
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{$mhs->nama}}">
            </div>
            <div class="form-group">
                <label for="nama">NBI</label>
                <input type="text" class="form-control" id="nbi" name="nbi" value="{{$mhs->nbi}}">
            </div>
            <div class="form-group mt-1">
                <label for="fakultas_id">Fakultas</label>
                <select class="form-control" id="fakultas_id" name="fakultas_id" value="{{$mhs->fakultas_id}}">
                    <option value="-1">Ubah</option>
                    @foreach($fakultas as $fak)
                    <option {{ $fak->id == $mhs->fakultas_id ? "selected" : ""}} value="{{$fak->id}}">{{$fak->nama}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-1">
                <label for="program_studis_id">Program Studi</label>
                <input type="hidden" class="form-control" id="prodi_id" name="prodi_id" value="{{$mhs->id}}">
                <select class="form-control" id="program_studis_id" name="program_studis_id" value="{{$mhs->program_studis_id}}">
                    <!-- <option value="-1">Ubah</option>
                    @foreach($prodi as $prd)
                    <option {{ $prd->id == $mhs->program_studis_id ? "selected" : ""}} value="{{$prd->id}}">{{$prd->nama}}</option>
                    @endforeach -->
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-4">Submit</button>
        </form>
    </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        var id = $('#fakultas_id').val();
        $.ajax({
            type: "get",
            url: "{{route('find_prodi')}}",
            data: {
                'id': id
            },
            success: function(data) {
                console.log($("#prodi_id").val());
                $("#program_studis_id").empty();
                $("#program_studis_id").append('<option>Pilih</option>');
                for (var i = 0; i < data.length; i++) {
                    console.log(data[i].id);
                    $("#program_studis_id").append('<option '+ (($("#prodi_id").val() == data[i].id) ? "selected": "") +' value="' + data[i].id + '">' + data[i].nama + '</option>');
                };
            },
        })

        $(document).on('change', '#fakultas_id', function() {
            var id = $(this).val();

            if (id > 0) {
                $.ajax({
                    type: "get",
                    url: "{{route('find_prodi')}}",
                    data: {
                        'id': id
                    },
                    success: function(data) {
                        console.log(data);
                        $("#program_studis_id").empty();
                        $("#program_studis_id").append('<option selected>Pilih</option>');
                        for (var i = 0; i < data.length; i++) {
                            $("#program_studis_id").append('<option value="' + data[i].id + '">' + data[i].nama + '</option>');
                        };
                    },
                });
            } else {
                $("#program_studis_id").empty();
            }
        })
    });
</script>
@endsection