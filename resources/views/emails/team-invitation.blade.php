<!DOCTYPE html>
<html>
<head>
    <title>Team Invitation</title>
</head>
<body>
    <h1>You're Invited!</h1>
    <p>You have been invited to join a team.</p>
    <p>
        Click below to respond to the invitation:
    </p>
    <p>
        <a href="{{ $acceptUrl }}" style="color: green;">Accept Invitation</a>
    </p>
    <p>
        <a href="{{ $rejectUrl }}" style="color: red;">Reject Invitation</a>
    </p>
</body>
</html>
