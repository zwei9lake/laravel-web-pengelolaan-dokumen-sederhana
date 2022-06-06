<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kode</th>
            <th>Dokumen</th>
            <th>Nama Dokumen</th>
            <th>Status</th>
            <th>Register At</th>
            <th>Updated At</th>
        </tr>
    </thead>
    <tbody>
    @php $no = 1 @endphp
    @foreach($documents as $documents)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $documents->nama }}</td>
            <td>{{ $documents->kode }}</td>
            <td>{{ $documents->dokumen }}</td>
            <td>{{ $documents->namadoc }}</td>
            <td>{{ $documents->status_label }}</td>
            <td>{{ $documents->created_at }}</td>
            <td>{{ $documents->updated_at}}</td>
        </tr>
    @endforeach
    </tbody>
</table>