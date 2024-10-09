@extends('layout.header')

@section('content')
<div class="d-flex justify-content-between align-items-center">
    <div>
    </div>
</div>
<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Name</th>
            <th>Alamat</th>
            <th>No HP</th>
            <th>Jenis Kelamin</th>
            <th>Hobi</th>
            <th>aksi</th>
            <h4>List Siswa</h4>
            <a class="btn btn-primary" href="{{ route('siswa.tambah') }}">Tambah Siswa</a>
        </tr>
        @foreach($siswa as $no=>$data)
        <th>{{ $no+1 }}</th>
        <th>{{ $data->nis }}</th>
        <th>{{ $data->name }}</th>
        <th>{{ $data->alamat }}</th>
        <th>{{ $data->no_hp }}</th>
        <th>{{ $data->jenis_kelamin }}</th>
        <th>{{ $data->hobi }}</th>
        <td>
            <a href="{{ route('siswa.edit',$data->id) }}"class ="btn btn-sm btn-warning">edit</a>
            <a href="{{ route('siswa.delete',$data->id) }}"class ="btn btn-sm btn-danger" id="delete">hapus</a>
            </form>
            
           
        </td>
    </thead>
    <tbody>
        @endforeach
    </tbody>
</table>
@endsection
