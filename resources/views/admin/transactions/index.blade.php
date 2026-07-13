<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-text-main leading-tight">
                {{ __('Product Transactions') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/5 backdrop-blur-md/5 border border-white/10 overflow-hidden shadow-2xl sm:rounded-2xl p-10 flex flex-col gap-y-5">
                @forelse($transactions ?? [] as $transaction)
                <div class="item-card flex flex-row justify-between items-center">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 flex items-center justify-center rounded-full bg-accent-teal/20">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="text-accent-teal">
                                <path opacity="0.4" d="M19 10.2798V17.4298C18.97 20.2798 18.19 20.9998 15.22 20.9998H5.78003C2.76003 20.9998 2 20.2498 2 17.2698V10.2798C2 7.5798 2.63 6.7098 5 6.5698C5.24 6.5598 5.50003 6.5498 5.78003 6.5498H15.22C18.24 6.5498 19 7.2998 19 10.2798Z" fill="currentColor"/>
                                <path d="M22 6.73V13.72C22 16.42 21.37 17.29 19 17.43V10.28C19 7.3 18.24 6.55 15.22 6.55H5.78003C5.50003 6.55 5.24 6.56 5 6.57C5.03 3.72 5.81003 3 8.78003 3H18.22C21.24 3 22 3.75 22 6.73Z" fill="currentColor"/>
                                <path d="M6.96027 18.5601H5.24023C4.83023 18.5601 4.49023 18.2201 4.49023 17.8101C4.49023 17.4001 4.83023 17.0601 5.24023 17.0601H6.96027C7.37027 17.0601 7.71027 17.4001 7.71027 17.8101C7.71027 18.2201 7.38027 18.5601 6.96027 18.5601Z" fill="currentColor"/>
                                <path d="M12.5494 18.5601H9.10938C8.69938 18.5601 8.35938 18.2201 8.35938 17.8101C8.35938 17.4001 8.69938 17.0601 9.10938 17.0601H12.5494C12.9594 17.0601 13.2994 17.4001 13.2994 17.8101C13.2994 18.2201 12.9694 18.5601 12.5494 18.5601Z" fill="currentColor"/>
                                <path d="M19 11.8599H2V13.3599H19V11.8599Z" fill="currentColor"/>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <p class="text-text-muted text-sm">Total Amount</p>
                        <h3 class="text-text-main text-xl font-bold">Rp {{ number_format($transaction->total_amount ?? 183409, 0, ',', '.') }}</h3>
                    </div>
                    <div>
                        <p class="text-text-muted text-sm">Date</p>
                        <h3 class="text-text-main text-xl font-bold">{{ isset($transaction->created_at) ? $transaction->created_at->format('d M Y') : '12 Jan 2024' }}</h3>
                    </div>
                    <div class="hidden md:flex flex-col">
                        <p class="text-text-muted text-sm">Student</p>
                        <h3 class="text-text-main text-xl font-bold">{{ $transaction->user->name ?? 'Annima Poppo' }}</h3>
                    </div>
                    <div class="hidden md:flex flex-row items-center gap-x-3">
                        <a href="{{ isset($transaction) ? route('admin.subscribe_transactions.show', $transaction) : '#' }}" class="inline-flex items-center px-4 py-2 bg-accent-amber/90 hover:bg-accent-amber text-background rounded-full font-bold text-sm transition-all duration-300">
                            View Details
                        </a>
                    </div>
                </div>
                @empty
                <p class="text-text-muted">No transactions found.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
