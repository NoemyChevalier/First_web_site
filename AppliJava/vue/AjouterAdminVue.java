/* Fichier correspondant à la fenêtre d'ajout d'un admin */

package AppliJava.vue;

import javax.swing.*;

import AppliJava.model.ConnexionAdmin;

import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.FocusListener;
import java.awt.event.FocusEvent;

/** Classe gérant l'affichage de la fenêtre d'ajout d'un admin */
public class AjouterAdminVue {
    
    /** Affiche la fenêtre d'ajout d'un admin avec les labels,boutons et champs nécessaires*/
    public void afficher() {

        JFrame ajoutFenetre = new JFrame("Ajouter un administrateur");
        ajoutFenetre.setLayout(new BorderLayout());

        ajoutFenetre.setSize(500, 400);
        ajoutFenetre.setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
        ajoutFenetre.setLocationRelativeTo(null);

        // Header
        JPanel header = new JPanel();
        Color lightBlue = new Color(192, 222, 244);
        header.setBackground(lightBlue);
        JLabel titre = new JLabel("Ajouter un administrateur");
        header.add(titre);

        // Contenu
        JPanel contenu = new JPanel(new GridBagLayout());
        contenu.setBackground(Color.WHITE);

        GridBagConstraints gbc = new GridBagConstraints();
        gbc.insets = new Insets(5, 5, 5, 5);
        gbc.anchor = GridBagConstraints.WEST;

        // Ajout des champs pour l'administrateur
        JLabel labelNom = new JLabel("Nom:");
        JTextField champNom = new JTextField(20);

        JLabel labelPrenom = new JLabel("Prénom:");
        JTextField champPrenom = new JTextField(20);

        JLabel labelDateNaissance = new JLabel("Date de naissance:");
        JTextField champDateNaissance = new JTextField("aaaa-mm-jj", 20);
        champDateNaissance.setHorizontalAlignment(JTextField.CENTER);
        champDateNaissance.addFocusListener(new FocusListener() {
            @Override
            public void focusGained(FocusEvent e) {
                if (champDateNaissance.getText().equals("aaaa-mm-jj")) {
                    champDateNaissance.setText("");
                    champDateNaissance.setForeground(Color.BLACK);
                }
            }

            @Override
            public void focusLost(FocusEvent e) {
                if (champDateNaissance.getText().isEmpty()) {
                    champDateNaissance.setText("jj-mm-aaaa");
                    champDateNaissance.setForeground(Color.GRAY);
                }
            }
        });

        JLabel labelIdentifiant = new JLabel("Identifiant:");
        JTextField champIdentifiant = new JTextField(20);

        JLabel labelMotDePasse = new JLabel("Mot de passe:");
        JPasswordField champMotDePasse = new JPasswordField(20);

        // Footer
        JPanel footer = new JPanel();
        footer.setBackground(Color.WHITE);
        JButton boutonAnnuler = new JButton("Annuler");
        boutonAnnuler.setBackground(Color.lightGray);

        JButton boutonAjouter = new JButton("Ajouter");
        boutonAjouter.setBackground(lightBlue);

        // Gestion de l'administrateur
        boutonAjouter.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {

                String nom = champNom.getText();
                String prenom = champPrenom.getText();
                String dateNaissance = champDateNaissance.getText();
                String identifiant = champIdentifiant.getText();
                String motDePasse = champMotDePasse.getText();

                ConnexionAdmin.ajouterAdmin(nom, prenom, dateNaissance, identifiant, motDePasse);

                ajoutFenetre.dispose();
            }
        });

        boutonAnnuler.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e) {
                ajoutFenetre.dispose();
            }
        });

        footer.add(boutonAnnuler);
        footer.add(boutonAjouter);

        // Ajouts des éléments dans le contenu
        gbc.gridx = 0;
        gbc.gridy = 0;
        contenu.add(labelNom, gbc);

        gbc.gridx = 1;
        gbc.gridy = 0;
        contenu.add(champNom, gbc);

        gbc.gridx = 0;
        gbc.gridy = 1;
        contenu.add(labelPrenom, gbc);

        gbc.gridx = 1;
        gbc.gridy = 1;
        contenu.add(champPrenom, gbc);

        gbc.gridx = 0;
        gbc.gridy = 2;
        contenu.add(labelDateNaissance, gbc);

        gbc.gridx = 1;
        gbc.gridy = 2;
        contenu.add(champDateNaissance, gbc);

        gbc.gridx = 0;
        gbc.gridy = 3;
        contenu.add(labelIdentifiant, gbc);

        gbc.gridx = 1;
        gbc.gridy = 3;
        contenu.add(champIdentifiant, gbc);

        gbc.gridx = 0;
        gbc.gridy = 4;
        contenu.add(labelMotDePasse, gbc);

        gbc.gridx = 1;
        gbc.gridy = 4;
        contenu.add(champMotDePasse, gbc);

        ajoutFenetre.add(header, BorderLayout.NORTH);
        ajoutFenetre.add(contenu, BorderLayout.CENTER);
        ajoutFenetre.add(footer, BorderLayout.SOUTH);

        ajoutFenetre.setVisible(true);
    }
}
