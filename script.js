// Aperçu de la photo
const photoInput = document.getElementById('photo');
const preview = document.getElementById('preview');

photoInput.addEventListener('change', function (ev) {
    const f = ev.target.files && ev.target.files[0];
    if (!f) {
        preview.innerHTML = `<div><strong>Photo de profil</strong><div class="small">Aucune image sélectionnée</div></div>`;
        return;
    }
    const img = document.createElement('img');
    img.src = URL.createObjectURL(f);
    img.onload = () => URL.revokeObjectURL(img.src);
    preview.innerHTML = '';
    preview.appendChild(img);
});
