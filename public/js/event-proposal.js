document.addEventListener("DOMContentLoaded", () => {
  const today = new Date().toISOString().split("T")[0]
  const eventDateInput = document.getElementById("eventDate")
  if (eventDateInput) {
    eventDateInput.setAttribute("min", today)
  }

  // Declare the lucide variable before using it
  const lucide = {
    createIcons: () => {
      // Implementation of createIcons
      console.log("Icons created")
    },
  }

  lucide.createIcons()
})
