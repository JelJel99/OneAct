import lucide from "lucide"

document.addEventListener("DOMContentLoaded", () => {
  lucide.createIcons()

  const messageInput = document.getElementById("messageInput")
  const sendBtn = document.getElementById("sendBtn")

  if (messageInput) {
    messageInput.addEventListener("input", function () {
      sendBtn.disabled = this.value.trim() === ""
    })

    messageInput.addEventListener("keypress", (e) => {
      if (e.key === "Enter" && !sendBtn.disabled) {
        sendBtn.click()
      }
    })
  }
})
