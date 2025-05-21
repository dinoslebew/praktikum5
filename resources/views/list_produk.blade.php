<div class="ml-10 mt-20">
    <table>
        <thead>
            <tr>
                <th>NO</th>
                <th>Nama Produk</th>
                <th>Deskripsi produk</th>
                <th>Harga Produk</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($nama as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item }}</td>
                <td>{{ $desc[$index] }}</td>
                <td>{{ $harga[$index] }}</td>
            </tr>
            @endforeach
         </tbody>   
    </table>
</div>
