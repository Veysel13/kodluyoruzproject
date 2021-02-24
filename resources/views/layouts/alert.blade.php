
@php $message_type=['success','danger','warning','info'];@endphp

@foreach($message_type as $item)
    @if(session()->has("$item"))

        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-{{$item}}">
                    {!! session("$item") !!}
                </div>
            </div>
        </div>
    @endif
@endforeach
