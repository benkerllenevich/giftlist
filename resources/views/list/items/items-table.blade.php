<div class="flex flex-col">
    @foreach($items as $item)
        <div>
            {{ $item->name }}
        </div>
    @endforeach
</div>
