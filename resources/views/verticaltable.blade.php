
@for($i = 0; $i < count($lebel); $i++)
<tr><td class = "table">{{  $lebel[$i]->label  }}</td><td class = "table">{{  $vallabel[$i]->value  }}</td></tr>
@endfor
