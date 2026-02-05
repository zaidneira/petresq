@extends('layouts.main')

@section('content')
    <div class="admin-container">

        <div class="admin-header">
            <h1>Kelola Edukasi</h1>
            <a href="{{ route('admin.edukasi.create') }}" class="btn-add">
                + Tambah Edukasi
            </a>
        </div>

        <div class="admin-table-wrapper">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($educations as $edu)
                        <tr>
                            <td>{{ $edu->title }}</td>
                            <td class="action-col">
                                <a href="{{ route('admin.edukasi.edit', $edu->id) }}" class="btn-edit">Edit</a>

                                <form action="{{ route('admin.edukasi.destroy', $edu->id) }}" method="POST"
                                    style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-delete" onclick="return confirm('Hapus edukasi ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
