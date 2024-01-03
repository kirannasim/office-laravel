<style>
    .table-scroll {
        position: relative;
        width:100%;
        margin: auto;
        display:table;
    }
    .table-wrap {
        width: 100%;
        display:block;
        overflow: auto;
        position:relative;
        z-index:1;
    }
    .table-wrap.fixedON,
    .table-wrap.fixedON table,
    .faux-table table {
        height: 400px;/* match heights*/
    }
    .table-scroll table {
        width: 100%;
        margin: auto;
        border-collapse: separate;
        border-spacing: 0;
    }
    .table-scroll th, .table-scroll td {
        padding: 5px 10px;
        background: #fff;
        vertical-align: top;
    }
    .faux-table table {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        pointer-events: none;
    }
    .faux-table table tbody {
        visibility: hidden;
    }
    /* shrink cells in cloned table so that the table height is exactly 300px so that the header and footer appear fixed */
    .faux-table table tbody th, .faux-table table tbody td {
        padding-top:0;
        padding-bottom:0;
        border-top:none;
        border-bottom:none;
        line-height:0.1;
    }
    .faux-table table tbody tr + tr th, .faux-table tbody tr + tr td {
        line-height:0;
    }
    .faux-table thead th, .faux-table tfoot th, .faux-table tfoot td,
    .table-wrap thead th, .table-wrap tfoot th, .table-wrap tfoot td{
        background: #ccc;
    }
    .faux-table {
        position:absolute;
        top:0;
        right:0;
        left:0;
        bottom:0;
        overflow-y:scroll;
    }
    .faux-table thead, .faux-table tfoot, .faux-table thead th, .faux-table tfoot th, .faux-table tfoot td {
        position:relative;
        z-index:2;
    }

    #referral-table {

    }
</style>

<div class="referralListWrapper" data-user="{{ $user->id }}">
    <div class="referralListContainer">
        @if($downlines->count())
            {{--<div class="table-scrollable">--}}
                <div id="table-scroll" class="table-scroll">
                    <div id="faux-table" class="faux-table" aria="hidden"></div>
                    <div id="table-wrap" class="table-wrap">
                        <table class="table table-striped table-advance table-hover" id="referral-table">
                        <thead>
                        <tr>
                            <th><b>{{ _mt('General-ReferralList','ReferralList.Sl_No') }}</b></th>
                            <th><b>{{ _mt('General-ReferralList','ReferralList.username') }}</b></th>
                            <th><b>{{ _mt('General-ReferralList','ReferralList.fullname') }}</b></th>
                            <th><b>{{ _mt('General-ReferralList','ReferralList.Email') }}</b></th>
                            <th><b>{{ _mt('General-ReferralList','ReferralList.placement') }}</b></th>
                            <th><b>{{ _mt('General-ReferralList','ReferralList.currentRank') }}</b></th>
                            <th><b>{{ _mt('General-ReferralList','ReferralList.highestRank') }}</b></th>
                            <th><b>{{ _mt('General-ReferralList','ReferralList.dateOfJoin') }}</b></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($downlines as $downline)
                            @php
                                $highestRank = App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRankAchievementHistory::where('user_id', $downline->id)->max('rank_id');
                                $highestRank  = $highestRank ? App\Components\Modules\Rank\AdvancedRank\ModuleCore\Eloquents\AdvancedRank::find($highestRank)->name : 'NA';
                            @endphp
                            <tr>
                                <td>{{ ($downlines->currentPage() * $downlines->perPage()) - $downlines->perPage() + $loop->iteration }}</td>
                                <td>
                                    {{ $downline->username}}
                                </td>
                                <td>{{ $downline->metaData->firstname}} {{$downline->metaData->lastname}}</td>
                                <td>{{ $downline->email}}</td>
                                <td>@if ($downline->repoData->position == 2) Right  @else Left @endif </td>
                                <td>{{ $downline->rank? $downline->rank->rank->name:'NA' }}</td>
                                <td>{{ $highestRank }}</td>
                                <td>{{date('Y-m-d',strtotime($downline->created_at))}}</td>
                            </tr>
                        @empty
                            <div class="noUser">{{ _mt('General-ReferralList','ReferralList.noReferrals') }}</div>
                        @endforelse
                        </tbody>
                    </table>
                    </div>
                </div>
            {{--</div>--}}
            <div class="paginationWrapper">
                {{ $downlines->links() }}
            </div>
        @else
            {{ _mt('General-ReferralList','ReferralList.noReferrals') }}
        @endif
    </div>
</div>

<script>
    (function() {
        var mainTable = document.getElementById("referral-table");
        var tableHeight = mainTable.offsetHeight;
        if (tableHeight > 400) {
            var fauxTable = document.getElementById("faux-table");
            document.getElementById("table-wrap").className += ' ' + 'fixedON';
            var clonedElement = mainTable.cloneNode(true);
            clonedElement.id = "";
            fauxTable.appendChild(clonedElement);
        }
    })();
</script>
