<div class="flex flex-col h-full">
    <div class="flex-1 overflow-y-auto min-h-[500px]">
        {{ $this->table }}
    </div>

    <div class="border-t border-gray-200 dark:border-white/10 p-4 bg-white dark:bg-gray-900 sticky bottom-0 z-10">
        <div class="flex items-center gap-4 justify-end">
            {{ $this->replyAction }}
            {{ $this->quickResponseAction }}
            {{ $this->officialResponseAction }}
        </div>
    </div>
</div>
