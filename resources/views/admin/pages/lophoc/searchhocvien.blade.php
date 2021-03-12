@if(!empty($hocVien))
    @foreach($hocVien as $hv)
        <tr>
            <td>{{ $hv->id  }}</td>
            <td>{{ $hv->ten }}</td>
            <td class="text-center">{{ $hv->email }}</td>
            <td class="text-center">{{ $hv->so_dien_thoai }}</td>
            <td class="text-center">
                <a href="{{ url('/admin/lop-hoc/' . $hv->id . '/them-hoc-vien/' . $param['ma_lop_hoc']) }}" title="Chỉnh sửa {{ $hv->name }}"><i class="fas fa-plus"></i></a>
            </td>
        </tr>
    @endforeach
@else
    <p class="text-danger">{{ config('langVN.data_not_found') }}</p>
@endif
