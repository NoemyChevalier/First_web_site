package AppliJava.controleur;

import javax.swing.*;

import AppliJava.vue.AjouterAdminVue;
import AppliJava.vue.AjouterCompetitionVue;
import AppliJava.vue.ModifierCompetitionVue;
import AppliJava.vue.SupprimerCompetitionVue;
import AppliJava.vue.VueListeCompet;
import AppliJava.vue.VueMembres;


public class GestionCompetitionControleur implements CompetitionControleur {
    @Override
    public void boutonPlusClicked() {
        AjouterCompetitionVue ajouterCompetitionVue = new AjouterCompetitionVue();
        ajouterCompetitionVue.afficher();
    }

    @Override
    public void boutonEditClicked() {
        ModifierCompetitionVue modifierCompetitionVue = new ModifierCompetitionVue();
        modifierCompetitionVue.afficher();
    }


    @Override
    public void boutonSuppClicked() {
         SupprimerCompetitionVue supprimerCompetitionVue = new SupprimerCompetitionVue();
            supprimerCompetitionVue.afficher();
    }

    public void boutonAdminClicked() {
        AjouterAdminVue ajouterAdminVue = new AjouterAdminVue();
        ajouterAdminVue.afficher();
    }

    @Override
    public void boutonListeMClicked() {
        VueMembres vueMembres = new VueMembres();
        vueMembres.afficher();
    }

    @Override
    public void boutonCompetClicked() {
        VueListeCompet vueListeCompet = new VueListeCompet();
        vueListeCompet.afficher();
        
    }

}
