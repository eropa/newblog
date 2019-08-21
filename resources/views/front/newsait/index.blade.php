@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @foreach($datas as $data)
                    <div class="card">
                        <div class="card-header">{{$data->title}} /{{$data->datepublic}}
                            @guest
                            @else
                                <a href="{{ url('/edit/new/'.$data->id) }}">
                                    Редактировать
                                </a>
                                /
                                <a href="{{ url('/delet/new/'.$data->id) }}">
                                    Удалить
                                </a>

                            @endguest
                        </div>
                        <div class="card-body">
                           {!! $data->smalltext !!}
                            <a href="{{ url('news/'.$data->url) }}">Читать полностью</a>
                        </div>
                    </div><br>
                @endforeach
                {{ $datas->links() }}
            </div>
        </div>
    </div>
@endsection
