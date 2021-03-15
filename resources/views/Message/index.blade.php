@extends('layouts.dashboard')
<div class="container">
    <table class="table table-striped">
        <thead >
            <tr>
                <th scope="col">Mittente</th>
                <th scope="col">Testo Messaggio</th>
                <th scope="col">Email Mittente</th>
                <th scope="col">Cellulare Mittente</th>
            </tr>
        </thead>
        @foreach ($messages as $message)
        <tbody>
            <tr>
                <td>{{$message->nome_paziente}}</td>
                <td>
                    <div class="form-group">
                      <label for=""></label>
                      <textarea class="form-control" name="" id="" rows="3">{{$message->testo_messaggio}}</textarea>
                    </div>
                    
                </td>
                <td>{{$message->email}}</td>
                <td>{{$message->cellulare}}</td>
            </tr>
        </tbody>
        @endforeach
    
    </table>

</div>

<style>
    table > thead,
    table > tbody{
        text-align: center;
    }
 table > tbody> div > textarea.form-control {
     background-color: blue !important;

 }
table > tbody > tr > td > div > textarea{
    background-color: transparent !important;
    border:  2px inset black !important;
 }
</style>

<a name="" id="" class="btn btn-primary" href="#" role="button">llalalal</a>