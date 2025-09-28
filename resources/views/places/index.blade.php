@extends('layouts.app')

@section('content')
    <div class="card p-4" style="max-width:900px; margin:0 auto;">
        <h4 class="mb-3">ตารางสถานที่ (MP_PLACES)</h4>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>PLACE_ID</th>
                    <th>NAME</th>
                    <th>CREATED_AT</th>
                </tr>
            </thead>
            <tbody>
                @forelse($places as $place)
                    <tr>
                        <td>{{ $place->place_id }}</td>
                        <td>{{ $place->name }}</td>
                        <td>{{ $place->created_at }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-muted">ไม่มีข้อมูล</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
