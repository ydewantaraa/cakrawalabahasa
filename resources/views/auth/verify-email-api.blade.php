<!DOCTYPE html>
<html>

<body>
    <h2>Hello!</h2>
    <p>Please verify your email by clicking the button below:</p>
    <p>
        <a href="{{ $url }}"
            style="background:#232c5f;color:#fff;padding:10px 20px;text-decoration:none;border-radius:5px;">Verify
            Email</a>
    </p>
    <br>
    <br>
    <span>Tanks,</span><br>
    {{ config('app.name') }}
</body>

</html>
