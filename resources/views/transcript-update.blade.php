@extends('layouts.main')

@push('title')
    <title>Update</title>
@endpush
@section('main-section')
    <main>
        <div class="container py-4">
            <div class="row" style="background-color: #fff;">
                <div class="col-md-12 form_sec_outer_task border ">
                    <div class="row">
                        <div class="col-md-12 bg-light p-2 mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="frm_section_n">GPA Calculator</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="{{ $url }}" method="POST">
                        @csrf
                        <div class="col-md-12 p-0">
                            <div class="col-md-12 form_field_outer p-0">
                                <div class="row form_field_outer_row py-3">
                                    <div class="form-group col-md-2 py-2">
                                        <input type="text" class="form-control" id="course1" name="course"
                                            placeholder="Course Name" value="{{ $transcript->course }}">
                                        <span class="text-danger">
                                            @error('course')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-group col-md-2 py-2">
                                        <input type="number" class="form-control" id="maxMarks1" name="maxMarks"
                                            placeholder="Max Marks" value="{{ $transcript->maxMarks }}">
                                        <span class="text-danger">
                                            @error('maxMarks')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-group col-md-2 py-2">
                                        <input type="number" class="form-control" id="marksObtained1" name="marksObtained"
                                            placeholder="Marks Obtained" value="{{ $transcript->marksObtained }}">
                                        <span class="text-danger">
                                            @error('marksObtained')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-group col-md-2 py-2">
                                        <input type="number" class="form-control" id="creditHours1" name="creditHours"
                                            placeholder="Credit Hours" value="{{ $transcript->creditHours }}">
                                        <span class="text-danger">
                                            @error('creditHours')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-group col-md-2 py-2">
                                        <input type="number" step="any" class="form-control" id="gradePoints1"
                                            name="gradePoints" placeholder="Grade Points"
                                            value="{{ $transcript->gradePoints }}">
                                        <span class="text-danger">
                                            @error('gradePoints')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-group col-md-2 py-2 add_del_btn_outer">
                                        <button type="button" class="btn_round add_new_frm_field_btn" title="Add Row">
                                            <i class="fas fa-copy"></i>
                                        </button>

                                        <button type="button" class="btn_round remove_node_btn_frm_field" disabled>
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="row ml-0 bg-light ms-0 border py-3">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary py-2" id="add_btn"><i
                                class="fas fa-edit pe-2"></i>Update</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
