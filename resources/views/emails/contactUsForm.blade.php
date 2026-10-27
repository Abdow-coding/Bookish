
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookish - Contact Us</title>
</head>
<body style="margin:0; padding:0; background-color:#fffaf2; font-family:Arial, Helvetica, sans-serif; color:#432719;">

    <div style="padding:35px 15px; background-color:#fffaf2;">

        <div style="max-width:650px; margin:0 auto; border:1px solid #eadfce; border-radius:16px; overflow:hidden; background-color:#ffffff;">

            <div style="padding:35px 25px; text-align:center; background-color:#432719;">
                <h1 style="margin:0; color:#d5a65b; font-family:Georgia,serif; font-size:38px;">
                    Bookish.
                </h1>

                <p style="margin:12px 0 0; color:#fffaf2; font-size:14px;">
                    Every great story begins with a connection.
                </p>
            </div>

            <div style="padding:30px 25px;">

                <p style="margin:0 0 10px; color:#b8894e; font-size:11px; font-weight:bold; letter-spacing:2px;">
                    NEW MESSAGE
                </p>

                <h2 style="margin:0 0 15px; color:#432719; font-family:Georgia,serif; font-size:28px;">
                    Contact Us
                </h2>

                <p style="margin:0 0 25px; color:#8b7868; font-size:14px; line-height:1.8;">
                    You have received a new message through the Bookish website.
                    Here are the customer's details.
                </p>

                <div style="padding:20px; margin-bottom:20px; border:1px solid #eadfce; border-radius:12px; background-color:#fffaf2;">

                    <p style="margin:0 0 15px; font-size:13px;">
                        <strong style="color:#432719;">First Name</strong><br>
                        <span style="color:#60452f;">{{ $data['first_name'] }}</span>
                    </p>

                    <p style="margin:0 0 15px; font-size:13px;">
                        <strong style="color:#432719;">Last Name</strong><br>
                        <span style="color:#60452f;">{{ $data['last_name'] }}</span>
                    </p>

                    <p style="margin:0; font-size:13px;">
                        <strong style="color:#432719;">Email Address</strong><br>
                        <span style="color:#60452f;">{{ $data['email'] }}</span>
                    </p>

                </div>

                <h3 style="margin:0 0 12px; color:#432719; font-size:17px;">
                    Customer Message
                </h3>

                <div style="padding:20px; border-left:4px solid #b8894e; border-radius:8px; background-color:#fffaf2; color:#60452f; font-size:14px; line-height:1.9; white-space:pre-wrap; overflow-wrap:anywhere;">{{ $data['message'] }}</div>

            </div>

            <div style="padding:20px; border-top:1px solid #eadfce; background-color:#f5e6cf; text-align:center;">
                <p style="margin:0; color:#432719; font-family:Georgia,serif; font-size:16px; font-weight:bold;">
                    Bookish.
                </p>

                <p style="margin:8px 0 0; color:#8b7868; font-size:11px;">
                    Every book has a story.
                </p>
            </div>

        </div>

    </div>

</body>
</html>
