@extends('layouts.main')

@section('title')
Create
@endsection

@section('content')
<div class="col-md-8 mx-auto my-4">
    <div class="card">
    <div class="card-header">
        Buat Data Mahasiswa
    </div>
    <div class="card-body">
        <!-- <h5 class="card-title"></h5> -->
        <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a> -->
        <a href="{{route('index')}}"><button class="btn btn-primary mt-1 mb-4">Kembali</button></a>

        <form action="{{route('store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="form-group">
                <label for="nama">NBI</label>
                <input type="text" class="form-control" id="nbi" name="nbi">
            </div>
            <div class="form-group mt-1">
                <label for="fakultas_id">Fakultas</label>
                <select class="form-control" id="fakultas_id" name="fakultas_id">
                    <option selected value="-1">Ubah</option>
                    @foreach($fakultas as $fak)
                    <option value="{{$fak->id}}">{{$fak->nama}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-1">
                <label for="program_studis_id">Program Studi</label>
                <select class="form-control" id="program_studis_id" name="program_studis_id">
                    <!-- <option selected value="-1">Ubah</option>
                    @foreach($prodi as $prd)
                    <option value="{{$prd->id}}">{{$prd->nama}}</option>
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
        $(document).on('change', '#fakultas_id', function() {
            var id = $(this).val();
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
            })
        })
    });
</script>
@endsection