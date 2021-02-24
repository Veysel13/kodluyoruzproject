@extends('layouts.app')
@section("css")
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style>
        .trash { color:rgb(209, 91, 71); }
        .flag { color:rgb(248, 148, 6); }
        .panel-body { padding:0px; }
        .panel-footer .pagination { margin: 0; }
        .panel .glyphicon,.list-group-item .glyphicon { margin-right:5px; }
        .panel-body .radio, .checkbox { display:inline-block;margin:0px; }
        .panel-body input[type=checkbox]:checked + label { text-decoration: line-through;color: rgb(128, 144, 160); }
        .list-group-item:hover, a.list-group-item:focus {text-decoration: none;background-color: rgb(245, 245, 245);}
        .list-group { margin-bottom:0px; }
    </style>
@endsection
@section('content')

    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-list"></span> Bölge Listesi

                        <div class="pull-right action-buttons">
                            <div class="btn-group pull-right">
                                <a href="{{route("region.index",["top_category"=>0])}}" class="btn btn-success btn-xs" >
                                    Üst Bölge
                                </a>
                                <a style="margin-left: 10px" href="{{route("region.index",["top_category"=>1])}}" class="btn btn-warning btn-xs" >
                                    Alt Bölge
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <ul class="list-group">
                            @foreach($regions as $item)
                                <li class="list-group-item">
                                    <div class="checkbox">
                                        <input type="checkbox" id="checkbox" />
                                        <label for="checkbox">
                                            {{$item->name}} (  {{$item->region->name??"Üst Bölge"}} )
                                        </label>
                                    </div>
                                    <div class="pull-right action-buttons">

                                        <form action="{{route("region.delete",$item->id)}}" method="post">
                                            @csrf
                                            @method("DELETE")
                                            <a href="{{route("region.edit",$item->id)}}"><span class="glyphicon glyphicon-pencil"></span></a>
                                            <button  class="trash"><span class="glyphicon glyphicon-trash"></span></button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-md-6">
                                <h6>
                                    Toplam Veri <span class="label label-info">{{$regions->total()}}</span></h6>
                            </div>
                            <div class="col-md-6">
                                {{$regions->appends(request()->except("page"))->links()}}
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
