 @foreach($json_arr[$id] as $list)
    <option  value="{{ $list['id'] }}">{{ $list['title'] }}</option>
@endforeach