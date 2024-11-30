<div class="flex flex-col gap-3 w-full">
    @foreach($categories as $category)
        <livewire:list.category.category-section :category="$category" :key="$category->id" />
    @endforeach
</div>
