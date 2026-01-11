<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum - {{ $komunitas->nama }}</title>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Inter", sans-serif;
            color: #1f2937;
            background: #f9fafb;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        .forum-header {
            background-color: #8b1a1a;
            padding: 15px 40px;
            display: flex;
            align-items: center;
            gap: 15px;
            border-bottom: 1px solid #7a1616;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 100;
        }

        .back-btn {
            font-size: 28px;
            cursor: pointer;
            color: white;
            transition: opacity 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 35px;
            height: 35px;
        }

        .back-btn:hover {
            opacity: 0.7;
        }

        .forum-info {
            display: flex;
            align-items: center;
            gap: 15px;
            flex: 1;
        }

        .forum-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            background-color: #f0e8d5;
        }

        .forum-details h2 {
            font-size: 18px;
            margin-bottom: 3px;
            color: white;
        }

        .forum-members {
            color: rgba(255,255,255,0.8);
            font-size: 13px;
        }

        .chat-container {
            flex: 1;
            overflow-y: auto;
            padding: 20px 40px;
            background: linear-gradient(to bottom, #f5f5f5, #ebe8e8);
            margin-top: 80px;
        }

        .message {
            display: flex;
            gap: 12px;
            margin-bottom: 15px;
        }

        .message-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            overflow: hidden;
            flex-shrink: 0;
            background-color: #f0e8d5;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .message-content {
            max-width: 65%;
        }

        .message-sender {
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 3px;
            color: #333;
        }

        .message-bubble {
            background-color: #d4b5b5;
            padding: 10px 14px;
            border-radius: 8px;
            word-wrap: break-word;
            line-height: 1.5;
            font-size: 15px;
            color: #333;
        }

        .message-time {
            font-size: 11px;
            color: #666;
            margin-top: 4px;
        }

        .input-area {
            background-color: white;
            padding: 15px 40px;
            border-top: 1px solid #ddd;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .input-wrapper {
            display: flex;
            gap: 15px;
            align-items: flex-end;
        }

        .message-input {
            flex: 1;
            padding: 12px 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 15px;
            font-family: inherit;
            resize: none;
            max-height: 100px;
        }

        .message-input:focus {
            outline: none;
            border-color: #8b1a1a;
        }

        .user-input {
            padding: 12px 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 15px;
            font-family: inherit;
            width: 200px;
        }

        .user-input:focus {
            outline: none;
            border-color: #8b1a1a;
        }

        .send-btn {
            background-color: #8b1a1a;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
        }

        .send-btn:hover {
            background-color: #6a1313;
        }
    </style>
</head>
<body>
    <!-- Forum Header -->
    <div class="forum-header">
        <div class="back-btn" onclick="window.location.href='/community/{{ $komunitas->id }}'">←</div>
        <div class="forum-info">
            <div class="forum-avatar">{{ $komunitas->kategori[0] ?? '🏠' }}</div>
            <div class="forum-details">
                <h2>{{ $komunitas->nama }}</h2>
                <p class="forum-members">Forum Diskusi</p>
            </div>
        </div>
    </div>

    <!-- Chat Container -->
    <div class="chat-container" id="chatContainer">
        @forelse($forum as $msg)
            <div class="message">
                <div class="message-avatar"></div>
                <div class="message-content">
                    <div class="message-sender">{{ $msg->user_name ?? ($msg->user->name ?? 'Anonymous') }}</div>
                    <div class="message-bubble">
                        {{ $msg->pesan }}
                        <div class="message-time">{{ $msg->created_at->format('H:i') }}</div>
                    </div>
                </div>
            </div>
        @empty
            <p style="color: #999; text-align: center;">Belum ada pesan. Jadilah yang pertama!</p>
        @endforelse
    </div>

    <!-- Input Area -->
    <form action="{{ route('forum.store', $komunitas->id) }}" method="POST" class="input-area">
        @csrf
        <!-- Added user name input field -->
        <input type="text" name="user_name" class="user-input" placeholder="Nama Anda" required>
        <div class="input-wrapper">
            <textarea name="pesan" class="message-input" placeholder="Ketik pesan..." required></textarea>
            <button type="submit" class="send-btn">Kirim</button>
        </div>
    </form>

    <script>
        // Auto scroll to bottom
        const chatContainer = document.getElementById('chatContainer');
        chatContainer.scrollTop = chatContainer.scrollHeight;
    </script>
</body>
</html>
