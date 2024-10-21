@php use Illuminate\Support\Facades\Date; @endphp
    <!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <title></title>
    <style>
        .card {
            border-radius: 5%;
        }

        .card-content {
            padding: 30px;
            text-align: center;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            z-index: -5;

        }

        .button {
            background-color: deepskyblue;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="card">
    <div class="card-content">
        <div class="inner">
            <img
                src="https://lh3.googleusercontent.com/p/AF1QipNMHTKQNPCp-Lkk-lP23yqMDX_KwLCmhJ5AbOUF=s1360-w1360-h1020"
                width="30%" alt="Company Logo">
            <p>Dear {{ $loan->user->first_name }} {{$loan->user->last_name}},</p>
            <p>Your Loan of GHC {{ $loan->amount}} which was applied
                on {{Date::createFromDate($loan->created_at)->format('jS F, Y')}}, with the purpose of <em>{{$loan->purpose}}</em>,
            @if($loan->status == 'pending')
                <p> Is currently <b>{{ $loan->status }}</b></p>
            @elseif($loan->status == 'rejected')
                <p>has been <b>{{ $loan->status }}</b> You can reapply the loan again. </p>
            @else
            <p>has been <b>{{ $loan->status }}</b> Payments will be deducted from you salary every month </p>
            @endif



            <p>Best regards,</p>
            <p>TRINITY SOFTWARE CENTER</p>

        </div>
    </div>
</div>
</body>
</html>
