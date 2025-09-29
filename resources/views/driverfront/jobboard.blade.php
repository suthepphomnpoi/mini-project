@extends('layouts.vehicle')

@section('content')
   <div class="container mt-4">
        <h2 class="text-center fw-bold mt-4">ตารางงานคนขับ</h2>

        <div class="schedule-list border rounded p-3 bg-white">
            @foreach ($schedules as $idx => $item)
                <div class="schedule-item mb-3 pb-3 {{ $idx !== count($schedules) - 1 ? 'border-bottom' : '' }}">
                    <div class="fw-bold fs-5 mb-1">{{ $item['route'] }}</div>
                    <div class="text-muted mb-2 small">ผ่าน: {{ $item['path'] }}</div>

                    <div class="row mb-2">
                        <div class="col-6 col-md-2">
                            <div class="fw-bold">ประเภทรถ</div>
                            <div class="text-success fs-5">{{ $item['type'] }}</div>
                        </div>

                        <div class="col-6 col-md-2">
                            <div class="fw-bold">ทะเบียน</div>
                            <div class="fs-5">{{ $item['license'] }}</div>
                        </div>

                        <div class="col-6 col-md-2">
                            <div class="fw-bold">จำนวนผู้โดยสาร</div>
                            <div class="fs-5">{{ $item['passenger'] }}</div>
                        </div>

                        <div class="col-6 col-md-3">
                            <div class="fw-bold">ช่วงรับ/เวลาที่วิ่ง</div>
                            <div class="fs-6">{{ $item['time'] }}</div>
                        </div>

                        <div class="col-12 col-md-3 d-flex align-items-center justify-content-md-end mt-2 mt-md-0">
                           @if (!$item['received'])
                                <form action="{{ route('drivers.receive', $item['id']) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-receive-job">รับงาน</button>
                                </form>
                            @else
                                <a href="{{ route('drivers.details', $item['id']) }}" class="btn btn-outline-primary">รายละเอียด</a>
                            @endif

                        </div>


                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@push('styles')
<style>
.schedule-list {
    max-width: 900px;
    margin: 0 auto;
    background: #fff;
}

.btn-receive {
    background-color: #45d07c !important;
    border-color: #45d07c !important;
    color: #fff !important;
}

.btn-receive:hover {
    background-color: #3cb971 !important;
    border-color: #3cb971 !important;
}
</style>
@endpush
