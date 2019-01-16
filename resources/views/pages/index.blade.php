@extends('partials.app')

@section('content')
<div class="panel">
    <div class="panel-body">
        <table>
            <tr>
                <td>
                    <h3>Status</h3>
                </td>
                <td></td>
                <td>
                    <form action="{{ route('pegawai.status') }}" method="get">
                        <select name="status" class="selectpicker">
                            <option value="">Options</option>
                            @foreach ($status as $row)
                                <option value="{{ $row->id }}">{{ $row->nama }}</option>
                            @endforeach
                            </select>
                        <button style="submit" class="btn btn-default">Tampilkan</button>
                    </form>
                </td>
            </tr>
            <tr>
                <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                        Create
                     </button>
                </td>
            </tr>
        </table>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-body">
          <table class="table table-hover">
              <thead>
                  <tr>
                      <th>Nik</th>
                      <th>Nama</th>
                      <th>Unit</th>
                      <th>Status</th>
                      <th></th>
                  </tr>
              </thead>
              <tbody>
                  @forelse ($pegawai as $row)
                    <tr>
                        <td>{{ $row->nik }}</td>
                        <td>{{ $row->nama }}</td>
                        <td>{{ $row->unit->nama }}</td>
                        <td>{{ $row->status->nama }}</td>
                        <td>
                            <button class="btn btn-default" data-mynik="{{ $row->nik }}" 
                                data-mynama="{{ $row->nama }}" 
                                data-myunit={{ $row->unit->nama }}
                                data-mystatus={{ $row->status->nama }} 
                                data-toggle="modal" data-target="#edit">Edit</button> |
                            <form action="{{ route('pegawai.destroy', $row->nik) }}" method="POST">
                                {{ csrf_field() }}
                                <button type="submit" name="_method" value="DELETE" class="btn btn-default">Delete</button>
                            </form>
                        </td>
                    </tr>  
                  @empty
                      <tr>
                            <td colspan="4" class="text-center">Tidak ada data</td>
                      </tr>
                  @endforelse
              </tbody>
          </table>
    </div>
</div>

@include('partials._modal')

@endsection

@push('scripts')
    <script>
    $('#edit').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var nik = button.data('mynik') 
      var nama = button.data('mynama') 
      var myunit = button.data('myunit')
      var mystatus = button.data('mystatus') 
      var modal = $(this)

      modal.find('.modal-body #nik').val(nik);
      modal.find('.modal-body #nama').val(nama);
      modal.find('.modal-body #unit').val(unit);
      modal.find('.modal-body #status').val(status);
    })
    </script>
@endpush