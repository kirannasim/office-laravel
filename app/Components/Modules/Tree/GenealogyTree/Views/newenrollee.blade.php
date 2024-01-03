@extends(ucfirst(getScope()).'.Layout.master')
@inject('hookServices','App\Blueprint\Services\hookServices')
@section('content')
  @include('_includes.network_nav')
  <div class="row careerWrapper" style="margin-top: 30px;">
        <div class="col-sm-12">
            <br/>
            <p onclick="copyLink(this,event)" attr_href="https://www.elysiumnetwork.io/{{ loggedUser()->customer_id }}"><b>Your</b> elysiumnetwork    <b>REFERRAL LINK: https://www.elysiumnetwork.io/{{ loggedUser()->customer_id }}</b></p>
            <p onclick="copyLink(this,event)" attr_href="https://www.elysiumcapital.io/{{ loggedUser()->customer_id }}" style="margin-top: 20px;"><b>Your</b> elysiumcapital     <b>REFERRAL LINK: https://www.elysiumcapital.io/{{ loggedUser()->customer_id }}</b></p>
            <script>
                function copyLink(element, event) {
                    event.preventDefault();
                    var $temp = $("<input>");
                    $("body").append($temp);
                    $temp.val($(element).attr('attr_href')).select();
                    document.execCommand("copy");
                    $temp.remove();
                    alert('Copied to Clipboard');
                }
            </script>
        </div>
    </div>
@endsection
