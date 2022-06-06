<select name="mon-hoc" id="select_class" class="form-control">
    <option value="">-----</option>
    @if(!empty($listLopHoc))
        @foreach($listLopHoc as $lh)
            <option @if($lh->max_student === "full") disabled style="color:#0000003b" @endif value="{{ $lh->id }}">{{ $lh->ten_lop }} - {{ $lh->ma_lop }} @if($lh->max_student === "full") - Lớp đã đủ học viên @endif</option>
        @endforeach
    @else
        <p class="text-danger">Chưa có lớp học.</p>
    @endif
</select>
