@extends("layouts.app")
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <h2 class="admin-heading text-center">Cartile care nu au fost returnate</h2>
                </div>
            </div>
            @if ($books)
                <div class="row">
                    <div class="col-md-12">
                        <table class="content-table">
                            <thead>
                                <th>S.No</th>
                                <th>Student</th>
                                <th>Carte</th>
                                <th>Telefon</th>
                                <th>Email</th>
                                <th>Data imprumut</th>
                                <th>Data termen</th>
                                <th>Intarziere</th>
                            </thead>
                            <tbody>
                                @forelse ($books as $book)
                                    <tr>
                                        <td>{{ $book->id }}</td>
                                        <td>{{ $book->student->name }}</td>
                                        <td>{{ $book->book->name }}</td>
                                        <td>{{ $book->student->phone }}</td>
                                        <td>{{ $book->student->email }}</td>
                                        <td>{{ $book->issue_date->format('d M, Y') }}</td>
                                        <td>{{ $book->return_date->format('d M, Y') }}</td>
                                        <td>@php $date1 = date_create(date('Y-m-d'));
                                            $date2 = date_create($book->return_date->format('d-m-Y'));
                                            if($date1 > $date2){
                                              $diff = date_diff($date1,$date2);
                                              echo $days = $diff->format('%a days');
                                            }else{
                                              echo '0 days';
                                            } @endphp</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10">No Record Found!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
