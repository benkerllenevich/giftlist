<div class="flex flex-col gap-3 w-full">
    @foreach($categories as $category)
        <livewire:list.category.category-items :category="$category" :key="$category->id" />
    @endforeach
</div>
