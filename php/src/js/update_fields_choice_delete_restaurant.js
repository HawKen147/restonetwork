function updateFieldsHidden() {
    // 1) Récupère le <select>
    const select = document.getElementById('nom_restaurant');
    // 2) Récupère l’option choisie
    const selectedOption = select.options[select.selectedIndex];
    // 3) Lit les attributs data- de cette option
    const id_restaurant = selectedOption.getAttribute('id_restaurant') || '';
    // 4) Remplit les champs
    document.getElementById('id_restaurant').value = id_restaurant;
}