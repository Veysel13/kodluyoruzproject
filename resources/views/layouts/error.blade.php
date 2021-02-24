@if(count($errors)>0)
    <div class="col-md-12 " style="padding: 15px">
        <div class="alert alert-danger">
            <strong>Hata!</strong> Bir şeyler ters gitti.
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
<?php
