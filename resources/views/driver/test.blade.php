@extends('layouts.driver')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6 col-md-8 col-12">
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="mb-3">Driver Test Page</h5>
                <p class="text-muted">หน้านี้ใช้ทดสอบการเข้าสู่ระบบและ middleware ของพนักงาน (employee guard)</p>
                @php($employee = Auth::guard('employee')->user())
                @if($employee)
                    <ul class="list-group">
                        <li class="list-group-item">อีเมล: {{ $employee->email }}</li>
                        <li class="list-group-item">ชื่อ: {{ $employee->first_name ?? '-' }} {{ $employee->last_name ?? '' }}</li>
                        <li class="list-group-item">ตำแหน่ง: {{ optional($employee->position)->name ?? '-' }}</li>
                    </ul>
                @else
                    <div class="alert alert-warning mt-3">ยังไม่ได้เข้าสู่ระบบพนักงาน</div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
