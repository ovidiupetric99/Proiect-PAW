@extends('layouts.app')
@section('content')

    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="admin-heading">Returneaza carte</h2>
                </div>
            </div>
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <div class="yourform">
                        <table cellpadding="10px" width="90%" style="margin: 0 0 20px;">
                            <tr>
                                <td>Student: </td>
                                <td><b>{{ $book->student->name }}</b></td>
                            </tr>
                            <tr>
                                <td>Carte: </td>
                                <td><b>{{ $book->book->name }}</b></td>
                            </tr>
                            <tr>
                                <td>Telefon: </td>
                                <td><b>{{ $book->student->phone }}</b></td>
                            </tr>
                            <tr>
                                <td>Email: </td>
                                <td><b>{{ $book->student->email }}</b></td>
                            </tr>
                            <tr>
                                <td>Data imprumut: </td>
                                <td><b>{{ $book->issue_date->format('d M, Y') }}</b></td>
                            </tr>
                            <tr>
                                <td>Data returnat: </td>
                                <td><b>{{ $book->return_date->format('d M, Y') }}</b></td>
                            </tr>
                            @if ($book->issue_status == 'Y')
                                <tr>
                                    <td>Status</td>
                                    <td><b>Returnat</b></td>
                                </tr>
                                <tr>
                                    <td>Returnat in</td>
                                    <td><b>{{ $book->return_day->format('d M, Y') }}</b></td>
                                </tr>
                            @else
                                @if (date('Y-m-d') > $book->return_date->format('d-m-Y'))
                                    <tr>
                                        <td>Taxa</td>
                                        <td>{{ $fine }} </td>
                                    </tr>
                                @endif
                            @endif
                        </table>
                        @if ($book->issue_status == 'N')
                            <form action="{{ route('book_issue.update', $book->id) }}" method="post" autocomplete="off">
                                @csrf
                                <input type='submit' class='btn btn-danger' name='save' value='Returneaza'>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
