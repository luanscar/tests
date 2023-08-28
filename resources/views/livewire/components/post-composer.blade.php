<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="px-3 pt-3 w-full hidden md:flex">
        <div class="flex align-top">
            <div class="flex">
                <div {{ $attributes->merge(['class' => 'flex items-center rounded-full bg-white overflow-hidden']) }}>
                    <img class="" src="https://pbs.twimg.com/profile_images/1682474591745179650/-bXxWi7E_400x400.jpg" alt=""
                        srcset="">
                </div>

            </div>
            <div x-data="{ editing: false }" class="w-full">
                <label>
                    <textarea wire:model="content" placeholder="What's happening?" @click="editing = true"
                        class="
                            bg-transparent placeholder-gray-500 text-white font-medium
                            text-xl w-full border-none resize-none
                            focus:outline-none focus:ring-0 mt-1
                        "
                        rows="2" cols="50"></textarea>
                </label>

                <div class="flex justify-between" :class="{ 'border-t-[0.625px] border-outline pt-4': editing }">
                    <div class="flex items-center space-x-1">
                        <x-feed.tweet.action icon="media" color="twitter" />
                        <x-feed.tweet.action icon="gif" color="twitter" />
                        <x-feed.tweet.action icon="poll" color="twitter" />
                        <x-feed.tweet.action icon="emoji" color="twitter" />
                        <x-feed.tweet.action icon="schedule" color="twitter" />

                    </div>

                    <x-menu.item sm icon="tweet" title="Tweet" tweet="blue" route="/"
                        svg="fill-white w-8 xl:w-0" />
                </div>
            </div>
        </div>
    </div>
    >
</div>
