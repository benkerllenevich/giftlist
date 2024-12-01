<div class="flex flex-col gap-3 w-full">
    @foreach($categories as $category)
        <livewire:list.category.category-section :list="$list" :category="$category" :key="$category->id"/>
    @endforeach

    @if ($hasUncategorized)
        <livewire:list.category.category-section :list="$list" :category="null" key="uncategorized" />
    @endif
</div>
