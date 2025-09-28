@extends('layouts.app')

@section('content')
    <div class="container">
        <h4>ผลการค้นหาเส้นทาง</h4>

        @foreach ($routes as $route)
            <div class="card mb-3">
                <div class="card-header">
                    {{ $route->NAME }}
                </div>
                <div class="card-body">
                    <ul>
                        @foreach ($route->routePlaces as $rp)
                            <li>
                                จุดที่ {{ $rp->SEQUENCE_NO }} :
                                {{ $rp->place->NAME }}
                                ({{ $rp->DURATION_MIN }} นาที)
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
@endsection
