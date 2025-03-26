<style>
#chatbot-box {
    position: fixed;
    bottom: 90px;
    right: 20px;
    width: 350px;
    height: 450px;
    background: #fff;
    border-radius: 8px;
    border: 1px solid #ccc;
    box-shadow: 0 0 15px rgba(0,0,0,0.2);
    z-index: 9999;
    display: none;
    display: flex;
    flex-direction: column;
}

#chatbot-header {
    background-color: #1c4fc4;
    color: white;
    padding: 10px;
    font-weight: bold;
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
}

#chatbot-body {
    flex: 1 1 auto;           /* ✅ Chiếm toàn bộ chiều cao còn lại */
    overflow-y: auto;
    padding: 10px;
}

#chatbot-body .user { color: #1c4fc4; font-weight: bold; margin-top: 10px; }
#chatbot-body .bot { color: green; margin-top: 10px; }

#chatbot-footer {
    padding: 10px;
    border-top: 1px solid #ccc;
    display: flex;
    gap: 10px;
    background: #fff;         /* ✅ Đảm bảo nền trắng */
}

#chatbot-footer input {
    flex: 1;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

#chatbot-footer button {
    padding: 8px 12px;
    background-color: #1c4fc4;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

#chatbot-footer button:hover {
    background-color: #1558a5;
}

#chatbot-icon {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 10000;
    cursor: pointer;
}

#chatbot-icon img {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    box-shadow: 0 0 10px rgba(0,0,0,0.3);
}
</style>

<!-- Icon chatbot -->
<div id="chatbot-icon" onclick="toggleChatbot()">
    <img src="https://cdn-icons-png.flaticon.com/512/4712/4712109.png" alt="Chatbot">
</div>

<!-- Chatbox -->
<div id="chatbot-box">
    <div id="chatbot-header">💬 Chatbot Hỗ trợ</div>
    <div id="chatbot-body">
        <div id="chatbot-messages"></div>
    </div>
    <!-- ✅ Nhập nội dung luôn nằm dưới cùng -->
    <div id="chatbot-footer">
        <input type="text" id="chatbot-message" placeholder="Nhập câu hỏi...">
        <button onclick="sendChatbot()">Gửi</button>
    </div>
</div>

<script>
function toggleChatbot() {
    let box = document.getElementById('chatbot-box');
    box.style.display = box.style.display === 'none' ? 'flex' : 'none';
}

function sendChatbot() {
    let message = document.getElementById('chatbot-message').value.trim();
    if (!message) return;

    let messagesDiv = document.getElementById('chatbot-messages');
    messagesDiv.innerHTML += `<div class="user">Bạn: ${message}</div>`;

    fetch('/chatbot/send', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ message: message })
    })
    .then(res => res.json())
    .then(data => {
        messagesDiv.innerHTML += `<div class="bot">Bot: ${data.reply}</div>`;
        let totalMessages = messagesDiv.querySelectorAll('div');
        if (totalMessages.length > 20) {
            for (let i = 0; i < totalMessages.length - 20; i++) {
                totalMessages[i].remove();
            }
        }
        document.getElementById('chatbot-message').value = '';
        document.getElementById('chatbot-body').scrollTop = document.getElementById('chatbot-body').scrollHeight;
    })
    .catch(() => {
        messagesDiv.innerHTML += `<div class="bot">Bot: Lỗi kết nối, thử lại sau.</div>`;
    });
}
</script>
