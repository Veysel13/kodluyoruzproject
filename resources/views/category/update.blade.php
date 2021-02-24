@extends('layouts.app')
@section("css")
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

@endsection
@section('content')

    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-list"></span> Kategori Güncelleme
                    </div>
                    <div class="panel-body">
                        <form action="{{route("category.update")}}" method="post">
                            @csrf
                            @method("PUT")
                            <input type="hidden" name="id" value="{{$category->id}}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kategori İsmi</label>
                                <input type="text" name="name" class="form-control" value="{{old("name")??$category->name}}"  placeholder="Kategori İsmi">
                            </div>

                            <button type="submit" class="btn btn-primary">Güncelle</button>
                        </form>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-md-12">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('css')

@endsection


@section('js')
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@endsection
