<div class="userEarnings">
    {{ _mt($moduleId, 'TopEarnersReport.total_earned') }} {{ $user->username }}
    <div class="earnedAmount">
        {{ _mt($moduleId, 'TopEarnersReport.total_earned') }}
        <span>{{ prettyCurrency($earnedAmount) }}</span>
    </div>
    <div class="commissionDetails">
        @forelse($transactions as $transaction)
            <div class="commission">
                <label>{{ $transaction[0] }}</label>
                <span class="amount">{{ prettyCurrency($transaction[1]) }}</span>
            </div>
        @empty
            <div class="noCommissions">{{ _mt($moduleId, 'TopEarnersReport.no_data_found') }}</div>
        @endforelse
    </div>
</div>
