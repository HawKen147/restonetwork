function updateFields() {
    console.log("test");
    // 1) Récupère le <select>
    const select = document.getElementById('restaurant');
    // 2) Récupère l’option choisie
    const selectedOption = select.options[select.selectedIndex];
    // 3) Lit les attributs data- de cette option
    const nom = selectedOption.getAttribute('data-nom') || '';
    const adresse = selectedOption.getAttribute('data-adresse') || '';
    const id_restaurant = selectedOption.getAttribute('id_restaurant') || '';
    // 4) Remplit les champs
    document.getElementById('nom_restaurant').value = nom;
    document.getElementById('adresse_restaurant').value = adresse;
    document.getElementById('id_restaurant').value = id_restaurant;
}