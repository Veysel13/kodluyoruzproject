@extends('layouts.app')
@section("css")
    <style>
        html,body{
            height: 100%;
            margin: 0;
            background: rgb(2,0,36);
            background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(149,199,20,1) 0%, rgba(0,212,255,1) 96%);

        }

    </style>
    @endsection
@section('content')

    <div class="container h-100">
        <div class="d-flex justify-content-center">
            <div class="card mt-5 col-md-4 animated bounceInDown myForm">
                <div class="card-header">
                    <h4>Data Transfer</h4>
                </div>
                <form action="{{route("file.store")}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div id="dynamic_container">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text br-15"><i class="fas fa-file-upload"></i></span>
                                </div>
                                <input name="image[]" type="file" class="form-control"/>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-sm float-right "><i
                                class="fas fa-arrow-alt-circle-right"></i> Ekle
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('css')

@endsection


@section('js')

@endsection
