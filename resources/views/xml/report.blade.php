<?xml version="1.0" encoding="UTF-8"?>
<user id="{{$user->id}}">
    <name>{{$user->name}}</name>
    <email>{{$user->email}}</email>
    <ip>{{$user->ip}}</ip>
    <browser>{{$user->browser}}</browser>
    <country>{{$user->country}}</country>
    <cookies>{{$user->cookies}}</cookies>

    <hashes>
        @foreach($hashes as $hash)
        <hash value="{{$hash->hash}}">
            <word>{{$hash->word}}</word>
            <algorithm>{{$hash->algorithm}}</algorithm>
        </hash>
        @endforeach
    </hashes>
</user>