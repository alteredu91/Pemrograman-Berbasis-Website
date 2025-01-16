<!DOCTYPE html>
<html>
<head>
    <title>Store {{ $status }}</title>
</head>
<body>
    <h1>Store {{ $status }}: {{ $store->name }}</h1>
    <p>Dear {{ $store->user->name }},</p>
    
    @if($status === 'approved')
        <p>Congratulations! Your store "{{ $store->name }}" has been approved.</p>
        <p>You can now start adding products and managing your store.</p>
    @else
        <p>We regret to inform you that your store "{{ $store->name }}" has been rejected.</p>
        <p>Please review our guidelines and try submitting again.</p>
    @endif

    <p>Best regards,<br>{{ config('app.name') }} Team</p>
</body>
</html>