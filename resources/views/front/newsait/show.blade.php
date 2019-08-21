@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{$data->title}} / {{ $data->datepublic }}

                        @guest
                        @else
                            <a href="{{ url('/edit/new/'.$data->id) }}">
                                (редактировать)
                            </a>

                        @endguest
                    </div>

                    <div class="card-body">
                        {!! $data->smalltext !!}
                        {!! $data->bigtext !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
