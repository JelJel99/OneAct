document.addEventListener('DOMContentLoaded', () => {
    // --- 1. FAQ Accordion Functionality ---
    const faqQuestions = document.querySelectorAll('.faq-question');

    faqQuestions.forEach(question => {
        question.addEventListener('click', () => {
            const answer = question.nextElementSibling;
            const icon = question.querySelector('.toggle-icon');
            
            // Check if the clicked question is already active
            const isActive = answer.classList.contains('active');

            // Close all other active answers and reset their icons
            faqQuestions.forEach(q => {
                const otherAnswer = q.nextElementSibling;
                const otherIcon = q.querySelector('.toggle-icon');

                // Check if the FAQ item has been expanded (like in image_df2987.png)
                if (otherAnswer.classList.contains('active')) {
                    otherAnswer.classList.remove('active');
                    q.classList.remove('active');
                    otherIcon.textContent = '+';
                }
            });

            // Toggle the clicked answer (Open if closed, close if open)
            if (!isActive) {
                answer.classList.add('active');
                question.classList.add('active');
                icon.textContent = '–'; // Minus sign
            } else {
                answer.classList.remove('active');
                question.classList.remove('active');
                icon.textContent = '+'; // Plus sign
            }
        });
    });

    // --- 2. Switch between FAQ and Contact Form Views (Hubungi button) ---
    const hubungiBtn = document.getElementById('hubungi-btn');
    
    // Pastikan tombol ada sebelum menambahkan event listener
    if (hubungiBtn) {
        hubungiBtn.addEventListener('click', () => {
            // Mengarahkan browser ke halaman kontak.html
            window.location.href = 'hubungi.html'; 
        });
    }
    
    // --- 3. Dynamic Form Field (Based on image_df2680.png showing a second field) ---
    const userTypeSelect = document.getElementById('user-type');
    const howCanWeHelpTextarea = document.getElementById('how-can-we-help');

    userTypeSelect.addEventListener('change', () => {
        // When a value is selected, show the 'Bagaimana Kami dapat membantu Anda?' field
        // This matches the transition from image_df2642.png (where the field is hidden) 
        // to image_df2680.png (where the field is shown and filled)
        if (userTypeSelect.value) {
            howCanWeHelpTextarea.classList.remove('hidden-by-default');
        } else {
            howCanWeHelpTextarea.classList.add('hidden-by-default');
        }
    });
});