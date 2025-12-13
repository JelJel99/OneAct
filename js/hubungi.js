document.addEventListener("DOMContentLoaded", () => {

    // Popup Elements
    const popup = document.getElementById("popup-confirm");
    const popupMessage = document.getElementById("popup-message");
    const yesBtn = document.getElementById("popup-yes");
    const noBtn = document.getElementById("popup-no");

    // Kirim button event
    const kirimBtn = document.getElementById("kirim-btn");
    kirimBtn.addEventListener("click", (e) => {
        e.preventDefault();
        popup.style.display = "flex"; // show popup
    });

    // No button closes popup
    noBtn.addEventListener("click", () => {
        popup.style.display = "none";
    });

    // Yes button → send message + show "Message sent!"
    yesBtn.addEventListener("click", () => {
        popupMessage.innerHTML = "Message sent!";
        yesBtn.style.display = "none";
        noBtn.textContent = "Close";

        noBtn.addEventListener("click", () => {
            popup.style.display = "none";
            window.location.reload();
        });
    });
});