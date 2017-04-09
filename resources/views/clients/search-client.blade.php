<ul class="list divider-full-bleed">
    @foreach($clients as $client)
        <li class="tile">
            @if($origin == 'calls')
                <a href="javascript: void(0);"  onclick="setClientToTicket('{{ $client->firstname }} {{ $client->lastname }}', {{ $client->id }});" >
            @elseif($origin == 'clients')
                <a href="{{ action('ClientsController@showClient', [$client->id]) }}">
            @endif
                <div class="tile-text">
                    {{ $client->firstname }} {{ $client->lastname }}
                    <small>
                        @if(!empty($client->company)) {{ $client->company }} - @endif
                        @if(!empty($client->phone)) {{ $client->phone }} - @endif
                        @if(!empty($client->mobile)) {{ $client->mobile }} - @endif
                        @if(!empty($client->email)) {{ $client->email }} @endif
                    </small>
                </div>
            </a>
        </li>
    @endforeach
</ul>