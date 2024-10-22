document.addEventListener('DOMContentLoaded', () => {
    const contactForm = document.getElementById('contact-form');
    contactForm.addEventListener('submit', function(event) {
        event.preventDefault();
        alert('Obrigado pela sua mensagem, ' + document.getElementById('name').value + '!');
        contactForm.reset();
    });

    document.querySelectorAll('.comment-form').forEach(form => {
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            const commentText = form.querySelector('.comment-input').value;
            const commentList = form.previousElementSibling;
            const newComment = document.createElement('div');
            newComment.className = 'comment';
            newComment.innerText = commentText;
            commentList.appendChild(newComment);
            form.reset();
        });
    });
});
