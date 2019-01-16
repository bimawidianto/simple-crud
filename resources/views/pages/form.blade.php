<div class="form-group">
    <label for="">NIK</label>
    <input type="text" name="nik" id="nik" class="form-control" required>
 </div>
<div class="form-group" id="unit">
    <label for="">Nama</label>
    <input type="text" name="nama" id="nama" class="form-control" required>
</div>
<div class="form-group">
    <label for="">Unit</label>
    <select name="unit_id" class="form-control" id="unit" required>
    <option value="">Pilih</option>
        @foreach ($unit as $row)
        <option value="{{ $row->id }}">
            {{ $row->nama }}
        </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="">Unit</label>
    <select name="status_id" class="form-control" id="status" required>
    <option value="">Pilih</option>
        @foreach ($status as $row)
        <option value="{{ $row->id }}">
            {{ $row->nama }}
        </option>
        @endforeach
    </select>
</div>