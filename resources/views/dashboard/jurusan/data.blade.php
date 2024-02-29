<table border="1">
    <thead>
        <tr>
            <td>#</td>
            <td>Nama Jurusan</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($jurusanData as $j)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ $j->nama_jurusan}}</td>
                <td>
                    <a href="/jurusan/edit/{{$j->id}}">Edit</a>
                    <a href="/jurusan/hapus/{{$j->id}}">Hapus</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
