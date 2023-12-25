@extends('layouts.main')
@push('title')
    <title>Transcirpt</title>
@endpush

@section('main-section')
    <div class="table-responsive container">
        <caption>
            <h1 class="pt-5">Transcirpts Data</h1>
        </caption>
        <table
            class="table table-striped table-light
        table-hover
        table-borderless
        table-primary
        align-middle">
            <thead class="table-dark">
                <tr>
                    <th>S.No</th>
                    <th>Course Name</th>
                    <th>Max Marks</th>
                    <th>Marks Obtained</th>
                    <th>Credit Hours</th>
                    <th>Grade Points</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($transcripts as $transcript)
                    <tr class="table-light">
                        <td scope="row">{{ $transcript->transcriptId }}</td>
                        <td>{{ $transcript->course }}</td>
                        <td>{{ $transcript->maxMarks }}</td>
                        <td>{{ $transcript->marksObtained }}</td>
                        <td>{{ $transcript->creditHours }}</td>
                        <td>{{ $transcript->gradePoints }}</td>
                        <td>
                            <a href="" class="btn btn-outline-primary"><i class="fas fa-eye"></i></a>
                            <a href="{{route('transcript.edit',['id'=> $transcript->transcriptId])}}" class="btn btn-outline-success"><i class="fas fa-pen"></i></a>
                            <a href="{{route('transcript.delete',['id'=> $transcript->transcriptId])}}" class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
