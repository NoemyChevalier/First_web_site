function openDocumentModalForEdit(typeDocument) {
    document.getElementById('documentForm').reset();
    document.getElementById('documentFormJpg').reset();
    document.getElementById('documentFormIdentite').reset();

    document.getElementById('titreModale').innerText = 'Modifier un document';
    document.getElementById('titreModaleIdentite').innerText = 'Modifier un document';
    document.getElementById('titreModaleJpg').innerText = 'Modifier un document';

    document.getElementById('photoSubmitBtn').innerText = 'Modifier';
    document.getElementById('documentSubmitBtn').innerText = 'Modifier';
    document.getElementById('identiteSubmitBtn').innerText = 'Modifier';

    // mode modification
    document.getElementById('mode_operation').value = 'edit';
    document.getElementById('mode_operation2').value = 'edit2';
    document.getElementById('mode_operation3').value = 'edit3';

    if (typeDocument === 'certificat') {
        document.getElementById('DocumentModal').style.display = 'block';
    } else if (typeDocument === 'photo') {
        document.getElementById('DocumentModalJpg').style.display = 'block';
    } else if (typeDocument === 'identite') {
        document.getElementById('DocumentModalIdentite').style.display = 'block';
    }
}




function openDocumentModalForAdd(typeDocument) {
    document.getElementById('documentForm').reset();
    document.getElementById('titreModale').innerText = 'Ajouter un document';
    document.getElementById('documentSubmitBtn').innerText = 'Ajouter';


    if (typeDocument === 'certificat') {
        document.getElementById('DocumentModal').style.display = 'block';
        document.getElementById('DocumentModalJpg').style.display = 'none';
    } else if (typeDocument === 'photo') {
        document.getElementById('DocumentModal').style.display = 'none';
        document.getElementById('DocumentModalJpg').style.display = 'block';
    } else if (typeDocument === 'identite') {
        document.getElementById('DocumentModal').style.display = 'none';
        document.getElementById('DocumentModalIdentite').style.display = 'block';
    } else {

    }

    document.getElementById('DocumentModal').style.display = 'block';
}

function closeDocumentModal() {
    document.getElementById('DocumentModal').style.display = 'none';
    document.getElementById('DocumentModalJpg').style.display = 'none';
    document.getElementById('DocumentModalIdentite').style.display = 'none';
}