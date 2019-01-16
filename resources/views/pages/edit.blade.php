@extends('partials.app')
​
@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <form action="{{ route('pegawai.update', $pegawai->nik) }}" method="POST">
        {{ csrf_field() }}
            <div class="form-group">
                <label for="">NIK</label>
                <input type="text" name="nik" required 
                    value="{{ $pegawai->nik }}"
                    class="form-control">
             </div>

            <div class="form-group">
                <label for="">Nama</label>
                <input type="text" name="nama" required 
                    value="{{ $pegawai->nama }}"
                    class="form-control">
            </div>

            <div class="form-group">
                <label for="">Unit</label>
                <select name="unit_id" required class="form-control">
                <option value="">Pilih</option>
                    @foreach ($unit as $row)
                    <option value="{{ $row->id }}" {{ $row->id == $pegawai->unit_id ? 'selected':'' }}>
                        {{ $row->nama }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="">Unit</label>
                <select name="status_id" required class="form-control">
                <option value="">Pilih</option>
                    @foreach ($status as $row)
                    <option value="{{ $row->id }}" {{ $row->id == $pegawai->status_id ? 'selected':'' }}>
                        {{ $row->nama }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                    <button type="submit" name="_method" value="PUT" class="btn btn-info btn-sm">
                        Update
                    </button>
                </div>
            </form>
    </div>
</div>
@endsection