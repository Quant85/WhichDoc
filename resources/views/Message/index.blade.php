@extends('layouts.dashboard')
@foreach ($messages as $message)

<p>{{$message->nome_paziente}}</p>
<p>{{$message->testo_messaggio}}</p>
<p>{{$message->email}}</p>
<p>{{$message->cellulare}}</p>

@endforeach