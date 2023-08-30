@foreach ($pengajuan as $item)
    <tr>
        <td><input type="checkbox" class="subcheck" name="pilih" data-id="{{ $item->id }}"></td>
        <td>{{ $item->porsi }}</td>
        <td>{{ $item->namajamaah }}</td>
    </tr>
@endforeach
