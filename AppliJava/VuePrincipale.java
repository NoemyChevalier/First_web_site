package AppliJava;

import javax.swing.JFrame;
import javax.swing.JPanel;
import java.awt.BorderLayout; 
import java.awt.Color;

import AppliJava.controleur.GestionCompetitionControleur;
import AppliJava.vue.CompetitionAVenirVue;
import AppliJava.vue.GestionCompetitionsVue;
import AppliJava.vue.Header;

public class VuePrincipale {
    public static void main(String[] args) {
        VuePrincipale vuePrincipale = new VuePrincipale();
        vuePrincipale.afficher();
    }

    public void afficher() {
        JFrame frame = new JFrame("Etheral Skate Club");
        frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);

        JPanel appli = new JPanel(new BorderLayout());

        Header header = new Header();
        header.setBackground(new Color(192, 222, 244));

        appli.add(header, BorderLayout.NORTH);

        CompetitionAVenirVue avenir = new CompetitionAVenirVue();
        avenir.setBackground(new Color(255, 255, 255));

        appli.add(avenir, BorderLayout.CENTER);

        frame.add(appli);
        GestionCompetitionControleur controller = new GestionCompetitionControleur();
        GestionCompetitionsVue gestion = new GestionCompetitionsVue(controller);
        gestion.setBackground(new Color(255, 255, 255));

        appli.add(gestion, BorderLayout.EAST);

        frame.pack();
        frame.setVisible(true);
    }
}
