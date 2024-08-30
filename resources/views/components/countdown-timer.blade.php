@props(['endsOn'])

<div class="text-brand-500 font-medium xl:font-normal w-full overflow-clip" x-data="{
  endDate: new Date('{{ $endsOn->format('Y-m-d H:i:s') }}').getTime(),
  remainingTime: 0,
  formatTime(time) {
    const days = Math.floor(time / (1000 * 60 * 60 * 24));
    const hours = Math.floor((time % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((time % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((time % (1000 * 60)) / 1000);
    return { days, hours, minutes, seconds };
  }
}" x-init="() => {
  setInterval(() => {
    const now = new Date().getTime();
    const remainingTime = endDate - now;
    $data.remainingTime = remainingTime > 0 ? remainingTime : 0;
  }, 1000);
}">
    <template x-if="remainingTime > 0">
        <div class="grid auto-cols-max grid-flow-col gap-2 xl:gap-5 text-center">
            <div class="flex flex-col">
                <span class="countdown text-xl lg:text-6xl">
                    <span x-text="formatTime(remainingTime).days"></span>
                </span>
                <span>DAYS</span>
            </div>
            <div class="flex flex-col">
                <span class="countdown text-xl lg:text-6xl">
                    <span x-text="formatTime(remainingTime).hours"></span>
                </span>
                <span>HOURS</span>
            </div>
            <div class="flex flex-col">
                <span class="countdown text-xl lg:text-6xl">
                    <span x-text="formatTime(remainingTime).minutes"></span>
                </span>
                <span>MINUTES</span>
            </div>
            <div class="flex flex-col">
                <span class="countdown text-xl lg:text-6xl">
                    <span x-text="formatTime(remainingTime).seconds"></span>
                </span>
                <span>SECONDS</span>
            </div>
        </div>


    </template>
    <template x-if="remainingTime <= 0">
        <div class="overflow-clip">
            <div class="text-lg lg:text-5xl">The Event has ended!</div>
        </div>
    </template>
</div>
