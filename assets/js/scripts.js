document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.quantity button').forEach(button => {
        button.addEventListener('click', () => {
            const input = button.parentElement.querySelector('input');
            let value = parseInt(input.value);

            if (button.classList.contains('increase')) {
                value = value < parseInt(input.max) ? value + 1 : value;
            } else if (button.classList.contains('decrease')) {
                value = value > parseInt(input.min) ? value - 1 : value;
            }

            input.value = value;
        });
    });
});