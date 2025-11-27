// Aperçu de la photo en JS (léger) — fonctionne sans serveur
const photoInput = document.getElementById('photo');
const preview = document.getElementById('preview');

photoInput.addEventListener('change', function (ev) {
    const f = ev.target.files && ev.target.files[0];
    if (!f) {
        preview.innerHTML = `<div><strong>Photo de profil</strong><div class=\"small\">Aucune image sélectionnée</div></div>`;
        return;
    }
    const img = document.createElement('img');
    img.src = URL.createObjectURL(f);
    img.onload = () => URL.revokeObjectURL(img.src);
    preview.innerHTML = '';
    preview.appendChild(img);
});

// Exemple de capture d'envoi (peut être adapté pour POST fetch)
const form = document.getElementById('studentForm');
form.addEventListener('submit', function (e) {
    e.preventDefault();
    // Récupère les données du formulaire
    const formData = new FormData(form);
    // Exemple d'affichage des valeurs dans la console (remplacez par fetch si nécessaire)
    console.log('Données du formulaire (exemple) :');
    for (const [k, v] of formData.entries()) {
        console.log(k, v);
    }
    alert('Formulaire prêt à être envoyé — regardez la console pour voir les données.');
});
