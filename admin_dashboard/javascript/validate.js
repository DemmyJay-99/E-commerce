document.getElementById('productForm').addEventListener('submit', function(e) {
    const imageInput = document.getElementById('image');
    const imageFile = imageInput.files[0];

    if (!imageFile) {
        alert('Please upload an image.');
        e.preventDefault();
        return;
    }

    const allowedExtensions = ['image/jpeg', 'image/png', 'image/gif'];
    if (!allowedExtensions.includes(imageFile.type)) {
        alert('Invalid image format. Please upload a JPEG, PNG, or GIF file.');
        e.preventDefault();
    }
});