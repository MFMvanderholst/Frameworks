<div>
   <input wire:model.live="search" type="text" placeholder="Search ...">

   @foreach ($users as $user)
        <div wire:key="{{ $user->id }}">
            <h3>{{ $user->name }}</h3>
        </div>
   @endforeach
</div>
