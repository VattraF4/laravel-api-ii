<!DOCTYPE html>
<html>
<head>
    <title>New Post Published</title>
    <style>
        /* You can add custom inline CSS here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            max-width: 600px;
            margin: 0 auto;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 15px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Hello {{ $user->name }},</h2>
        
        <p>A new post has just been published on our platform!</p>
        
        <!-- Assuming your post has a title, you can show it here -->
        <h3>Title: {{ $post->title ?? 'New Story' }}</h3> 

        <p>Click the button below to read it:</p>
        
        <a href="{{ url('/post/' . $post->id) }}" class="button">View Post</a>

        <br><br>
        <p>Thanks,<br>
        {{ config('app.name') }}</p>
    </div>

</body>
</html>