@extends('layouts.app')

@section('content')
    <div class="card border mt-4" style="max-width:1120px; margin:0 auto;">
        <div class="card-body">
            <h5 class="fw-bold mb-3">ผลการค้นหาเส้นทาง</h5>

            @forelse ($routes as $route)
                <div class="card mb-3">
                    <div class="card-header fw-bold">
                        {{ $route->name ?? 'ไม่มีชื่อเส้นทาง' }}
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @foreach ($route->routePlaces as $rp)
                                <li class="list-group-item">
                                    จุดที่ {{ $rp->sequence_no }} :
                                    {{ $rp->place->name ?? '-' }}
                                    <span class="text-muted">
                                        ({{ $rp->duration_min ?? 0 }} นาที)
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @empty
                <div class="alert alert-warning mb-0">
                    ไม่พบเส้นทางตามที่ค้นหา
                </div>
            @endforelse
        </div>
    </div>
@endsection
