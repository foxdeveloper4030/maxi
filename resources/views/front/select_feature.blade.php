

@foreach($fs as $f)
    <div  style="background-color: #030841;padding: 5px;cursor: pointer" onclick="setFeature('{{$f->id}}')">
        {{$f->value}}
    </div>
    <br>
@endforeach
