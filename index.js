

for (let i=1; i <=6;i++ )
{
    document.getElementById("image" + i).addEventListener("click",mouseclick,false);
}


function mouseclick(e)
{

    if (e.target.id == "image1")
    {
        document.getElementById("grandeImage").src = "images/reliantrobin.png";
        document.getElementById("grandeImage").alt = "Reliant Robin";
        document.getElementById("nomVoiture").textContent = "Reliant Robin";
        document.getElementById("prixVoiture").textContent = "14999.00$";
        document.getElementById("descriptionVoiture").textContent = "Voiture moderne et populaire. Ne manquez pas votre chance!";
    }
    else if (e.target.id == "image2")
    {
        document.getElementById("grandeImage").src = "images/chevroletlumina.png";
        document.getElementById("grandeImage").alt = "Chevrolet Lumina 1999";
        document.getElementById("nomVoiture").textContent = "Chevrolet Lumina 1999";
        document.getElementById("prixVoiture").textContent = "11500.00$";
        document.getElementById("descriptionVoiture").textContent = "Une voiture qui va defier la route. Profitez-en bien.";
    }
    else if (e.target.id == "image3")
    {
        document.getElementById("grandeImage").src = "images/pontiac.png";
        document.getElementById("grandeImage").alt = "Pontiac Trans sport";
        document.getElementById("nomVoiture").textContent = "Pontiac Trans sport";
        document.getElementById("prixVoiture").textContent = "7888.00$";
        document.getElementById("descriptionVoiture").textContent = "Une magnifique voiture des années 90. Nous en avons beaucoup en stock. Tout doit partir!";
    }
    else if (e.target.id == "image4")
    {
        document.getElementById("grandeImage").src = "images/subarubrat.png";
        document.getElementById("grandeImage").alt = "Subaru Brat 1978";
        document.getElementById("nomVoiture").textContent = "Subaru Brat 1978";
        document.getElementById("prixVoiture").textContent = "22000.00$";
        document.getElementById("descriptionVoiture").textContent = "La plus vielle bagnole disponible pour la vente à notre magasin. Montrez votre coté plus vieillot.";
    }
    else if (e.target.id == "image5")
    {
        document.getElementById("grandeImage").src = "images/pointiakaztek.png";
        document.getElementById("grandeImage").alt = "Pontiac aztek 2001";
        document.getElementById("nomVoiture").textContent = "Pontiak aztek 2001";
        document.getElementById("prixVoiture").textContent = "39999.00$";
        document.getElementById("descriptionVoiture").textContent = "Notre voiture la plus belle et rare sur le marché. Disponible en quantité limité!";
    }
    else if (e.target.id == "image6")
    {
        document.getElementById("grandeImage").src = "images/ladasamara.png";
        document.getElementById("grandeImage").alt = "Lada samara";
        document.getElementById("nomVoiture").textContent = "Lada samara";
        document.getElementById("prixVoiture").textContent = "6000.00$";
        document.getElementById("descriptionVoiture").textContent = "Profitez de la route avec une voiture confortable pour toute la famille. Notre prix est réduit.";
    }

}

