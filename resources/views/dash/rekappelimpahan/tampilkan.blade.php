@foreach ($tampilkans as $item)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->porsi }}</td>
        <td>{{ $item->namajamaah }}</td>
        <td><button type="button" class="btn-danger btn-sm" id="updatelagi" value="{{ $item->id }}"><i
                    class="fas fa-trash"></i></button>
        </td>
    </tr>
@endforeach
